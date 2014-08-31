<?php
namespace App\Controller\Branch;
class ClientController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$uId=\Auth::user()->id;
		// condition for this branch as clients search in friends table
		$client=\Friends::where('profilesId','=',3)->where('parent_id','=',$uId)->paginate(15);
		return \View::make('branch/client.manage')->with('client',$client);
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
		$uId=\Auth::user()->id;
		// User details
		// Transaction begins here
		\DB::beginTransaction();
		$displayname = \Input::get('displayname');
		$email       = \Input::get('email');
		$username    = \Input::get('username');
		$password    = \Input::get('password');
		$hashPassword = \Hash::make($password);
		$user        = \User::insertGetId(array(
						'displayname' => $displayname,
						'email'       => $email,
						'username'    => $username,
						'password'    => $hashPassword,
						'profilesId'  => 3,
						'active'     =>'Y'
						));
		if(!$user)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to add');
		}
		// User contact
		$mobile     = \Input::get('mobile');
		$alt_mobile =\Input::get('alt_mobile');
		$alt_email  = \Input::get('alt_email');
		//Insert data to user contact table
		$contact=\UserContact::insert(array(
					'mobile'     =>$mobile,
					'alt_mobile' =>$alt_mobile,
					'alt_email'  =>$alt_email
					
					));
		// insert frends table 
		$friends=\Friends::insert(array(
					'child_id'  =>$user,
					'parent_id' =>$uId,
					'profilesId'=>3
					));
		if(!$friends)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to add');
		}
		//Company info
		$company_name          = \Input::get('company_name');
		$company_address       = \Input::get('company_address');
		$company_city          = \Input::get('company_city');
		$company_state         = \Input::get('company_state');
		$company_pin           = \Input::get('company_pin');
		$company_land_line     = \Input::get('company_land_line');
		$company_alt_land_line = \Input::get('company_alt_land_line');
		$company_fax           = \Input::get('company_fax');
		$company_website       = \Input::get('company_website');
	    //Insert data to company table
	    $company = \Company::insertGetId(array(
					'company_name'          =>$company_name,
					'company_address'       =>$company_address,
					'company_city'          =>$company_city,
					'company_state'         =>$company_state,
					'company_pin'           =>$company_pin,
					'company_phone'    		=>$company_land_line,
					'company_alt_phone' 	=>$company_alt_land_line,
					'company_fax'           =>$company_fax,
					'company_website'       =>$company_website,
					'user_id'				=>$user
	    			));
	    // if company not inserted the rollback
	    if(!$company)
	    {
	    	\DB::rollback();
	    	return \Redirect::back()->with('error','Failed to add');
	    }
	    elseif($company)
	    {
	    	\DB::commit();
	    	\Mail::send('emails.user_credential',array('name'=>$displayname,'username'=>$username,'password'=>$password),function($message) use($email,$username){
				$message->to($email,$username)->subject('User Credential');
			});
	    	return \Redirect::route('branch.client.index')->with('success','Successfully added');
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
		$client=\User::where('id','=',$id)->firstOrFail();
		return \View::make('branch/client.edit')->with('client',$client);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update3($id)
	{
		// Transaction begins here
		\DB::beginTransaction();
		//user data
		$displayname       = \Input::get('displayname');
		//call user model
		$user              = \User::find($id);
		$user->displayname = $displayname;
		//update
		if(!$user->save())
		{
			\DB::callback();
			return \Redirect::back()->with('error','Failed to update');
		}
		//user contact detail
		$mobile              = \Input::get('mobile');
		$alt_mobile          =\Input::get('alt_mobile');
		$alt_email           = \Input::get('alt_email');
		//call user contact model
		$contact             =\UserContact::firstOrCreate(array('user_id'=>$id));
		$contact->mobile     =$mobile;
		$contact->alt_mobile =$alt_mobile;
		$contact->alt_email  =$alt_email;
		// update table
		if(!$contact->save())
		{
			\DB::callback();
			return \Redirect::back()->with('error','Failed to update');
		}
		//Company detail
		$company_name          = \Input::get('company_name');
		$company_address       = \Input::get('company_address');
		$company_city          = \Input::get('company_city');
		$company_state         = \Input::get('company_state');
		$company_pin           = \Input::get('company_pin');
		$company_land_line     = \Input::get('company_land_line');
		$company_alt_land_line = \Input::get('company_alt_land_line');
		$company_fax           = \Input::get('company_fax');
		$company_website       = \Input::get('company_website');
		//call company model
		$company= \Company::firstOrCreate(array('user_id'=>$id));
		$company->company_name          = $company_name;
		$company->company_address       = $company_address;
		$company->company_city          = $company_city;
		$company->company_state         = $company_state;
		$company->company_pin           = $company_pin;
		$company->company_phone     	= $company_land_line;
		$company->company_alt_phone 	= $company_alt_land_line;
		$company->company_fax           = $company_fax;
		$company->company_website       = $company_website;
		// update table
		if(!$company->save())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to update');
		}
		else
		{
			\DB::commit();
			return \Redirect::route('branch.client.index')->with('success','Successfully updated');
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
		
		$company=\Input::get('company_id');
		$contact=\Input::get('contact_id');
		if($company)
		{
			$updateCompany= \Company::findOrFail($company);
			$updateCompany->company_name          = \Input::get('company_name');
			$updateCompany->company_address       = \Input::get('company_address');
			$updateCompany->company_city          = \Input::get('company_city');
			$updateCompany->company_state         = \Input::get('company_state');
			$updateCompany->company_pin           = \Input::get('company_pin');
			$updateCompany->company_phone     	  = \Input::get('company_land_line');
			$updateCompany->company_alt_phone 	  = \Input::get('company_alt_land_line');
			$updateCompany->company_fax           = \Input::get('company_fax');
			$updateCompany->company_website       = \Input::get('company_website');
			if($updateCompany->save())
			{
				\Session::flash('success','Successfully updated');
				return;
			}
		}
		if($contact)
		{
			$uId 			   = \Input::get('user_id');
			$displayname       = \Input::get('displayname');
			// user display name update
			$user              = \User::findorFail($uId);
			$user->displayname = $displayname;
			// user contact
			//user contact detail
			$updateContact             = \UserContact::findOrFail($contact);
			$updateContact->mobile     = \Input::get('mobile');
			$updateContact->alt_mobile = \Input::get('alt_mobile');
			$updateContact->alt_email  = \Input::get('alt_email');
			if($updateContact->save() && $user->save())
			{
				\Session::flash('success','Successfully updated');
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
		//transaction strats
		\DB::beginTransaction();
		//delete user in user table
		$userDel = \User::find($id);
		if(!$userDel->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		//delete user from friends table
		$friendDel = \Friends::where('child_id','=',$id)->first();
		if(!$friendDel->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		//delete clients company
		$companyDel=\Company::where('user_id','=',$id)->first();
		if(!$companyDel->delete())
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Failed to delete');
		}
		else{
			\DB::commit();
			return \Redirect::back()->with('success','Successfully deleted');
		}
	}


}
