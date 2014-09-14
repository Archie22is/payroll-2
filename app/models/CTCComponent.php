<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class CTCComponent extends Eloquent
{
	 use SoftDeletingTrait;
	protected $table = 'ctc_component';
	protected $dates = ['updated_at','deleted_at'];

}