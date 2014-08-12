<?php 
namespace App\Controller\Admin;
class UserController extends ControllerBase
{
	public function getView()
	{
		
	}
	public function getCreate()
	{
		return \View::make('admin/user.create');
	}
}