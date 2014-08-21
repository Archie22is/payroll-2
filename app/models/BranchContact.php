<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo,
    Illuminate\Database\Eloquent\Relations\BelongsToMany,
    Illuminate\Database\Eloquent\Relations\HasMany;
class BranchContact extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='branch_contact';
	protected $dates = ['deleted_at'];
}