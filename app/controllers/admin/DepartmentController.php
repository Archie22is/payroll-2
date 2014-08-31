<?php
namespace App\Controller\Admin;
class DepartmentController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$department=\Department::paginate(20);
		return \View::make('admin/department.manage')
					->with('depart',$department);
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
		$data=\Input::all();
		$messages=array(
			'name.required'=>'Department name is required',
			'name.unique'  =>'This department name already exist !',
			'code.required'=>'Department code is required',
			'code.unique'  =>'This department code already exist !');
		$validator=\Validator::make($data,array(
					'name'=>'required|unique:department',
					'code'=>'required|unique:department'
					),$messages);
		if($validator->fails())
		{
			return \Redirect::back()
					->withInput()
					->withErrors($validator)
					->with('tab','addNew');
		}
		else
		{
			$dept=\Department::insertGetId(array(
					'name'=>$data['name'],
					'code'=>$data['code']
					));
			if($dept)
			{
				return \Redirect::back()
					->with('success','Successfully created');
			}
			else
			{
				return \Redirect::back()
					->with('error','Failed to create department try again');
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dept= \Department::findOrFail($id);
		if($dept)
		{
			return \View::make('admin/department.edit')
					->with('dept',$dept);
		}
		else
		{
			return \Redirect::back()
					->with('error','Not found');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$dept=\Department::findOrFail($id);
		$data=\Input::all();
		$messages=array(
			'name.required'=>'Department name is required',
			'name.unique'  =>'This department name already exist !',
			'code.required'=>'Department code is required',
			'code.unique'  =>'This department code already exist !');
		$validator=\Validator::make($data,array(
					'name'=>'required|unique:department,name,'.$id,
					'code'=>'required|unique:department,code,'.$id
					),$messages);
		if($validator->fails())
		{
			return \Redirect::back()
					->withInput()
					->withErrors($validator)
					->with('tab','addNew');
		}
		else
		{
			$dept->name = $data['name'];
			$dept->code = $data['code'];
			if($dept->save())
			{
				return \Redirect::to('admin/dept')
						->with('success','Successfulluy updated');
			}
			else
			{
				return \Redirect::back()
						->with('error','Failed to update');
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$del=\Department::findOrFail($id);
		if($del->delete())
		{
			return \Redirect::back()
					->with('success','Successfully deleted');
		}
	}


}
