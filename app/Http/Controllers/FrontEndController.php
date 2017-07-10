<?php

namespace App\Http\Controllers;

use Activation;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\UserScore;
use App\Courses;
use App\Lession;
use App\Chapters;
use App\Questions;
use App\CoursesToTeacher;
use App\Exam;
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
        $user = User::where('id',Sentinel::getUser()->id)->first(); 
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        $user_score = UserScore::where('user_id',Sentinel::getUser()->id)->get();
        $course_id = array();
        foreach($user_score as $class){
            array_push($course_id, $class->course_id);
        }
        $course = Courses::with('category','chapter')->whereIn('id',$course_id)->orderBy('position','ASC')->get();
        return view('user.dashboard', compact('user','score_count'))->with('courses',$course);
    }
    public function teacher_dashboard(){
        
        $user = User::where('id',Sentinel::getUser()->id)->first(); 
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        $user_score = UserScore::where('user_id',Sentinel::getUser()->id)->get();
        $course_id = array();
        foreach($user_score as $class){
            array_push($course_id, $class->course_id);
        }
        $course = Courses::with('category','chapter')->whereIn('id',$course_id)->orderBy('position','ASC')->get();
        return view('teacher.dashboard', compact('user','score_count'))->with('courses',$course);
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
            if (Sentinel::authenticate($request->only('user_name', 'password'), $request->input('remember-me', false))) {
                return Redirect::route("home")->with('success', Lang::get('auth/message.login.success'));
            } else {
                
                return Redirect::to('/')->with('error', 'Username or password is incorrect.');
                //return Redirect::back()->withInput()->withErrors($validator);
            }

        } catch (UserNotFoundException $e) {
            $this->messageBag->add('user_name', Lang::get('auth/message.account_not_found'));
        } catch (NotActivatedException $e) {
            $this->messageBag->add('user_name', Lang::get('auth/message.account_not_activated'));
        } catch (UserSuspendedException $e) {
            $this->messageBag->add('user_name', Lang::get('auth/message.account_suspended'));
        } catch (UserBannedException $e) {
            $this->messageBag->add('user_name', Lang::get('auth/message.account_banned'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('user_name', Lang::get('auth/message.account_suspended', compact('delay')));
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
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        $countries = $this->countries;
        return View::make('user_account', compact('user', 'countries','score_count'));
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
//            echo '<pre>';
//            print_r($data);
//            exit;
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
        return Redirect::route('/')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
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
    
    public function getCourse($name){
        
        //course
        $course = Courses::with('category','chapter')->where('slug',$name)->first();
        //courses_detail view
        return View::make('courses_detail', compact('course'));
    }
    
    public function getSupport(){
        return View::make('support');
    }
    
    public function getPurchased_courses(){
        
        $user = Sentinel::check();
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        if(Sentinel::inRole('teacher')){
            $courses_to_teacher = User::with('teacher_join')->where('id',$user->id)->first();
            return view('teacher.purchased_courses',compact('courses_to_teacher','score_count'));
        }
    }
    public function teacher_courses_preview($name){
        $user = Sentinel::check();
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        $course = Courses::with('category','chapter')->where('slug',$name)->first();
        return view('teacher.course_preview', compact('course','user','score_count'));
    }
    public function user_courses_preview($name){
        if(Sentinel::check()){
            $user = Sentinel::check();
            $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
            $course = Courses::with('category','chapter')->where('slug',$name)->first();
//            echo '<pre>';
//            print_r($course);
//            exit;
            $user_score = UserScore::where('course_id',$course->id)->where('user_id',$user->id)->first();
            $active = 'overview';
            $post_url = '';
            $next_button = route('user_lesson_view',['name'=>$name,'ch'=>'chepter1','lesson'=>'lesson1']);
            $previous_button = '';
            return view('user.course_preview', compact('course','user','active','next_button','previous_button','post_url','score_count'));
        }else{
            return redirect('/'); 
        }
    }
    public function user_lesson_preview($name,$ch,$lesson){
        if(Sentinel::check()){
            $user = Sentinel::check();
            $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
            $ch_position = ((int)(str_replace('chepter','',$ch)) - 1);
            $lesson_position = ((int)(str_replace('lesson','',$lesson)) - 1);
            $course = Courses::with('category','chapter')->where('slug',$name)->first();
            $current_ch = Chapters::where('courses_id',$course->id)->where('position',$ch_position)->first();
            $current_lesson = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position)->first();
            $current_position = $current_ch->id.'::'.$current_lesson->id.'::0';
            UserScore::where('course_id',$course->id)->where('user_id',$user->id)->update(['position'=>$current_position]);
            $user_score = UserScore::where('course_id',$course->id)->where('user_id',$user->id)->first();
            if(!empty($user_score->position)){
                $position = explode('::',$user_score->position);
                $active['ch'] = $position[0];
                $active['lesson'] = $position[1];
                $active['q'] = $position[2];
            }else{
                $active['ch'] = $current_ch->id;
                $active['lesson'] = $current_lesson->id;
                $active['q'] = '';
            }
            $post_url = '';
            $next_button = route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>'q1']);
            $previous_button = route('user_courses_view',['name'=>$name]);
            
            return view('user.course_preview', compact('course','user','active','current_ch','current_lesson','next_button','previous_button','post_url','score_count'));
        }else{
            return redirect('/'); 
        }
    }
    
    public function user_que_preview($name,$ch,$lesson,$q){
        if(Sentinel::check()){
            $user = Sentinel::check();
            $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
            $ch_position = ((int)(str_replace('chepter','',$ch)) - 1);
            $lesson_position = ((int)(str_replace('lesson','',$lesson)) - 1);
            $q_position = ((int)(str_replace('q','',$q)) - 1);
            $course = Courses::with('category','chapter')->where('slug',$name)->first();
            $current_ch = Chapters::where('courses_id',$course->id)->where('position',$ch_position)->first();
            $current_lesson = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position)->first();
            $current_que = Questions::with('question_join','viewed_question')->where('lession_id',$current_lesson->id)->where('position',$q_position)->first();
            if(!empty($current_que->id)){
                $current_position = $current_ch->id.'::'.$current_lesson->id.'::'.$current_que->id;
                $exam = Exam::where('question_id',$current_que->id)->where('user_id',$user->id)->first();
                if(empty($exam)){
                    $exam = new Exam();
                    $exam->id = $this->get_primary_key('exam');
                    $exam->question_id = $current_que->id;
                    $exam->user_id = $user->id;
                    $exam->score = 0;
                    $exam->hint_use = 0;
                    $exam->status = 0;
                    $exam->start_time = date('H:i:s', strtotime(date('Y-m-d H:i:s')));
                    $exam->end_time = '00:00:00';
                    $exam->save();
                }
            }else{
                $current_position = $current_ch->id.'::'.$current_lesson->id.'::';
            }
            
            UserScore::where('course_id',$course->id)->where('user_id',$user->id)->update(['position'=>$current_position]);
            $user_score = UserScore::where('course_id',$course->id)->where('user_id',$user->id)->first();
            if(!empty($user_score->position)){
                $position = explode('::',$user_score->position);
                $active['ch'] = $position[0];
                $active['lesson'] = $position[1];
                $active['q'] = $position[2];
            }else{
                $active['ch'] = $current_ch->id;
                $active['lesson'] = $current_lesson->id;
                $active['q'] = '';
            }
            $post_url = route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>$q]);
            $next_que = Questions::with('question_join')->where('lession_id',$current_lesson->id)->where('position',($q_position+1))->first();
            if(!empty($next_que)){
                $next_button = route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>'q'.($q_position+2)]);
            }else{
                $next_lession = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position + 1)->first();
                if(!empty($next_lession)){
                    $next_button = route('user_lesson_view',['name'=>$name,'ch'=>$ch,'lesson'=>'lesson'.($lesson_position + 2)]);
                }else{
                    $next_button = '';
                }
            }
            if($q_position == 0){
                $previous_button = route('user_lesson_view',['name'=>$name,'ch'=>$ch,'lesson'=>'lesson'.($lesson_position)]);
            }else{
                $previous_button = route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>'q'.($q_position)]);
            }
            return view('user.course_preview', compact('course','user','active','current_ch','current_lesson','current_que','next_button','previous_button','post_url','score_count'));
        }else{
            return redirect('/'); 
        }
    }
    
    public function save_hint_used(Request $request){
        if(Sentinel::check()){
            $user = Sentinel::check();
            $question_id = $request->input('question_id');
            $hint = $request->input('hint');
            Exam::where('question_id',$question_id)->where('user_id',$user->id)->update(['hint_use'=>$hint]);
        }else{
            return redirect('/'); 
        }
    }
    
    public function user_que_answer(Request $request,$name,$ch,$lesson,$q){
        if($user = Sentinel::check()){
            
            
            $question_id = $request->input('question');
            $answer = $request->input('answer');
            $hint = $request->input('use_hint');
            $is_answer = $request->input('is_answer');
            
            $ch_position = ((int)(str_replace('chepter','',$ch)) - 1);
            $lesson_position = ((int)(str_replace('lesson','',$lesson)) - 1);
            $q_position = ((int)(str_replace('q','',$q)) - 1);
            $course = Courses::with('category','chapter')->where('slug',$name)->first();
            $current_ch = Chapters::where('courses_id',$course->id)->where('position',$ch_position)->first();
            $current_lesson = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position)->first();
            $current_que = Questions::with('question_join','viewed_question')->where('lession_id',$current_lesson->id)->where('position',$q_position)->first();
            if($is_answer == 1){
                $next_que = Questions::with('question_join')->where('lession_id',$current_lesson->id)->where('position',($q_position+1))->first();
                if(!empty($next_que)){
                    return redirect(route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>'q'.($q_position+2)]))->with('Success', 'Correct Answer!');
                }else{
                    $next_lession = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position + 1)->first();
                    if(!empty($next_lession)){
                        return redirect(route('user_lesson_view',['name'=>$name,'ch'=>$ch,'lesson'=>'lesson'.($lesson_position + 2)]))->with('Success', 'Correct Answer!');
                    }else{
                        return back()->with('success', 'Correct Answer!');
                    }
                }
            }else{
                $current_que = Questions::with('question_join')->find($question_id);
                if($answer == $current_que->question_join->answer){
                    $exam = Exam::where('question_id',$question_id)
                        ->where('user_id',$user->id)->first();
                    $exam->hint_use = $hint;
                    $exam->score =($exam->score + ($current_que->points - ($hint * $current_que->hint_point)));
                    $exam->status = 1;
                    $exam->end_time = date('H:i:s', strtotime(date('Y-m-d H:i:s')));
                    $exam->save();
                    
                    $next_que = Questions::with('question_join')->where('lession_id',$current_lesson->id)->where('position',($q_position+1))->first();
                    if(!empty($next_que)){
                        return redirect(route('user_que_view',['name'=>$name,'ch'=>$ch,'lesson'=>$lesson,'q'=>'q'.($q_position+2)]))->with('Success', 'Correct Answer!');
                    }else{
                        $next_lession = Lession::where('chapter_id',$current_ch->id)->where('position',$lesson_position + 1)->first();
                        if(!empty($next_lession)){
                            return redirect(route('user_lesson_view',['name'=>$name,'ch'=>$ch,'lesson'=>'lesson'.($lesson_position + 2)]))->with('Success', 'Correct Answer!');
                        }else{
                            return back()->with('success', 'Correct Answer!');
                        }
                    }
                }else{
                    $exam = Exam::where('question_id',$question_id)
                        ->where('user_id',$user->id)->first();
                    $exam->score = ($exam->score - $current_que->question_join->point_incorrect);
                    $exam->save();
                    return back()->with('error', 'Incorrect Answer!');
                }
            }
        }else{
            return redirect('/'); 
        }
    }
    
    public function getUpdate_profile(){
        $user = Sentinel::check();
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        return view('update_profile', compact('user','score_count'));
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
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        return view('change_password', compact('user','score_count'));
        
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
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score) as user_score')->get();
        return view('user.student_profile', compact('user','score_count'));
    }

}
