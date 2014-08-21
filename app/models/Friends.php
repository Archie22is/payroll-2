<?php 
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo,
    Illuminate\Database\Eloquent\Relations\BelongsToMany,
    Illuminate\Database\Eloquent\Relations\HasMany;
class Friends extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='friends';
	protected $dates = ['deleted_at','updated_at'];
	public function user()
	{
		return $this->hasOne('User','id','child_id');
	}
}