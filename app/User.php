<?php namespace App;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends EloquentUser {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        public $primaryKey = 'id';
        public $incrementing = false;
        protected $loginNames = ['user_name'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    
    
    public function teacher_join(){
        return $this->belongsToMany('App\Courses','teacher_score','users_id','courses_id')->with('category','chapter');
    }
    public function course(){
        return $this->belongsToMany('App\Courses','teacher_score','users_id','courses_id')->with('category','chapter');
    }
    
    public function user_course(){
        return $this->hasMany('App\UserScore','user_id','id')->with('course');
    }
    
    public function role(){
    	return $this->belongsToMany('App\Roles','role_users','role_id','user_id');
    }
}
