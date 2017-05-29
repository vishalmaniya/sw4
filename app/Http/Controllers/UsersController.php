<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;

class UsersController extends JoshController
{

    /**
     * Show a list of get the users.
     *
     * @return View
     */
    public function index()
    {
        // Grab get the users
        $users = User::All();

        // Show the page
        return View('admin.users.index', compact('users'));
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        // Get get the available groups
        $groups = Sentinel::getRoleRepository()->get();

        $countries = $this->countries;
        // Show the page
        return View('admin/users/create', compact('groups', 'countries'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(UserRequest $request)
    {
        //upload image
        if ($file = $request->file('pic_file')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['pic'] = $safeName;
        }
        //check whether use should be activated by default or not
        $activate = $request->get('activate') ? true : false;

        try {
            // Register the user
            $user = Sentinel::register($request->except('_token', 'password_confirm', 'group', 'activate', 'pic_file'), $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById($request->get('group'));
            if ($role) {
                $role->users()->attach($user);
            }
            //check for activation and send activation mail if not activated by default
            if (!$request->get('activate')) {
                // Data to be used on the email view
                $data = array(
                    'user' => $user,
                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
                );

                // Send the activation code through email
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->name);
                    $m->subject('Welcome ' . $user->name);
                });
            }

            // Redirect to the home page with success menu
            return Redirect::route('admin.users.index')->with('success', Lang::get('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($user = null)
    {
        $user = User::where('id',$user)->first();
        // Get this user groups
        $userRoles = $user->getRoles();
        
        // Get a list of get the available groups
        $roles = Sentinel::getRoleRepository()->get();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return View('admin/users/edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(User $user, Request $request)
    {
        try {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->dob = $request->input('dob');
            $user->bio = $request->input('bio');
            $user->gender = $request->input('gender');
            $user->country = $request->input('country');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->address = $request->input('address');
            $user->postal = $request->input('postal');

            if ($password = $request->has('password')) {
                $user->password = Hash::make($password);
            }


            // is new image uploaded?
            if ($file = $request->file('pic')) {
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/users/';
                $destinationPath = public_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists(public_path() . $folderName . $user->pic)) {
                    File::delete(public_path() . $folderName . $user->pic);
                }

                //save new file path into db
                $user->pic = $safeName;

            }

            //save record
            $user->save();
            
            //add user to 'User' group
            $role = Sentinel::findRoleById($request->input('group'));
            if ($role) {
                $role->users()->attach($user);
            }
            
            // Activate / De-activate user
            $status = $activation = Activation::completed($user);
            if ($request->input('activate') != $status) {
                if ($request->input('activate')) {
                    $activation = Activation::exists($user);
                    if ($activation) {
                        Activation::complete($user, $activation->code);
                    }
                } else {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);

                    //send activation mail
                    $data = array(
                        'user' => $user,
                        'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                    );

                    // Send the activation code through email
                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->name);
                        $m->subject('Welcome ' . $user->name);
                    });

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('users')->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('users')->withInput()->with('error', $error);
    }
    
    public function update_change(User $user, Request $request){
        try {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->dob = $request->input('dob');
            $user->bio = $request->input('bio');
            $user->gender = $request->input('gender');
            $user->country = $request->input('country');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->address = $request->input('address');
            $user->postal = $request->input('postal');

            if ($password = $request->has('password')) {
                $user->password = Hash::make($password);
            }


            // is new image uploaded?
            if ($file = $request->file('pic')) {
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/users/';
                $destinationPath = public_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists(public_path() . $folderName . $user->pic)) {
                    File::delete(public_path() . $folderName . $user->pic);
                }

                //save new file path into db
                $user->pic = $safeName;

            }

            //save record
            $user->save();
            
            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = $request->get('groups', array());

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups
            foreach ($rolesToAdd as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->detach($user);
            }
            
            // Activate / De-activate user
            $status = $activation = Activation::completed($user);
            if ($request->input('activate') != $status) {
                if ($request->input('activate')) {
                    $activation = Activation::exists($user);
                    if ($activation) {
                        Activation::complete($user, $activation->code);
                    }
                } else {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);

                    //send activation mail
                    $data = array(
                        'user' => $user,
                        'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                    );

                    // Send the activation code through email
                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->name);
                        $m->subject('Welcome ' . $user->name);
                    });

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('admin.users.edit', $user->id)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.users.edit', $user->id)->withInput()->with('error', $error);
    }

    /**
     * Show a list of get the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return View('admin/deleted_users', compact('users'));
    }


    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('delete/user', ['id' => $user->id]);
        return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('admin.users.index')->with('error', $error);
            }

            // Delete the user
            //to getow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // create activation record for user and send mail with activation link
            $data = array(
                'user' => $user,
                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->name);
                $m->subject('Dear ' . $user->name . '! Active your account');
            });


            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if ($user->country) {
                $user->country = $this->countries[$user->country];
            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
        
        // Show the page
        return View('admin.users.show', compact('user'));

    }

    public function passwordreset(Request $request)
    {
        $data = $request->input();
        $user = Sentinel::getUser();
        $password = $request->input('password');
        $user->password = Hash::make($password);
        $user->save();
    }
}
