<?php 
namespace App\Controller\Admin;
class IndexController extends ControllerBase
{
	public function getIndex()
	{
		return \View::make('admin/index.index');
	}
}