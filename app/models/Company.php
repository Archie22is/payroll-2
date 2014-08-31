<?php  
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Company extends Eloquent
{
	use SoftDeletingTrait;
	protected $table='company';
	protected $dates=['deleted_at','updated_at'];

	public function contact()
	{
		return $this->hasOne('CompanyContact','company_id','id');
	}
	public function esi()
	{
		return $this->hasOne('CompanyEsi','company_id','id');
	}
	public function incometax()
	{
		return $this->hasOne('CompanyIncomeTax','company_id','id');
	}
	public function professionaltax()
	{
		return $this->hasOne('CompanyProfessionalTax','company_id','id');
	}
	public function provident()
	{
		return $this->hasOne('CompanyProvident','company_id','id');
	}
	public function regt()
	{
		return $this->hasOne('CompanyRegistration','company_id','id');
	}

}