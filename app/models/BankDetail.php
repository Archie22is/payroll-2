<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class BankDetail extends Eloquent
{

    use SoftDeletingTrait;
	protected $table='bank_detail';
    protected $dates = ['deleted_at'];
	
}