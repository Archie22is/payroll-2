<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class JobDetails extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='job_details';
	protected $dates=['deleted_at','updated_at'];
}