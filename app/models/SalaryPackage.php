<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class SalaryPackage extends Eloquent
{
	use softDeletingTrait;
	protected $table =	'salary_package';
	protected $dates =	['updated_at','deleted_at'];

}