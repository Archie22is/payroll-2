<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpAttendance extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'emp_attendance';
	protected $dates=['deleted_at','updated_at'];

	public function user()
	{
		return $this->hasOne('User','id','emp_id');
	}
	public function emp()
	{
		return $this->hasOne('Employee','user_id','emp_id');
	}
}