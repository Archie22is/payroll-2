<?php 
namespace App\Controller\Admin;
class BranchController extends ControllerBase
{
	public function index()
	{

		$user=\User::where('profilesId','=',2)->paginate(15);
		return \View::make('admin/branch.branch_detail')->with('user',$user);
	}
	public function store()
	{
		// Transaction strats here because we are connecting three tables
		\DB::beginTransaction();
		//User credintial information
		$username     = \Input::get('branch_code');
		$password     = str_random(10);
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
		$branch=\Branch::where('id','=',$id)->firstOrFail();
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
		
		$branch=\Input::get('branch_id');
		$contact=\Input::get('contact_id');
		if($branch)
		{
			$updateBranch 						= \Branch::findOrFail($branch);
			$updateBranch->branch_name          = \Input::get('branch_name');
			$updateBranch->branch_code          = \Input::get('branch_code');
			$updateBranch->branch_address       = \Input::get('branch_address');
			$updateBranch->branch_city          = \Input::get('branch_city');
			$updateBranch->branch_state         = \Input::get('branch_state');
			$updateBranch->branch_pin           = \Input::get('branch_pin');
			$updateBranch->branch_land_line     = \Input::get('branch_land_line');
			$updateBranch->branch_alt_land_line = \Input::get('branch_alt_land_line');
			$updateBranch->branch_fax           = \Input::get('branch_fax');
			if($updateBranch->save())
			{
				echo "Branch information successfully updated";
				return;
			}
			else
			{
				echo "Failed to update";
				return;
			}
		}
		if($contact)
		{
			$updateContact 					 = \BranchContact::findOrFail($contact);
			$updateContact->branch_head      = \Input::get('branch_head');
			$updateContact->p_mobile_no      = \Input::get('p_mobile_no');
			$updateContact->p_alt_mobile_no  = \Input::get('p_alt_mobile_no');
			$updateContact->p_email          = \Input::get('p_email');
			$updateContact->p_alt_email      = \Input::get('p_alt_email');
			$updateContact->s_contact_person = \Input::get('s_contact_person');
			$updateContact->s_mobile_no      = \Input::get('s_mobile_no');
			$updateContact->s_alt_mobile_no  = \Input::get('s_alt_mobile_no');
			$updateContact->s_email          = \Input::get('s_email');
			$updateContact->s_alt_email      = \Input::get('s_alt_email');
			if($updateContact->save())
			{
				echo " Contact Successfully updated";
				return;
			}
			else
			{
				echo "Failed to update";
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
		
		\DB::beginTransaction();
		$branch=\Branch::where('id','=',$id)->with('contact')->firstOrFail();
		$user=\User::where('id','=',$branch->user_id)->firstOrFail();
		$contact=\BranchContact::where('branch_id','=',$id)->firstOrFail();
		// $branchEmp=\BranchEmp::where('branch_id','=',$id)->firstOrFail();
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
		// if(!$branchEmp->delete())
		// {
		// 	\DB::rollback();
		// 	return \Redirect::back()->with('error','Failed to delete');
		// }
		else
		{
			\DB::commit();
			return \Redirect::back()->with('success','Successfully deleted');
		}
	}
}