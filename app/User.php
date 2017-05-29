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
    
    public static function boot()
    {
        parent::boot();

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $time = time();
        $split = str_split($randomString,3);
        $sring = $split[0].$time.$split[1];

        static::creating(function ($value)use($sring) {
            $value->id = $sring;
        });
    }
    
    public function teacher_join(){
        return $this->belongsToMany('App\Courses','teacher_score','users_id','courses_id')->with('category','chapter');
    }
    public function course(){
        return $this->belongsToMany('App\Courses','teacher_score','users_id','courses_id')->with('category','chapter');
    }
    
    public function user_course(){
        return $this->hasMany('App\UserScore','user_id','id')->with('course');
    }
}
