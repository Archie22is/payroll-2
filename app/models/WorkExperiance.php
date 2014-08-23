<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class WorkExperiance extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='work_experiance';
	protected $dates=['deleted_at','updated_at'];
}