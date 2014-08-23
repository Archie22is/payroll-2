<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpDoc extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='emp_doc';
	protected $dates=['deleted_at','updated_at'];
}