<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class BranchEmp extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='branch_emp';
	protected $dates=['deleted_at','updated_at'];
	public function emp()
	{
		return $this->hasOne('User','id','emp_id');
	}
	public function user()
	{
		return $this->hasOne('User','id','branch_id');
	}
	public function branch()
	{
		return $this->hasOne('Branch','user_id','branch_id');
	}
	public function empJob()
	{
		return $this->hasOne('JobDetails','user_id','emp_id');
	}
}