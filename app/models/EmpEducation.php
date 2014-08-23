<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpEducation extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='emp_education';
	protected $dates=['deleted_at','updated_at'];
}