<?php 
namespace App\Controller\Admin;

class CTCController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = \CTCComponent::paginate(20);
		return \View::make('admin/ctc.create')
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
		
		$data = \Input::all();
		$rule=array('component_name'=>'required|unique:ctc_component',
					'component_code'=>'required|unique:ctc_component',
					'effective_date'=>'required',
					'formula'		=>'required_if:calculation_type,formula');

		$validate = \Validator::make($data,$rule);
		if($validate->fails())
		{
			return \Redirect::back()
					->withErrors($validate)
					->with(\Input::flash())
					->with('error','Check all fields');
		}
		else
		{
			$component_name       = $data['component_name'];
			$component_code       = $data['component_code'];
			$effective_date       = date('Y-m-d',strtotime($data['effective_date']));
			$component_type       = $data['component_type'];
			$calculation_type     = $data['calculation_type'];
			$formula              = $data['formula'];
			$show_pay_slip        = $data['show_pay_slip'];
			$attendance_dependant = $data['attendance_dependant'];
			// Insertion
			\DB::beginTransaction();
			$ctc = \CTCComponent::insert(array(
					'component_name'       => $component_name,
					'component_code'       => $component_code,
					'effective_date'       => $effective_date,
					'component_type'       => $component_type,
					'calculation_type'     => $calculation_type,
					'formula'              => $formula,
					'show_pay_slip'        => $show_pay_slip,
					'attendance_dependant' => $attendance_dependant
				));
			if(!$ctc)
			{
				\DB::rollback();
				return \Redirect::back()
						->with('error',$ctc->getMessage())
						->with(\Input::flash());
			}
			else
			{
				// add new component name in salary_package table
				if(!\Schema::hasColumn('salary_package',$component_name))
				{
					\Schema::table('salary_package',function($table) use($component_name){
						$table->float($component_name)->after('annual_ctc');
					});
				}
				\DB::commit();
					return \Redirect::back()
						->with('success','Successfully added');
				
				
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
		$comp = \CTCComponent::findOrFail($id);
		return \View::make('admin/ctc.edit')
				->with('comp',$comp);

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
			$data =\Input::all();
			$id = $data['id'];
			$rule=array('component_name'=>'required|unique:ctc_component,component_name,'.$id,
					'component_code'=>'required|unique:ctc_component,component_code,'.$id,
					'effective_date'=>'required',
					'formula'		=>'required_if:calculation_type,formula');

			$validate = \Validator::make($data,$rule);
			if($validate->fails())
			{
				$msg = array('error'=>$validate->messages()->first());
				echo json_encode($msg);
				return;
			}
		
			else
			{
				$component_name = $data['component_name'];
				$component = \CTCComponent::findOrFail($id);
				// Rename in column in table
				\Schema::table('salary_package',function($t) use($component,$component_name){
					$t->renameColumn($component->component_name,$component_name);
				});
				$component->component_name   = $data['component_name'];
				$component->component_code   = $data['component_code'];
				$component->effective_date   = date('Y-m-d',strtotime($data['effective_date']));
				$component->component_type   = $data['component_type'];
				$component->calculation_type = $data['calculation_type'];
				$component->formula          = $data['formula'];
				$component->show_pay_slip    = $data['show_pay_slip'];
				$component->save();

				\Session::flash('success','Successfully updated');
				$msg = array('success'=>'Successfully updated');
				echo json_encode($msg);
				return;
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
		$del = \CTCComponent::findOrFail($id);
		if($del->delete())
		{
			return \Redirect::back()
				->with('success','Successfully deleted');
		}
	}


}
