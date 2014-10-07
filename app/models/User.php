<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    public static $rules = array(
        'fname'=>'required',
        'lname'=>'required',
        'phone'=>'required',
        'username'=>'required',
        'password'=>'required|alphaNum|min:3',
        'address'=>'required',
        'email'=>'required',
        'country'=>'required',
        'city'=>'required'
    );

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

    public  function fullname(){
        return $this->fname ." ".$this->lname;
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
