<?php  
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Company extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='company';
	protected $dates=['deleted_at','updated_at'];
}