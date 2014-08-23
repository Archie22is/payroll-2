<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class PfEsi extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='pf_esi';
	protected $dates=['deleted_at','updated_at'];
}