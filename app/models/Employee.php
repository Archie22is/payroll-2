<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Employee extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='employee';
	protected $dates = ['deleted_at'];
}