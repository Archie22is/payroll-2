<?php 
namespace App\Controller\Client;

class EmployeeController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$uId=\Auth::user()->id;
		$uId   = \Auth::user()->id;
		$field = \Input::get('f');
		if($value = \Input::get('v'))
		{
			
			if($field =='username')
			{
				$emp = \User::whereHas('empJobDetail',function($q) use($uId){
							$q->where('client_id',$uId);
							})
						->where('username','=',$value)
						->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'email')
			{
				$emp =  \User::whereHas('empJobDetail',function($q) use($uId){
							$q->where('client_id',$uId);
							})
						->where('email','=',$value)
						->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'name')
			{
				// where condition we are checking in employee table of relation
				$emp = \User::whereHas('empJobDetail',function($q) use($uId){
							$q->where('client_id',$uId);
							})
						->whereHas('employee',function($q) use($value){
							$q->where('firstname','like',"%$value%");
						})
 						->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'mobile')
			{
				//where condition we are cheking in contact table of relation table
				$emp = \User::whereHas('contact',function($q) use($value){
					$q->where('mobile','=',"$value");
				})->where('profilesId','=',4)->paginate(20);
			}
			return \View::make('client/emp.manage_employee')
					->withInput(\Input::flash())
					->with('list',$emp);
		}
		else
		{
			$emp=\User::whereHas('empJobDetail',function($q) use($uId){
				$q->where('client_id','=',$uId);
				})->paginate(20);
				return \View::make('client/emp.manage_employee')
					->withInput(\Input::flash())
					->with('list',$emp);
		}
		
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
		$uId=\Auth::user()->id;
		$emp=\JobDetails::where('user_id','=',$id)->where('client_id','=',$uId)->first();
		if($emp)
		{
			return \View::make('client/emp.emp_detail')
						->with('emp',$emp);
		}
		else
		{
			return \App::abort(404);
		}
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
	public function search($id)
	{
		$uId=\Auth::user()->id;
		$emp=\User::whereHas('empJobDetail',function($q) use($uId){
				$q->where('client_id','=',$uId);
		})->paginate(20);
		return \View::make('client/emp.search_emp.blade.php')
					->with('list',$emp);
	}


}
