<?php
namespace App\Controller\Branch;
class EmpAttendanceController extends ControllerBase
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$uId      = \Auth::user()->id;
		$month    =\Input::get('month');
		$year     =\Input::get('year');
		$emp_type =\Input::get('emp_type');
		$client   =\Input::get('clientId');
		$empty = \User::where('id','=',0)->paginate(20);
		if(preg_match("/^(0[1-9]|1[0-2])$/",$month) && preg_match("/^[0-9]{4}$/",$year) && $emp_type)
		{
			$date = "$year-$month-01";
			if($emp_type == 'outsource')
			{
				if(is_numeric($client))
				{
					$check = \Friends::where('child_id','=',$client)->where('parent_id','=',$uId)->first();
					if($check)
					{
						$emps = \User::whereHas('empJobDetail',function($q) use($client){
							$q->where('emp_type','=','outsource');
							$q->where('client_id','=',$client);
						})->get();
						// get selected ids in array format
						$ids=array_pluck($emps,'id');
						if($ids)
						{
							foreach($ids as $id)
							{
								if(\EmpAttendance::where('emp_id','=',$id)->where('attend_date','=',"$date")->first())
								{
									// skip
								}
								else
								{
									\EmpAttendance::insert(array('emp_id'=>$id,'attend_date'=>$date));
								}
							}
							$employees=\EmpAttendance::whereIn('emp_id',$ids)->where('attend_date','=',"$date")->paginate(20);
							return \View::make('branch/attendance.emp_attendance')->with('list',$employees)->with(\Input::flash());
						}
						else
						{
							return \View::make('branch/attendance.emp_attendance')->with('list',$empty)->with(\Input::flash());
						}
					}
					else
					{
						return \View::make('branch/attendance.emp_attendance')->with('list',$empty)->with(\Input::flash());	
					}
				}
			}
			else
			{
				$emps=\User::whereHas('empJobDetail',function($q) use($uId){
								$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							})->where('emp_type','=','inhouse'); })->get();
				$ids = array_pluck($emps,'id');
				if($ids)
				{
					foreach($ids as $id)
					{
						if(\EmpAttendance::where('emp_id','=',$id)->where('attend_date','=',"$date")->first())
						{
							// skip
						}
						else
						{
							\EmpAttendance::insert(array('emp_id'=>$id,'attend_date'=>$date));
						}
					}
					$employees=\EmpAttendance::whereIn('emp_id',$ids)->where('attend_date','=',"$date")->paginate(20);
					return \View::make('branch/attendance.emp_attendance')->with('list',$employees)->with(\Input::flash());
				}
				else
				{
					return \View::make('branch/attendance.emp_attendance')->with('list',$empty)->with(\Input::flash());
				}

			}
		}
		else
		{
			return \View::make('branch/attendance.emp_attendance')->with('list',$empty)->with(\Input::flash());
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
		if(\Request::ajax())
		{
			$ids = \Input::get('id');
			$pay_days = \Input::get('pay_days');
			$present_days = \Input::get('present_days');
			$leave_days = \Input::get('leave_days');
			$lwp = \Input::get('lwp');
			$i=0;
			foreach($ids as $val)
			{
				$data = array('pay_days'=>$pay_days[$i],
								'present_days'=>$present_days[$i],
								'leave_days' => $leave_days[$i],
								'lwp'=>$lwp[$i]);
				$update = \EmpAttendance::where('id','=',$val)->update($data);
				$i++;
			}
		$msg = array('success'=>'Attendance updated successfully');
		echo json_encode($msg);
		return;
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
		//
	}


}
