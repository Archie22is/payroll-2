<?php 
namespace App\Controller\Admin;

class EmployeeController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$emp=\User::where('profilesId','=',4)->paginate(20);
		return \View::make('admin/emp.manage_emp')
				->with('list',$emp);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user=\User::findOrFail($id);
		return \View::make('admin/emp.view_detail')
				->with('emp',$user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * 
	 * @return Response
	 */
	public function search()
	{
		
		$field = \Input::get('f');
		if($value = \Input::get('v'))
		{
			
			if($field =='username')
			{
				$emp = \User::where('username','=',"$value")->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'email')
			{
				$emp = \User::where('email','=',"$value")->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'name')
			{
				// where condition we are checking in employee table of relation
				$emp =\User::whereHas('employee',function($q) use($value){
					$q->where('firstname','like',"%$value%");
				})->where('profilesId','=',4)->paginate(20);
				
			}
			if($field == 'mobile')
			{
				//where condition we are cheking in contact table of relation table
				$emp = \User::whereHas('contact',function($q) use($value){
					$q->where('mobile','=',"$value");
				})->where('profilesId','=',4)->paginate(20);
			}
			return \View::make('admin/emp.search_emp')
							->withInput(\Input::flash())
							->with('list',$emp);
		}
		else
		{
			if($field == 'branch')
			{
				$branch_id=\Input::get('branchId');
				$client_id=\Input::get('clientId');
				if($branch_id)
				{
					$validate=\Validator::make(array('branch'=>$branch_id),array('branch'=>'required|numeric'));
					if($validate->fails())
					{
						return \View::make('admin/emp.search_emp')
								->withErrors($validate)
								->withInput(\Input::flash())
							    ->with('list',array());
					}
					if($client_id == 'in-house')
					{
						$emp = \User::whereHas('empJobDetail',function($q) use($branch_id){
							$q->where('emp_type','=','inhouse');
							$q->whereHas('branch',function($s) use($branch_id){
								$s->where('branch_id','=',$branch_id);
							});
						})->paginate(20);
						return \View::make('admin/emp.search_emp')
						    ->withInput(\Input::flash())
							->with('list',$emp);
					}
					else
					{
						$valid=\Validator::make(array('client'=>$client_id),array('client'=>'required|numeric'));
						if($valid->fails())
						{
							return \View::make('admin/emp.search_emp')
								->withErrors($valid)
								->withInput(\Input::flash())
							    ->with('list',array());
						}
						else
						{
							$emp = \User::whereHas('empJobDetail',function($q) use($client_id){
								$q->where('emp_type','=','outsource');
								$q->where('client_id','=',$client_id);
							})->paginate(20);
							return \View::make('admin/emp.search_emp')
							->withInput(\Input::flash())
							->with('list',$emp);
						}
					}
				}
			}
			if($field == 'all' )
			{
				$emp = \User::where('profilesId','=',4)->paginate(20);
				return \View::make('admin/emp.search_emp')
							->withInput(\Input::flash())
							->with('list',$emp);
			}
			else
			{
				return \View::make('admin/emp.search_emp')
				            ->withInput(\Input::flash())
							->with('list',array());
			}
			
		}
	}
	public function clientByBranch()
	{
		$id=\Input::get('id');
		$list = \Friends::where('parent_id','=',$id)->get();
		$option="<option value=''>----Select Client-----</option><option value='in-house'>In House </option>";
		foreach($list as $value)
		{
			$option .="<option value='$value->child_id'>".$value->user->company->company_name."</option>";
			// $json[$value->child_id]=$value->user->company->company_name;
		}
		echo $option;
		return;	
	}

}
