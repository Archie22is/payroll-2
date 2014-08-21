<?php 
namespace App\Controller\Branch;
class ControllerBase extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('branch');
	}
}