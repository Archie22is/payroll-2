<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Department extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='department';
	protected $dates=['deleted_at','updated_at'];
}