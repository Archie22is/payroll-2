<?php 
namespace App\Controller\Client;
class ControllerBase extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('client');
	}
}