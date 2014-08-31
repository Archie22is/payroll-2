<?php 
namespace App\Controller\Emp;
class ControllerBase extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('employee');
	}
}
