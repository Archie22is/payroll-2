<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo,
    Illuminate\Database\Eloquent\Relations\BelongsToMany,
    Illuminate\Database\Eloquent\Relations\HasMany;
class Branch extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='branch';
	protected $dates = ['deleted_at'];
	/*
	relational table to profile
	*/
	public function contact()
	{
		return $this->hasOne('BranchContact','branch_id','id');
	}
	
}