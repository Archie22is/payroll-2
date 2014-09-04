<?php 
namespace App\Lib;
class libEmp extends \Eloquent
{
	protected $table='branch';
	public static function listBranch()
	{
		$list = \Branch::get(array('user_id','branch_name'));
		return $list;
	}
	public static function clientByBranch($id)
	{
		$list = \Friends::where('parent_id','=',$id)->get();
		return $list;
	}
	
}