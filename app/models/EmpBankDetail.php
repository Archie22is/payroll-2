<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpBankDetail extends Eloquent
{

    use SoftDeletingTrait;
	protected $table='emp_bank_detail';
    protected $dates = ['deleted_at'];
	
}