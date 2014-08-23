<?php 
namespace App\Controller\Branch;
class EmployeeController extends ControllerBase {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$uId  =\Auth::user()->id;
		$clients=\Friends::where('parent_id','=',$uId)->get();
		$list =\BranchEmp::where('branch_id','=',$uId)->paginate(1);
		return \View::make('branch/emp.manage')
					->with('client',$client)
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

		//Transaction starts here
		\DB::beginTransaction();
		//user credintials
		//for user name prefix branch fetch users company name
		$uId        =\Auth::user()->id;
		$branch     =\Branch::where('user_id','=',$uId)->first();
		$prifix     = $branch->branch_code;// branch prifix code
		$id         =\BranchEmp::withTrashed()->where('branch_id','=',$uId)->count();// count all registered user of this branch
		$temp       =$id+1;// increase one 
		$postfix    =sprintf('%04d',$temp);// manupulate 000$temp
		$username   =$prifix.$postfix;
		$password   =str_random(10);
		$email      =\Input::get('email');
		$firstname  =\Input::get('firstname');
		$lastname   =\Input::get('lastname');
		$middlename =\Input::get('middlename');
		$displayname=$firstname.' '.$lastname;
		//Create User credential in user table
		$userId=\User::insertGetId(array(
					'displayname'=>$displayname,
					'username'   =>$username,
					'password'   =>\Hash::make($password),
					'email'      =>$email,
					'profilesId' =>'4',
					'active'     =>'Y'
					));
		// condition for create
		if(!$userId)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
		}
		//create branch employee
		$branchEmployee=\BranchEmp::insertGetId(array(
						'branch_id' =>$uId,
						'emp_id'    =>$userId
						));
		// condition for branchemployee
		if(!$branchEmployee)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
		}
		//  contact details
		$fathername     = \Input::get('fathername');
		$mothermaiden   = \Input::get('mothermaiden');
		$dateofbirth    = Implode('-',array_reverse(explode('/',\Input::get('dateofbirth'))));
		$maritialstatus = \Input::get('maritialstatus');
		$spousename     = \Input::get('spousename');
		$bloodgroup     = \Input::get('bloodgroup');
		$image          = \Input::hasFile('image');
		//Image process
		if($image)// condition for if image is found or not
		{
			// image name getting
			$imageProp=\Input::file('image');
			$imagename='_'.Date('ymdis').str_replace(' ','',$imageProp->getClientOriginalName());
			$imageProp->move('public/img/emp/photo/',$imagename);
			
		}
		else
		{
			$imagename='';
		}
		//End Image Process
		//Start Signature process
		if(\Input::hasFile('signature'))
		{
			$signature=\Input::file('signature');
			$signName='_'.Date('ymdis').str_replace(' ','',$signature->getClientOriginalName());
			$signature->move('public/img/emp/sign/',$signName);
			
		}
		else
		{
			$signName='';
		}
		//End signature process
		//Employee insertion process
		$empId=\Employee::insertGetId(array(
				'user_id'        =>$userId,
				'firstname'      =>$firstname,
				'lastname'       =>$lastname,
				'middlename'     =>$middlename,
				'fathername'     =>$fathername,
				'mothermaiden'   =>$mothermaiden,
				'dateofbirth'    =>$dateofbirth,
				'maritialstatus' =>$maritialstatus,
				'spousename'     =>$spousename,
				'bloodgroup'     =>$bloodgroup,
				'image'          =>$imagename,
				'signature'      =>$signName,
				));
		if(!$empId)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
		}
		//end Employee details to insertions
		//Contact process
		$address    =\Input::get('address');
		$city       =\Input::get('city');
		$state      =\Input::get('state');
		$pin        =\Input::get('pin');
		$p_address  =\Input::get('p_address');
		$p_city     =\Input::get('p_city');
		$p_state    =\Input::get('p_state');
		$p_pin      =\Input::get('p_pin');
		$mobile     =\Input::get('mobile');
		$phone      =\Input::get('phone');
		$alt_mobile =\Input::get('alt_mobile');
		$alt_email  =\Input::get('alt_email');
		$contact    =\UserContact::insertGetId(array(
					'user_id'    =>$userId,
					'address'    =>$address,
					'city'       =>$city,
					'state'      =>$state,
					'pin'        =>$pin,
					'p_address'  =>$p_address,
					'p_city'     =>$p_city,
					'p_state'    =>$p_state,
					'mobile'     =>$mobile,
					'phone'      =>$phone,
					'alt_mobile' =>$alt_mobile,
					'alt_email'  =>$alt_email
					));
		if(!$contact)
		{
			\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
		}
		//end contact process
		//Identification Process
		$pan            =\Input::get('pan'); 
		$passportno     =\Input::get('passportno'); 
		$adharno        =\Input::get('adharno'); 
		$voterid        =\Input::get('voterid'); 
		$dlno           =\Input::get('dlno');
		$identification =\EmpIdentification::insertGetId(array(
						'user_id'         =>$userId,
						'pan'             => $pan,
						'passport_no'     => $passportno,
						'adhar_no'        => $adharno,
						'voter_id'        => $voterid,
						'driving_licence' => $dlno,
				    	));
	    if(!$identification)
	    {
	    	\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
	    }
		// End Identification process
		//Bank Detail process
		$bankaccountno = \Input::get('bankaccountno');
		$bankname      = \Input::get('bankname');
		$branchname    = \Input::get('branchname');
		$IFSC          = \Input::get('IFSC');
		$micrno        = \Input::get('micrno');
		$bankDetails   =\EmpBankDetail::insertGetId(array(
						'user_id'    =>$userId,
						'account_no' =>$bankaccountno,
						'bank_name'  =>$bankname,
						'branch'     =>$branchname,
						'IFSC'       =>$IFSC,
						'micrno'     =>$micrno
	    				));
	    if(!$bankDetails)
	    {
	    	\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
	    }
		//End Bank detail
		// start PF ESI process
		$emphaspf     = \Input::get('emphaspf');
		$pfno         = \Input::get('pfno');
		$pfenno       = \Input::get('pfenno');
		$epfno        = \Input::get('epfno');
		$relationship = \Input::get('relationship');
		$emphasesi    = \Input::get('emphasesi');
		$esino        = \Input::get('esino');
		$PfEsi        = \PfEsi::insertGetId(array(
				'user_id'      => $userId,
				'isPF'         => $emphaspf,
				'pfno'         => $pfno,
				'pfenno'       => $pfenno,
				'epfno'        => $epfno,
				'relationship' => $relationship,
				'isESI'        => $emphasesi,
				'esino'        => $esino
	    		));
	    if(!$PfEsi)
	    {
	    	\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
	    }
		//End PF ESI process
		// Start Job details
		$jobjoiningdate     = Implode('-',array_reverse(explode('/',\Input::get('jobjoiningdate'))));
		$jobtype            = \Input::get('jobtype');
		$job_designation    = \Input::get('job_designation');
		$department         = \Input::get('department');
		$reportingmanager   = \Input::get('reportingmanager');
		$paymentmode        = \Input::get('paymentmode');
		$hrverification     = \Input::get('hrverification');
		$policeverification = \Input::get('policeverification');
		$emptype            = \Input::get('emptype');
		$outsourcelist      = \Input::get('outsourcelist');
		$ctc                = \Input::get('ctc');
		$jobdetails         =\JobDetails::insertGetId(array(
						'user_id'             =>$userId,
						'joining_date'        =>$jobjoiningdate,
						'job_type'            =>$jobtype,
						'designation'         =>$job_designation,
						'department'          =>$department,
						'reporting_manager'   =>$reportingmanager,
						'payment_mode'        =>$paymentmode,
						'hr_verification'     =>$hrverification,
						'police_verification' =>$policeverification,
						'emp_type'            =>$emptype,
						'client_id'           =>$outsourcelist,
						'ctc'                 =>$ctc,
	    			));
	    if(!$jobdetails)
	    {
	    	\DB::rollback();
			return \Redirect::back()->with('error','Employee not created try again');
	    }
		//End Job details
		// start employee Education
			$schoolname        = \Input::get('schoolname');
			$schoolplace       = \Input::get('schoolplace');
			$schoolpercentage  = \Input::get('schoolpercentage');
			$pucname           = \Input::get('pucname');
			$pucplace          = \Input::get('pucplace');
			$pucpercentage     = \Input::get('pucpercentage');
			$diplomaname       = \Input::get('diplomaname');
			$diplomaplace      = \Input::get('diplomaplace');
			$diplomapercentage = \Input::get('diplomapercentage');
			$degreename        = \Input::get('degreename');
			$degreeplace       = \Input::get('degreeplace');
			$degreepercentage  = \Input::get('degreepercentage');
			$mastername        = \Input::get('mastername');
			$masterplace       = \Input::get('masterplace');
			$masterpercentage  = \Input::get('masterpercentage');
			$eduction          = \EmpEduction::insertGetId(array(
						'user_id'            => $userId,
						'school_name'        => $schoolname,
						'school_location'    => $schoolplace,
						'school_percentage'  => $schoolpercentage,
						'puc_name'           => $pucname,
						'puc_location'       => $pucplace,
						'puc_percentage'     => $pucpercentage,
						'diploma_name'       => $diplomaname,
						'diploma_location'   => $diplomaplace,
						'diploma_percentage' => $diplomapercentage,
						'degree_name'        => $degreename,
						'degree_location'    => $degreeplace,
						'degree_percentage'  => $degreepercentage,
						'master_name'        => $mastername,
						'master_location'    => $masterplace,
						'master_percentage'  => $masterpercentage
		    			));
		    if(!$eduction)
		    {
		    	\DB::rollback();
				return \Redirect::back()->with('error','Employee not created try again');
		    }
		// end employee Education
		// start employe experiance
			$companyname = \Input::get('companyname'); 
			$location    = \Input::get('location'); 
			$designation = \Input::get('designation'); 
			$lastctc     = \Input::get('lastctc'); 
			$joindate    = \Input::get('joindate'); 
			$leavingdate = \Input::get('leavingdate');
		    $i=0;
		    foreach ($companyname as $company) 
		    {
		    	$companyDetails=\WorkExperiance::insertGetId(array(
								'user_id'      =>$userId,
								'company_name' =>$companyname[$i],
								'location'     =>$location[$i],
								'designation'  =>$designation[$i],
								'last_ctc'     =>$lastctc[$i],
								'join_date'    =>Implode('-',array_reverse(explode('/',$joindate[$i]))),
								'leaving_date' =>Implode('-',array_reverse(explode('/',$leavingdate[$i]))) 	
								));
		    	if(!$companyDetails)
		    	{
		    		\DB::rollback();
					return \Redirect::back()->with('error','Employee not created try again');
		    	}
		    	$i++;
		    } 
		// End Employee experiance
		// start Employee documentaion process
		   
		    $doc_name = \Input::get('docname');
		    $document = \Input::file('doc');
		    $a=0;
		    foreach($doc_name as $doc)
		    {
		    	$filename='_'.Date('ymdis').str_replace(' ','',$document[$a]->getClientOriginalName());
		    	$document[$a]->move('public/img/emp/doc/',$filename);
		    	$empDoc= \EmpDoc::insertGetId(array(
		    				'doc_name'=>$doc_name[$a],
		    				'document'=>$filename
		    				));
		    	if(!$empDoc)
		    	{
		    		\DB::rollback();
					return \Redirect::back()->with('error','Employee not created try again');
		    	}
		    	$a++;
		    }
		    if($empDoc)
		    {
		    	\DB::commit();
		    	\Mail::send('emails.user_credential',array('name'=>$displayname,'username'=>$username,'password'=>$password),function($message) use($email,$username){
				$message->to($email,$username)->subject('User Credential');
			});
		    	return \Redirect::back()->with('success','Employee successfully created');
		    }

		// End employee documention process


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
		$uId=\Auth::user()->id;
		$user=\BranchEmp::where('branch_id','=',$uId)->where('emp_id','=',$id)->first();
		if($user)
		{
			// Transaction Starts
			\DB::beginTransaction();

			//delete user table
			if(!$user->emp->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete contact table
			if(!$user->emp->contact->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete identity table
			if(!$user->emp->empIdentity->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete empBankdetail table
			if(!$user->emp->empBankDetail->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete emp pf esi table
			if(!$user->emp->empPfEsi->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete emp Job detail
			if(!$user->emp->empJobDetail->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete emp Education
			if(!$user->emp->empEducation->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete emp work experiance
			if(!$user->emp->empWorkExperiance->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete emp Document
			if(!$user->emp->empDocument->delete())
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
		else
		{
			return \Redirect::back()->with('error','Failed to delete');
		}
	}


}
