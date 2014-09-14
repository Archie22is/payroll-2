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
	public function branch()
	{
		return $this->hasOne('Branch','user_id','id');
	}
	// starts Employee Relations
	public function employee()
	{
		return $this->hasOne('Employee','user_id','id');
	}
	public function empIdentity()
	{
		return $this->hasOne('EmpIdentification','user_id','id');
	}
	public function empBankDetail()
	{
		return $this->hasOne('EmpBankDetail','user_id','id');
	}
	public function empPfEsi()
	{
		return $this->hasOne('PfEsi','user_id','id');
	}
	public function empJobDetail()
	{
		return $this->hasOne('JobDetails','user_id','id');
	}
	public function empSalary()
	{
		return $this->hasOne('SalaryPackage','user_id','id');
	}
	public function empEducation()
	{
		return $this->hasOne('EmpEducation','user_id','id');
	}
	public function empWorkExperiance()
	{
		return $this->hasMany('WorkExperiance','user_id','id');
	}
	public function empDocument()
	{
		return $this->hasMany('EmpDoc','user_id','id');
	}
	public function empClient()
	{
		return $this->hasOne('Company','user_id','id');
	}
	public function empAttend()
	{
		return $this->hasOne('EmpAttendance','emp_id','id');
	}
	//Ends Employee Relations

}
