<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use App\District;
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

use App\DataTables\UserDataTables;
use App\DataTables\SchoolDataTables;

class UsersController extends JoshController
{

    /**
     * Show a list of get the users.
     *
     * @return View
     */
    public function index(UserDataTables $dataTable)
    {
    	
        // Grab get the users
        //$users = User::with('roles')->get();

        // Show the page
        //return View('admin.users.index', compact('users'));
        
        return $dataTable->render('admin.users.index');
    }
    
    public function school_list(SchoolDataTables $dataTable){
        return $dataTable->render('admin.school.index');
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
        
        $district = District::all();
        // Show the page
        return View('admin/users/create', compact('groups', 'district'));
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
        try 
        {
            $user->id = $this->get_primary_key('users');
            $user->name = $request->input('name');
            $user->user_name = $request->input('username');
            $user->state = $request->input('district');
            if ($password = $request->has('password')) {
                $user->password = Hash::make($password);
            }
            //$user->save();
            //add user to 'School' group
            $role = Sentinel::findRoleByName('School');
            if ($role) {
                $role->users()->attach($user);
            }
            // Activate / De-activate user
            $activation = Activation::create($user);
            Activation::complete($user, $activation->code);
            // Was the user updated?
            if ($user->save()) 
            {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');
                // Redirect to the user page
                // return Redirect::route('users')->with('success', $success);
                return redirect('admin/school');
            }
            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } 
        catch (UserNotFoundException $e) 
        {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
        // Redirect to the user page
        return Redirect::route('school')->withInput()->with('error', $error);
    }
    
    public function update_change(User $user, Request $request){
        
        try {
            $user->name = $request->input('name');
            $user->user_name = $request->input('user_name');
            $user->email = $request->input('email');
            $user->state = $request->input('district');
            if ($password = $request->has('password')) {
                $user->password = Hash::make($password);
            }
            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('users.index')->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('users.index')->withInput()->with('error', $error);
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
                return redirect('admin/users')->with('error', $error);
            }

            // Delete the user
            //to getow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return redirect('admin/users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return redirect('admin/users')->with('error', $error);
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
            if(!empty($user->email) && $user->email != "" && $user->email != null)
            {
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->name);
                    $m->subject('Dear ' . $user->name . '! Active your account');
                });
            }

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
