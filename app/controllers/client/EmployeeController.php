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
		$list=\JobDetails::where('client_id','=',$uId)->paginate(20);
		return \View::make('client/emp.manage_employee')
					->with('list',$list);
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


}
