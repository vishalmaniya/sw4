<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Model binding into route
 */

Route::group(['middleware' => 'web'], function () {

    //Route::model('blogcategory', 'App\BlogCategory');
    //Route::model('blog', 'App\Blog');
    //Route::model('file', 'App\File');
    //Route::model('task', 'App\Task');
    //Route::model('users', 'App\User');

    Route::pattern('slug', '[a-z0-9- _]+');

    Route::get('favorite','FavoriteController@index');

    Route::group(array('prefix' => 'admin'), function () {

        # Error pages should be shown without requiring login
        Route::get('404', function () {
                return View('admin/404');
        });
        Route::get('500', function () {
                return View::make('admin/500');
        });

        # Lock screen
        Route::get('lockscreen', function () {
                return View::make('admin/lockscreen');
        });

        # All basic routes defined here
        Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
        Route::post('signin', 'AuthController@postSignin');
        Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
        Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword'));
        Route::get('login2', function () {
                return View::make('admin/login2');
        });

        # Register2
        Route::get('register2', function () {
                return View::make('admin/register2');
        });
        Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

        # Forgot Password Confirmation
        Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
        Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

        # Logout
        Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

        # Account Activation
        Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));
    });

    Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelAdmin'), function () {
        # Dashboard / Index
        Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));


        # User Management
        Route::group(array('prefix' => 'users'), function () {
            Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
            Route::get('create', 'UsersController@create');
            Route::get('edit/{user}',array('as'=>'admin.users.edit' ,'uses'=>'UsersController@edit'));
            Route::put('update',array('as'=>'admin.users.store' ,'uses'=>'UsersController@update'));
            Route::put('update_user',array('as'=>'admin.users.update' ,'uses'=>'UsersController@update_change'));

            Route::post('create', 'UsersController@store');
            Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@destroy'));
            Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
            Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
            Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
            Route::post('passwordreset', 'UsersController@passwordreset');
        });
        Route::resource('users', 'UsersController');
        Route::resource('category', 'CategoryController');
        Route::resource('courses', 'CoursesController');
        Route::resource('chapters', 'ChaptersController');
        Route::resource('lession', 'LessionController');
        Route::resource('questions', 'QuestionsController');
        Route::resource('contact', 'ContactController');
        Route::resource('classroom','ClassroomController');
        
        Route::post('onchange_course',array('as'=>'change_course','uses'=>'LessionController@onchange_course'));
        
        Route::get('courses-to-teacher',array('as'=>'courses_to_teacher','uses'=>'CoursesController@courses_to_teacher'));
        Route::post('courses-to-teacher','CoursesController@post_courses_to_teacher');

        Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

            # Group Management
        Route::group(array('prefix' => 'groups'), function () {
            Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@index'));
            Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@create'));
            Route::post('create', 'GroupsController@store');
            Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@edit'));
            Route::post('{groupId}/edit', 'GroupsController@update');
            Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@destroy'));
            Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
            Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
        });

        Route::get('crop_demo', function () {
            return redirect('admin/imagecropping');
        });
        Route::post('crop_demo','JoshController@crop_demo');

        /* laravel example routes */
        # datatables
        Route::get('datatables', 'DataTablesController@index');
        Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

        # Remaining pages will be called from below controller method
        # in real world scenario, you may be required to define all routes manually

        Route::get('{name?}', 'JoshController@showView');

    });
    Route::group(['middleware' => 'data_traffic'], function () {
        #FrontEndController
        Route::get('user-dashboard', array('as' => 'user.dashboard','uses' => 'FrontEndController@user_dashboard'));
        Route::get('teacher-dashboard', array('as' => 'teacher.dashboard','uses' => 'FrontEndController@teacher_dashboard'));
        
        #purchase courses
        Route::get('purchased-courses',array('as'=>'purchased_courses','uses'=>'FrontEndController@getCourses'));
        Route::get('teacher/courses/{id}/{name}',array('as'=>'teacher_courses_view','uses'=>'FrontEndController@teacher_courses_preview'));
        
        #change-password, update-profile
        Route::get('update_profile',array('as'=>'update_profile','uses'=>'FrontEndController@getUpdate_profile'));
        Route::post('update_profile','FrontEndController@postUpdate_profile');
        Route::get('change_password',array('as'=>'change_password','uses'=>'FrontEndController@getChange_password'));
        Route::post('change_password','FrontEndController@postChange_password');
        
        #class_room
        Route::get('class_room',array('as'=>'class_room','uses'=>'FrontEndController@class_room'));
        
        #public profile
        Route::get('user-public-profile',array('as'=>'public_profile','uses'=>'FrontEndController@getPublic_profile'));
        
        Route::post('login',array('as' => 'login','uses' => 'FrontEndController@postLogin'));
        Route::get('register', array('as' => 'register','uses' => 'FrontEndController@getRegister'));
        Route::post('register','FrontEndController@postRegister');
        Route::get('activate/{userId}/{activationCode}',array('as' =>'activate','uses'=>'FrontEndController@getActivate'));
        Route::get('forgot-password',array('as' => 'forgot-password','uses' => 'FrontEndController@getForgotPassword'));
        Route::post('forgot-password','FrontEndController@postForgotPassword');
        # Forgot Password Confirmation
        Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
        Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
        # My account display and update details
        Route::group(array('middleware' => 'SentinelUser'), function () {
            Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
            Route::put('my-account', 'FrontEndController@update');
        });
        Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));
        
        # courses list
        Route::get('courses',array('as'=>'courses','uses'=>'FrontEndController@getCourses'));
        Route::get('courses/{id}/{name}',array('as'=>'courses_view','uses'=>'FrontEndController@getCourse'));
        Route::get('user/courses/{id}/{name}',array('as'=>'user_courses_view','uses'=>'FrontEndController@getCourse'));
        
        
        #support
        Route::get('support',array('as'=>'support','uses'=>'FrontEndController@getSupport'));
        Route::post('support','ContactController@store');
        # contact form
        Route::post('contact',array('as' => 'contact','uses' => 'FrontEndController@postContact'));

        #frontend views
        Route::get('/', array('as' => 'home', 'uses'=>'FrontEndController@getLogin'));

        Route::get('{name?}', 'JoshController@showFrontEndView');
        # End of frontend views

    });
});