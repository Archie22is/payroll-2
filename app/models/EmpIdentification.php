<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpIdentification extends Eloquent
{

    use SoftDeletingTrait;
	protected $table='emp_identification';
    protected $dates = ['deleted_at'];
	
}