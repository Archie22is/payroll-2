<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $dates = ['deleted_at','updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	/*
	relational table to profile
	*/
	public function profile()
	{
		return $this->hasOne('Profile','id','profilesId');
	}
	public function contact()
	{
		return $this->hasOne('UserContact','user_id','id');
	}
	public function friends()
	{
		return $this->hasMany('Friends','parent_id','id');
	}
	public function company()
	{
		return $this->hasOne('Company','user_id','id');
	}

}
