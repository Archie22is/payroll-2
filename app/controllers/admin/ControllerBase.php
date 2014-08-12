<?php 
namespace App\Controller\Admin;
class ControllerBase extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('admin');
		
	}
}