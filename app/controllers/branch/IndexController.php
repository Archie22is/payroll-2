<?php 
namespace App\Controller\Branch;
class IndexController extends ControllerBase
{
	public function getIndex()
	{
		return \View::make('index.index');
	}
}