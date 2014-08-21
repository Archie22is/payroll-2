<?php 
namespace App\Controller\Admin;
class BranchController extends ControllerBase
{
	public function index()
	{

		$branch=\Branch::with('contact')->paginate(15);
		return \View::make('admin/branch.branch_detail')->with('branch',$branch);
	}
	public function store()
	{
		// Transaction strats here because we are connecting three tables
		\DB::beginTransaction();
		//User credintial information
		$username     = \Input::get('username');
		$password     = \Input::get('password');
		$p_email      = \Input::get('p_email');
		$s_contact_person = \Input::get('s_contact_person');
		$hashPassword =\Hash::make($password);
		//Insert user credentials
		$uId       = \User::insertGetId(array(
					'username'    =>$username,
					'password'    =>$hashPassword,
					'email'		  =>$p_email,
					'profilesId'  =>2,
					'active'      =>'Y',
					'displayname' =>$s_contact_person
				));
		if(!$uId)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to save');
		}
		
		$branch_name          = \Input::get('branch_name');
		$branch_code          = \Input::get('branch_code');
		$branch_address       = \Input::get('branch_address');
		$branch_city          = \Input::get('branch_city');
		$branch_state         = \Input::get('branch_state');
		$branch_pin           = \Input::get('branch_pin');
		$branch_land_line     = \Input::get('branch_land_line');
		$branch_alt_land_line = \Input::get('branch_alt_land_line');
		$branch_fax           = \Input::get('branch_fax');
		// Insert Branch into table
		$branchId             = \Branch::insertGetId(array(
					'branch_name'          => $branch_name,
					'branch_code'          => $branch_code,
					'branch_address'       => $branch_address,
					'branch_city'          => $branch_city,
					'branch_state'         => $branch_state,
					'branch_pin'           => $branch_pin,
					'branch_land_line'     => $branch_land_line,
					'branch_alt_land_line' => $branch_alt_land_line,
					'branch_fax'           => $branch_fax,
					'user_id'              => $uId
	    			));
		if(!$branchId)
		{
			\DB::callback();
			return \Redirect::back()->with('error','Failed to save');
		}
		// Branch contact information
		$branch_head      = \Input::get('branch_head');
		$p_mobile_no      = \Input::get('p_mobile_no');
		$p_alt_mobile_no  = \Input::get('p_alt_mobile_no');
		$p_email          = \Input::get('p_email');
		$p_alt_email      = \Input::get('p_alt_email');
		
		$s_mobile_no      = \Input::get('s_mobile_no');
		$s_alt_mobile_no  = \Input::get('s_alt_mobile_no');
		$s_email          = \Input::get('s_email');
		$s_alt_email      = \Input::get('s_alt_email');
		//Insert Data to contact table
		$contactId        =\BranchContact::insertGetId(array(
							'branch_head'      => $branch_head,
							'p_mobile_no'      => $p_mobile_no,
							'p_alt_mobile_no'  => $p_alt_mobile_no,
							'p_email'          => $p_email,
							'p_alt_email'      => $p_alt_email,
							's_contact_person' => $s_contact_person,
							's_mobile_no'      => $s_mobile_no,
							's_alt_mobile_no'  => $s_alt_mobile_no,
							's_email'          => $s_email,
							's_alt_email'      => $s_alt_email,
							'user_id'          => $uId,
							'branch_id'        => $branchId
	    					));
		if(!$contactId)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to add');
		}
		
		elseif($contactId)
		{
			\DB::commit();
			\Mail::send('emails.user_credential',array('name'=>$s_contact_person,'username'=>$username,'password'=>$password),function($message) use($p_email,$username){
				$message->to($p_email,$username)->subject('User Credential');
			});
			return \Redirect::back()->with('success','Successfully added');
		}
		print_r(\Input::all());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branch=\Branch::where('id','=',$id)->with('contact')->firstOrFail();
		return \View::make('admin/branch.edit')->with('branch',$branch);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		\DB::beginTransaction();
		$branch=\Branch::where('id','=',$id)->firstOrFail();
		$contact=\BranchContact::where('branch_id','=',$id)->firstOrFail();
		$branch->branch_name          = \Input::get('branch_name');
		$branch->branch_code          = \Input::get('branch_code');
		$branch->branch_address       = \Input::get('branch_address');
		$branch->branch_city          = \Input::get('branch_city');
		$branch->branch_state         = \Input::get('branch_state');
		$branch->branch_pin           = \Input::get('branch_pin');
		$branch->branch_land_line     = \Input::get('branch_land_line');
		$branch->branch_alt_land_line = \Input::get('branch_alt_land_line');
		$branch->branch_fax           = \Input::get('branch_fax');
		if(!$branch->save())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to update');
		}
		$contact->branch_head      = \input::get('branch_head');
		$contact->p_mobile_no      = \input::get('p_mobile_no');
		$contact->p_alt_mobile_no  = \input::get('p_alt_mobile_no');
		$contact->p_email          = \input::get('p_email');
		$contact->p_alt_email      = \input::get('p_alt_email');
		$contact->s_contact_person = \input::get('s_contact_person');
		$contact->s_mobile_no      = \input::get('s_mobile_no');
		$contact->s_alt_mobile_no  = \input::get('s_alt_mobile_no');
		$contact->s_email          = \input::get('s_email');
		$contact->s_alt_email      = \input::get('s_alt_email');
		if(!$contact->save())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to update');
		}
		else
		{
			\DB::commit();
			return \Redirect::route('admin.branch.index')->with('success','Successfully Updated');
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
		
		\DB::beginTransaction();
		$branch=\Branch::where('id','=',$id)->with('contact')->firstOrFail();
		$user=\User::where('id','=',$branch->user_id)->firstOrFail();
		$contact=\BranchContact::where('branch_id','=',$id)->firstOrFail();
		if(!$user->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		if(!$branch->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		if(!$contact->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		else
		{
			\DB::commit();
			return \Redirect::back()->with('success','Successfully deleted');
		}
	}
}