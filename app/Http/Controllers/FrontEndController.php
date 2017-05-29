<?php

namespace App\Http\Controllers;

use Activation;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\UserScore;
use App\Courses;
use App\CoursesToTeacher;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Reminder;
use Sentinel;
use URL;
use View;
use DB;


class FrontEndController extends JoshController
{

    /*
     * $user_activation set to false makes the user activation via user registered email
     * and set to true makes user activated while creation
     */
    private $user_activation = true;

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getLogin()
    {
        // Is the user logged in?
        $user = Sentinel::check();
        if ($user) {
            if(Sentinel::inRole('user')){
                // user dashboard redirect
                return Redirect::route('user.dashboard');
            }else if(Sentinel::inRole('teacher')){
                //teacher dashboard redirect
                return Redirect::route('teacher.dashboard');
            }else{
                //currently admin is login.
                return View::make('index');
            }
        }else{
            // Show the login page
            return View::make('index');
        }
    }
    
    public function user_dashboard(){
        $user = User::with('user_course')->where('id',Sentinel::getUser()->id)->first();
        return view('user.dashboard', compact('user'))->with('courses',$user->user_course);
    }
    public function teacher_dashboard(){
        $user = User::with('user_course')->where('id',Sentinel::getUser()->id)->first();
        return view('teacher.dashboard', compact('user'))->with('courses',$user->user_course);
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postLogin(Request $request)
    {
        try {
            // Try to log the user in
            if (Sentinel::authenticate($request->only('email', 'password'), $request->input('remember-me', false))) {
                return Redirect::route("home")->with('success', Lang::get('auth/message.login.success'));
            } else {
                
                return Redirect::to('/')->with('error', 'Username or password is incorrect.');
                //return Redirect::back()->withInput()->withErrors($validator);
            }

        } catch (UserNotFoundException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (UserSuspendedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
        } catch (UserBannedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_banned'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * get user details and display
     */
    public function myAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return View::make('user_account', compact('user', 'countries'));
    }

    /**
     * update user details and display
     * @param Request $request
     * @param User $user
     * @return Return Redirect
     */
    public function update(Request $request, User $user)
    {

        $user = Sentinel::getUser();

        //update values
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = Lang::get('users/message.success.update');

            // Redirect to the user page
            return Redirect::route('home')->with('success', $success);
        }

        // Prepare the error message
        $error = Lang::get('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('/')->withInput()->with('error', $error);


    }

    /**
     * Account Register.
     *
     * @return View
     */
    public function getRegister()
    {
        $id_val = $this->get_primary_key('users');
        // Show the page
        return View::make('signup', compact('id_val'));
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postRegister(Request $request)
    {
        $activate = $this->user_activation; //make it false if you don't want to activate user automatically it is declared above as global variable
        DB::beginTransaction();
        try {
            // Register the user

            $user = Sentinel::register($request->except('_token'), $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleByName('User');
            $role->users()->attach($user);
            $free_course = Courses::where('price',0)->get();
            foreach ($free_course as $course) {
                $user_score = new UserScore();
                $user_score->id = $this->get_primary_key('user_score');
                $user_score->user_id = $user->id;
                $user_score->course_id = $course->id;
                $user_score->badget_id = 0;
                $user_score->score = 0;
                $user_score->completed = 0;
                $user_score->save();
            }
            
            //if you set $activate=false above then user will receive an activation mail
            if (!$activate) {
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
                DB::commit();
                //Redirect to login page
                return Redirect::to("login")->with('success', Lang::get('auth/message.signup.success'));
            }
            // login user automatically
            Sentinel::login($user, false);
            DB::commit();
            // Redirect to the home page with success menu
            return Redirect::route("user.dashboard")->with('success', Lang::get('auth/message.signup.success'));
            //return View::make('user_account')->with('success', Lang::get('auth/message.signup.success'));

        } catch (UserExistsException $e) {
            DB::rollBack();
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }
        DB::rollBack();
        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     *
     */
    public function getActivate($userId, $activationCode)
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('my-account');
        }

        $user = Sentinel::findById($userId);

        if (Activation::complete($user, $activationCode)) {
            // Activation was successfull
            return Redirect::route('login')->with('success', Lang::get('auth/message.activate.success'));
        } else {
            // Activation not found or not completed.
            $error = Lang::get('auth/message.activate.error');
            return Redirect::route('login')->with('error', $error);
        }
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        // Show the page
        return View::make('forgotpwd');

    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        try {
            // Get the user password recovery code
            //$user = Sentinel::FindByLogin($request->get('email'));
            $user = Sentinel::findByCredentials(['email' => $request->email]);
            if (!$user) {
                return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
            }

            $activation = Activation::completed($user);
            if (!$activation) {
                return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_activated'));
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view
            $data = array(
                'user' => $user,
                //'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
                'forgotPasswordUrl' => URL::route('forgot-password-confirm', [$user->id, $reminder->code]),
            );

            // Send the activation code through email
            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->name);
                $m->subject('Account Password Recovery');
            });
        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return Redirect::to(URL::previous())->with('success', Lang::get('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId, $passwordResetCode = null)
    {
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
        }

        if($reminder = Reminder::exists($user))
        {
            if($passwordResetCode == $reminder->code)
            {
                return View::make('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
            }
            else{
                return 'code does not match';
            }
        }
        else
        {
            return 'does not exists';
        }


        // Show the page
     //   return View::make('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null)
    {

        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('login')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('login')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    }

    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postContact(Request $request)
    {

        // Data to be used on the email view
        $data = array(
            'contact-name' => $request->get('contact-name'),
            'contact-email' => $request->get('contact-email'),
            'contact-msg' => $request->get('contact-msg'),
        );

        // Send the activation code through email
        Mail::send('emails.contact', compact('data'), function ($m) use ($data) {
            $m->from($data['contact-email'], $data['contact-name']);
            $m->to('email@domain.com', @trans('general.site_name'));
            $m->subject('Received a mail from ' . $data['contact-name']);

        });

        //Redirect to contact page
        return Redirect::to("contact")->with('success', Lang::get('auth/message.contact.success'));
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to('/')->with('success', 'You have successfully logged out!');
    }
    
    /**
     * Courses page.
     *
     * @return Redirect
     */
    public function getCourses(){
        //get courses list
        $courses = Courses::with('category')->orderBy('position')->get();
        //courses view
        return View::make('courses',compact('courses'));
    }
    
    public function getCourse($id,$name){
        
        //course
        $course = Courses::with('category','chapter')->find($id);
        //courses_detail view
        return View::make('courses_detail', compact('course'));
    }
    
    public function getSupport(){
        return View::make('support');
    }
    
    public function getPurchased_courses(){
        $user = Sentinel::check();
        if(Sentinel::inRole('teacher')){
            $courses_to_teacher = User::with('teacher_join')->where('id',$user->id)->first();
            return view('teacher.purchased_courses',compact('courses_to_teacher'));
        }
    }
    
    public function teacher_courses_preview($id,$name){
        $user = Sentinel::check();
        $course = Courses::with('category','chapter')->find($id);
        return view('teacher.course_preview', compact('course','user'));
    }
    
    public function getUpdate_profile(){
        $user = Sentinel::check();
        return view('update_profile', compact('user'));
    }
    
    public function postUpdate_profile(Request $request){
        
        $user = Sentinel::getUser();

        //update values
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        
        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = Lang::get('users/message.success.update');

            // Redirect to the user page
            return Redirect::route('update_profile')->with('success', $success);
        }

        // Prepare the error message
        $error = Lang::get('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('update_profile')->withInput()->with('error', $error);
    }
    
    public function getChange_password(){
        $user = Sentinel::check();
        return view('change_password', compact('user'));
        
    }
    
    public function postChange_password(Request $request){
        $user = Sentinel::getUser();
        
        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        
        if ($user->save()) {
            // Prepare the success message
            $success = Lang::get('users/message.success.update');

            // Redirect to the user page
            return Redirect::route('home')->with('success', $success);
        }

        // Prepare the error message
        $error = Lang::get('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('/')->withInput()->with('error', $error);
    }


    public function class_room(){
        return view('teacher.class_room');
    }
    
    public function getPublic_profile(){
        $user = Sentinel::getUser();
        return view('user.student_profile', compact('user'));
    }

}
