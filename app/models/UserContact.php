<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class UserContact extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='user_contact';
	protected $dates=['deleted_at'];
	protected $fillable=array('user_id');

}