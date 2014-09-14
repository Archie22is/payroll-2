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
		$dept=\Department::get();
		$client=\Friends::where('parent_id','=',$uId)->get();
		$list =\BranchEmp::where('branch_id','=',$uId)->paginate(20);
		return \View::make('branch/emp.manage')
					->with('dept',$dept)
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
		$sibling		= \Input::get('sibling');
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
				'sibling'		 =>$sibling,
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
			$eduction          = \EmpEducation::insertGetId(array(
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
		    	if($document[$a])
		    	{
		    		$filename='_'.Date('ymdis').str_replace(' ','',$document[$a]->getClientOriginalName());
			    	$document[$a]->move('public/img/emp/doc/',$filename);
			    	$empDoc= \EmpDoc::insertGetId(array(
			    				'user_id'=>$userId,
			    				'doc_name'=>$doc_name[$a],
			    				'document'=>$filename
			    				));
			    	if(!$empDoc)
			    	{
			    		\DB::rollback();
						return \Redirect::back()->with('error','Employee not created try again');
			    	}
		    	}
		    	
		    	$a++;
		    }
		    if($email)
		    {
		    	\DB::commit();
		    	\Mail::send('emails.user_credential',array('name'=>$displayname,'username'=>$username,'password'=>$password),function($message) use($email,$username){
				$message->to($email,$username)->subject('User Credential');
			});
		    	return \Redirect::back()->with('success','Employee successfully created');
		    }
		    else
		    {
		    	return \Redirect::back()->with('error','Failed to create employee');
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
		$uId=\Auth::user()->id;
		$emp=\BranchEmp::where('branch_id','=',$uId)->where('emp_id','=',$id)->first();
		if($emp)
		{
			return \View::make('branch/emp.emp_detail')
						->with('emp',$emp);
		}
		else
		{
			\App::abort(404);
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
		$uId=\Auth::user()->id;
		$emp=\User::where('id','=',$id)->first();
		if($emp)
		{
			$dept=\Department::get();
			$client=\Friends::where('parent_id','=',$uId)->get();
			return \View::make('branch/emp.edit')
				->with('dept',$dept)
				->with('emp',$emp)
				->with('client',$client);
		}
		else
		{
			\App::abort(404);
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
	
		if (\Request::ajax())
			{
				
				
				
				// print_r(\Input::all());
				$personalval=\Input::get('personalval');
				$contactval =\Input::get('contactval');
				$identval =\Input::get('identval');
				$pfval 	=\Input::get('pfval');
				$jobval 	=\Input::get('jobval');
				$salval 	=\Input::get('salval');
				$eduval		=\Input::get('eduval');
				$workExpFrom= \Input::get('workExpFrom');
			   if(isset($personalval))
			   {
			   		$id=$personalval;
					$firstname      =\Input::get('firstname');
					$lastname       =\Input::get('lastname');
					$middlename     =\Input::get('middlename');
					$fathername     = \Input::get('fathername');
					$mothermaiden   = \Input::get('mothermaiden');
					$dateofbirth    = Implode('-',array_reverse(explode('/',\Input::get('dateofbirth'))));
					$spousename     = \Input::get('spousename');
					$maritialstatus = \Input::get('maritialstatus');
					if($maritialstatus != 'married')
					{
						$spousename = '';
					}
					
					$bloodgroup     = \Input::get('bloodgroup');
					$sibling        = \Input::get('sibling');
					// Call Model
			   		$personal=	\Employee::findOrFail($id);
				   		$personal->firstname      = $firstname;
						$personal->lastname       = $lastname;
						$personal->middlename     = $middlename;
						$personal->fathername     = $fathername;
						$personal->mothermaiden   = $mothermaiden;
						$personal->dateofbirth    = $dateofbirth;
						$personal->maritialstatus = $maritialstatus;
						$personal->spousename     = $spousename;
						$personal->sibling		  = $sibling;
						$personal->bloodgroup     = $bloodgroup;
					if($personal->save())
					{
						\Session::flash('success',"Successfully updated");
						return;
					}
					else
					{
						echo "Failed to Update";
						return;
					}
			   }
			   // Contact Values
			   if(isset($contactval))
			   {
			   		$id 		=$contactval;
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
					$contact =\UserContact::findOrFail($id);
							$contact->address    = $address;
							$contact->city       = $city;
							$contact->state      = $state;
							$contact->pin        = $pin;
							$contact->p_address  = $p_address;
							$contact->p_city     = $p_city;
							$contact->p_state    = $p_state;
							$contact->mobile     = $mobile;
							$contact->phone      = $phone;
							$contact->alt_mobile = $alt_mobile;
							$contact->alt_email  = $alt_email;
					if($contact->save())
					{
						\Session::flash('success',"Successfully contact updated");
						return; 
					}
					else
					{
						echo "Failed to Update";
						return;
					}
			   }
			   // Idetification table
			   if($identval)
			   {
			   		$id=$identval;
			   		$bankId 		=\Input::get('bankId');
			   		$pan            =\Input::get('pan'); 
					$passportno     =\Input::get('passportno'); 
					$adharno        =\Input::get('adharno'); 
					$voterid        =\Input::get('voterid'); 
					$dlno           =\Input::get('dlno');
					$bankaccountno = \Input::get('bankaccountno');
					$bankname      = \Input::get('bankname');
					$branchname    = \Input::get('branchname');
					$IFSC          = \Input::get('IFSC');
					$micrno        = \Input::get('micrno');
					$identifcation = \EmpIdentification::findOrFail($id);
						$identifcation->pan             = $pan;
						$identifcation->passport_no     = $passportno;
						$identifcation->adhar_no        = $adharno;
						$identifcation->voter_id        = $voterid;
						$identifcation->driving_licence = $dlno;
					$bank			=\EmpBankDetail::findOrFirst($bankId);
						$bank->account_no = $bankaccountno;
						$bank->bank_name  = $bankname;
						$bank->branch     = $branchname;
						$bank->IFSC       = $IFSC;
						$bank->micrno     = $micrno;
					if($identifcation->save() && $bank->save())
					{
						\Session::flash('success',"Identification and bank info successfully updated");
						return;
					}
					else
					{
						echo "Failed to update";
						return;
					}
			   }
			   //PF ESI Details
			   if($pfval)
			   {
			   		$emphaspf     = \Input::get('emphaspf');
					$pfno 		  = '';
					$pfenno       = '';
					$epfno        = '';
					$relationship = '';
					if($emphaspf == 'YES')
					{
						$pfno         = \Input::get('pfno');
						$pfenno       = \Input::get('pfenno');
						$epfno        = \Input::get('epfno');
						$relationship = \Input::get('relationship');
					}
					$emphasesi    = \Input::get('emphasesi');
					$esino 		  = '';
					if($emphasesi == 'YES')
					{
						$esino     = \Input::get('esino');
					}
					$ESIPF 	= \PfEsi::findOrFail($pfval);
						$ESIPF->isPF         = $emphaspf;
						$ESIPF->pfno         = $pfno;
						$ESIPF->pfenno       = $pfenno;
						$ESIPF->epfno        = $epfno;
						$ESIPF->relationship = $relationship;
						$ESIPF->isESI        = $emphasesi;
						$ESIPF->esino        = $esino;
					if($ESIPF->save())
					{
						\Session::flash('success',"PF and ESI successfully updated");
						return;
					}			
					else
					{
						echo "Failed to upload";
						return;
					}		
			   }
			   // Job details
			   if($jobval)
			   {
			   		$jobjoiningdate     = Implode('-',array_reverse(explode('/',\Input::get('jobjoiningdate'))));
					$jobtype            = \Input::get('jobtype');
					$job_designation    = \Input::get('job_designation');
					$department         = \Input::get('department');
					$reportingmanager   = \Input::get('reportingmanager');
					$paymentmode        = \Input::get('paymentmode');
					$hrverification     = \Input::get('hrverification');
					$policeverification = \Input::get('policeverification');
					$emptype            = \Input::get('emptype');
					$outsourcelist 			= '';
					if($emptype == 'outsource')
					{
						$outsourcelist      = \Input::get('outsourcelist');
					}
					$job=\JobDetails::findOrFail($jobval);
						$job->joining_date        = $jobjoiningdate;
						$job->job_type            = $jobtype;
						$job->designation         = $job_designation;
						$job->department          = $department;
						$job->reporting_manager   = $reportingmanager;
						$job->payment_mode        = $paymentmode;
						$job->hr_verification     = $hrverification;
						$job->police_verification = $policeverification;
						$job->emp_type            = $emptype;
						$job->client_id           = $outsourcelist;
					if($job->save())
					{
						\Session::flash('success',"Job details updated successfully");
						return;
					}
					else
					{
						echo "failed to update";
						return;
					}
			   }
			   // Salary details
			   if($salval)
			   {
			   		$ctc = \Input::get('ctc');
			   		$salary=\JobDetails::findOrFail($salval);
			   			$salary->ctc = $ctc;
			   		if($salary->save())
			   		{
			   			\Session::flash('success',"Salary successfully updated");
			   			return;
			   		}
			   		else
			   		{
			   			echo "failed to update";
			   			return;
			   		}

			   }
			   //Educational details
			   if($eduval)
			   {
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
					$education =\EmpEducation::findOrFail($eduval);
						$education->school_name        = $schoolname;
						$education->school_location    = $schoolplace;
						$education->school_percentage  = $schoolpercentage;
						$education->puc_name           = $pucname;
						$education->puc_location       = $pucplace;
						$education->puc_percentage     = $pucpercentage;
						$education->diploma_name       = $diplomaname;
						$education->diploma_location   = $diplomaplace;
						$education->diploma_percentage = $diplomapercentage;
						$education->degree_name        = $degreename;
						$education->degree_location    = $degreeplace;
						$education->degree_percentage  = $degreepercentage;
						$education->master_name        = $mastername;
						$education->master_location    = $masterplace;
						$education->master_percentage  = $masterpercentage;	
					if($education->save())		   
					{
						\Session::flash('success',"Educational detail successfully updated");
						return;
					}
					else
					{
						echo "Failed to update";
						return;
					}
				}
				//work experiance
				if($workExpFrom)
				{
					$expId 		 = \Input::get('expId');
					$companyname = \Input::get('companyname'); 
					$location    = \Input::get('location'); 
					$designation = \Input::get('designation'); 
					$lastctc     = \Input::get('lastctc'); 
					$joindate    = \Input::get('joindate'); 
					$leavingdate = \Input::get('leavingdate');
					$i=0;
					foreach($expId as $exp)
					{
						$experiance = \WorkExperiance::findOrFail($exp);
							$experiance->company_name = $companyname[$i];
							$experiance->location     = $location[$i];
							$experiance->designation  = $designation[$i];
							$experiance->last_ctc     = $lastctc[$i];
							$experiance->join_date    = Implode('-',array_reverse(explode('/',$joindate[$i])));
							$experiance->leaving_date = Implode('-',array_reverse(explode('/',$leavingdate[$i])));
						$experiance->save();
						$i++;
					}
					\Session::flash('success',"Work experiance successfully updated");
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
			if(!$user->delete())
			{
				\DB::rollback();
				return \Redirect::back()->with('error','Failed to delete');
			}
			//delete employee table
			if($user->emp->employee)
			{
				$user->emp->employee->delete();
			}
			//delete contact table
			if($user->emp->contact)
			{
				$user->emp->contact->delete();
			}
			//delete identity table
			if($user->emp->empIdentity)
			{
				$user->emp->empIdentity->delete();
			}
			//delete empBankdetail table
			if($user->emp->empBankDetail)
			{
				$user->emp->empBankDetail->delete();
			}
			//delete emp pf esi table
			if($user->emp->empPfEsi)
			{
				$user->emp->empPfEsi->delete();
			}
			//delete emp Job detail
			if($user->emp->empJobDetail)
			{
				$user->emp->empJobDetail->delete();
			}
			//delete emp Education
			if($user->emp->empEducation)
			{
				$user->emp->empEducation->delete();
			}
			//delete emp work experiance
			if($user->emp->empWorkExperiance)
			{
				foreach($user->emp->empWorkExperiance as $empworkExp)
					{
						$empworkExp->delete();
					}
			}
			//delete emp Document
			if($user->emp->empDocument)
			{
				foreach($user->emp->empDocument as $empDoc)
					{
						$empDoc->delete();
					}
			}
			\DB::commit();
			return \Redirect::back()->with('success','Successfully deleted');
		}
		else
		{
			return \Redirect::back()->with('error','Failed to delete');
		}
	}
	/* function for search criteria */
	public function search()
	{
		$uId   = \Auth::user()->id;
		$field = \Input::get('f');
		if($value = \Input::get('v'))
		{
			
			if($field =='username')
			{
				$emp = \User::whereHas('empJobDetail',function($q) use($uId){
							$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							});
						})
						->where('username','=',$value)
						->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'email')
			{
				$emp =  \User::whereHas('empJobDetail',function($q) use($uId){
							$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							});
						})
						->where('email','=',$value)
						->where('profilesId','=',4)->paginate(20);
			}
			if($field == 'name')
			{
				// where condition we are checking in employee table of relation
				$emp = \User::whereHas('empJobDetail',function($q) use($uId){
							$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							});
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
			return \View::make('branch/emp.search_emp')
							->withInput(\Input::flash())
							->with('list',$emp);
		}
		else
		{
			if($field == 'client')
			{
				$client_id = \Input::get('clientId');
				if($client_id == 'in-house')
				{
					$emp = \User::whereHas('empJobDetail',function($q) use($uId){
							$q->where('emp_type','=','inhouse');
							$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							});
						})->paginate(20);
						return \View::make('branch/emp.search_emp')
							    ->withInput(\Input::flash())
								->with('list',$emp);
				}
				else
				{
					$validate=\Validator::make(array('client'=>$client_id),array('client'=>'required|numeric'));
					if($validate->fails())
					{
						return \View::make('branch/emp.search_emp')
								->withErrors($validate)
								->withInput(\Input::flash())
								->with('list',array());
					}
					else
					{
						$emp = \User::whereHas('empJobDetail',function($q) use($client_id){
								$q->where('emp_type','=','outsource');
								$q->where('client_id','=',$client_id);
							})->paginate(20);
						return \View::make('branch/emp.search_emp')
							    ->withInput(\Input::flash())
								->with('list',$emp);
					}
				}
				
			}
			if($field == 'all' )
			{
				$emp =  \User::whereHas('empJobDetail',function($q) use($uId){
								$q->whereHas('branch',function($s) use($uId){
								$s->where('branch_id','=',$uId);
							});
						})->paginate(20);
				return \View::make('branch/emp.search_emp')
							->withInput(\Input::flash())
							->with('list',$emp);
			}
			else
			{
				return \View::make('branch/emp.search_emp')
					->withInput(\Input::flash())
					->with('list',array());
			}
			
		}
	}
	public function getImportEmp()
	{

		return \View::make('branch/emp/import');
	}
	public function postImportEmp()
	{
		if(\Request::ajax())
		{
			$efile = \Input::file('upload');
			/* Validation of file */
			$validate = \Validator::make(array('file'=>$efile),array('file'=>'required|mimes:xls,csv|max:2000|min:1'));
			if($validate->fails())
			{
				$error= array('error'=>$validate->messages()->first());
				echo json_encode($error);
				return;
			}
			/* End validation of file*/
			else
			{
				$handle = file($efile->getRealPath());
				/* Call Excel Class */
				$objPHPExcel = \PHPExcel_IOFactory::load($efile->getRealPath());
				$mainArr = array();
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
				{
					// Sheet names
					switch($worksheet->getTitle())
					{
						case 'User':
						$index='users';
						break;
						case 'PersonalDetails':
						$index='PersonalDetails';
						break;
						case 'ContactInfo':
						$index='ContactInfo';
						break;
						case 'IdentificationandBankInfo':
						$index='IdentificationandBankInfo';
						break;
						case 'PFandESIInformation':
						$index='PFandESIInformation';
						break;
						case 'JobDetails':
						$index='JobDetails';
						break;
						case 'EducationalBackground':
						$index='EducationalBackground';
						break;
						case 'WorkExperience':
						$index='WorkExperience';
						break;
					}
					
					// Getting all cells
					$subArr=array();
					$rows=$worksheet->getRowIterator();
					foreach($rows as $row)
					{
						$cells = $row->getCellIterator();
						// cells store into data array 
						$data=array();
						foreach ($cells as $cell) 
						{
							$data[]=$cell->getCalculatedValue();
						}
						
						if($data){
						// one set of row stored in indexed array
						$arr[$index]=$data;
						// indexed array store into subarr
						$subArr[]=$arr;
						// remove indexd array for optimiced douplicated
						unset($arr);
					   }
					}
					// every sheet of array store in main Arr
					$mainArr[$index]=$subArr;
					unset($subArr);
				}
				
				$emails=array_fetch($mainArr['users'],'users.1');
				// Validate emails
				foreach ($emails as $value) 
				{
					if (preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $value)) 
					{
						
					}
					else
					{
						$error= array('error'=>"$value InValid Email");
						echo json_encode($error);
						return;
					}
				}
				// validation email unique from excel
					if(count($emails) != count(array_unique($emails)))
					{
						$error= array('error'=>"Douplicate emails are available");
						echo json_encode($error);
						return;
					}
				//end email unique in excel 
				//Check Email Id is unique or not
				$user = \User::withTrashed()->whereIn('email',$emails)->first();
				if($user)
				{
					$error= array('error'=>"$user->email already registered");
					echo json_encode($error);
					return;
				}
				// Database insertion starts here
				$users                     =	$mainArr['users'];
				$PersonalDetails           =	$mainArr['PersonalDetails'];
				$ContactInfo               =	$mainArr['ContactInfo'];
				$IdentificationandBankInfo =	$mainArr['IdentificationandBankInfo'];
				$PFandESIInformation       =	$mainArr['PFandESIInformation'];
				$JobDetails                =	$mainArr['JobDetails'];
				$EducationalBackground     =	$mainArr['EducationalBackground'];
				$WorkExperience            =	$mainArr['WorkExperience'];
				// Create UserId 
				$userID     =\Auth::user()->id;
				$branch     =\Branch::where('user_id','=',$userID)->first();
				$prifix     = $branch->branch_code;// branch prifix code
				$count         =\BranchEmp::withTrashed()->where('branch_id','=',$userID)->count();// count all registered user of this branch
				$i=0;
				foreach($users as $val)
				{

					\DB::beginTransaction();
					$temp       = $count+1;// increase one 
					$count++;
					$postfix    =sprintf('%04d',$temp);// manupulate 000$temp
					$username   =$prifix.$postfix;
					$password   =str_random(10);
					$hashPassword = \Hash::make($password);
					$email 		= $val['users'][1];
					$uId=\User::insertGetId(array(
						'username'    =>$username,
						'password'    =>$hashPassword,
						'displayname' =>$val['users'][0],
						'email'       =>$val['users'][1],
						'profilesId'  =>4,
						'active'      =>'Y'
						));
					//create branch employee
					$branchEmployee=\BranchEmp::insertGetId(array(
						'branch_id' =>$userID,
						'emp_id'    =>$uId
						));
					// Insert Personal detail

					$empId=\Employee::insertGetId(array(
							'user_id'        =>$uId,
							'firstname'      =>$PersonalDetails[$i]['PersonalDetails'][0],
							'lastname'       =>$PersonalDetails[$i]['PersonalDetails'][2],
							'middlename'     =>$PersonalDetails[$i]['PersonalDetails'][1],
							'fathername'     =>$PersonalDetails[$i]['PersonalDetails'][3],
							'mothermaiden'   =>$PersonalDetails[$i]['PersonalDetails'][8],
							'dateofbirth'    =>$PersonalDetails[$i]['PersonalDetails'][4],
							'maritialstatus' =>$PersonalDetails[$i]['PersonalDetails'][5],
							'spousename'     =>$PersonalDetails[$i]['PersonalDetails'][6],
							'sibling'		 =>$PersonalDetails[$i]['PersonalDetails'][8],
							'bloodgroup'     =>$PersonalDetails[$i]['PersonalDetails'][9]
							
							));
					// Contact Information
					$contact    =\UserContact::insertGetId(array(
								'user_id'    =>$uId,
								'address'    =>$ContactInfo[$i]['ContactInfo'][0],
								'city'       =>$ContactInfo[$i]['ContactInfo'][1],
								'state'      =>$ContactInfo[$i]['ContactInfo'][2],
								'pin'        =>$ContactInfo[$i]['ContactInfo'][3],
								'p_address'  =>$ContactInfo[$i]['ContactInfo'][4],
								'p_city'     =>$ContactInfo[$i]['ContactInfo'][5],
								'p_state'    =>$ContactInfo[$i]['ContactInfo'][6],
								'p_pin'		 =>$ContactInfo[$i]['ContactInfo'][7],
								'mobile'     =>$ContactInfo[$i]['ContactInfo'][8],
								'phone'      =>$ContactInfo[$i]['ContactInfo'][9],
								'alt_mobile' =>$ContactInfo[$i]['ContactInfo'][10],
								'alt_email'  =>$ContactInfo[$i]['ContactInfo'][11]
								));
					//IdentificationandBankInfo
					$identification =\EmpIdentification::insertGetId(array(
										'user_id'         =>$uId,
										'pan'             => $IdentificationandBankInfo[$i]['IdentificationandBankInfo'][0],
										'passport_no'     => $IdentificationandBankInfo[$i]['IdentificationandBankInfo'][1],
										'adhar_no'        => $IdentificationandBankInfo[$i]['IdentificationandBankInfo'][2],
										'voter_id'        => $IdentificationandBankInfo[$i]['IdentificationandBankInfo'][3],
										'driving_licence' => $IdentificationandBankInfo[$i]['IdentificationandBankInfo'][4],
								    	));
					// Bank Detail
					$bankDetails   =\EmpBankDetail::insertGetId(array(
										'user_id'    =>$uId,
										'account_no' =>$IdentificationandBankInfo[$i]['IdentificationandBankInfo'][5],
										'bank_name'  =>$IdentificationandBankInfo[$i]['IdentificationandBankInfo'][6],
										'branch'     =>$IdentificationandBankInfo[$i]['IdentificationandBankInfo'][7],
										'IFSC'       =>$IdentificationandBankInfo[$i]['IdentificationandBankInfo'][8],
										'micrno'     =>$IdentificationandBankInfo[$i]['IdentificationandBankInfo'][9]
					    				));
					// Esi and PF Detail
					$PfEsi        = \PfEsi::insertGetId(array(
										'user_id'      => $uId,
										'isPF'         => $PFandESIInformation[$i]['PFandESIInformation'][0],
										'pfno'         => $PFandESIInformation[$i]['PFandESIInformation'][1],
										'pfenno'       => $PFandESIInformation[$i]['PFandESIInformation'][2],
										'epfno'        => $PFandESIInformation[$i]['PFandESIInformation'][3],
										'relationship' => $PFandESIInformation[$i]['PFandESIInformation'][4],
										'isESI'        => $PFandESIInformation[$i]['PFandESIInformation'][5],
										'esino'        => $PFandESIInformation[$i]['PFandESIInformation'][6]
							    		));
					// Job details
					$jobdetailsId         =\JobDetails::insertGetId(array(
											'user_id'             =>$uId,
											'joining_date'        =>$JobDetails[$i]['JobDetails'][0],
											'job_type'            =>$JobDetails[$i]['JobDetails'][1],
											'designation'         =>$JobDetails[$i]['JobDetails'][2],
											'department'          =>$JobDetails[$i]['JobDetails'][3],
											'reporting_manager'   =>$JobDetails[$i]['JobDetails'][4],
											'payment_mode'        =>$JobDetails[$i]['JobDetails'][5],
											'hr_verification'     =>$JobDetails[$i]['JobDetails'][6],
											'police_verification' =>$JobDetails[$i]['JobDetails'][7],
											'emp_type'            =>$JobDetails[$i]['JobDetails'][8],
											'client_id'           =>$JobDetails[$i]['JobDetails'][9]
							    			));
					//EducationalBackground
					$eduction          = \EmpEducation::insertGetId(array(
											'user_id'            => $uId,
											'school_name'        => $EducationalBackground[$i]['EducationalBackground'][0],
											'school_location'    => $EducationalBackground[$i]['EducationalBackground'][1],
											'school_percentage'  => $EducationalBackground[$i]['EducationalBackground'][2],
											'puc_name'           => $EducationalBackground[$i]['EducationalBackground'][3],
											'puc_location'       => $EducationalBackground[$i]['EducationalBackground'][4],
											'puc_percentage'     => $EducationalBackground[$i]['EducationalBackground'][5],
											'diploma_name'       => $EducationalBackground[$i]['EducationalBackground'][6],
											'diploma_location'   => $EducationalBackground[$i]['EducationalBackground'][7],
											'diploma_percentage' => $EducationalBackground[$i]['EducationalBackground'][8],
											'degree_name'        => $EducationalBackground[$i]['EducationalBackground'][9],
											'degree_location'    => $EducationalBackground[$i]['EducationalBackground'][10],
											'degree_percentage'  => $EducationalBackground[$i]['EducationalBackground'][11],
											'master_name'        => $EducationalBackground[$i]['EducationalBackground'][12],
											'master_location'    => $EducationalBackground[$i]['EducationalBackground'][13],
											'master_percentage'  => $EducationalBackground[$i]['EducationalBackground'][14]
							    			));
					// Experiance
					$companyDetails		= 	\WorkExperiance::insertGetId(array(
												'user_id'      =>$uId,
												'company_name' =>$WorkExperience[$i]['WorkExperience'][0],
												'location'     =>$WorkExperience[$i]['WorkExperience'][1],
												'designation'  =>$WorkExperience[$i]['WorkExperience'][2],
												'last_ctc'     =>$WorkExperience[$i]['WorkExperience'][3],
												'join_date'    =>$WorkExperience[$i]['WorkExperience'][4],
												'leaving_date' =>$WorkExperience[$i]['WorkExperience'][5]
												));
					\DB::commit();
					\Mail::send('emails.user_credential',array('name'=>$val['users'][0],'username'=>$username,'password'=>$password),function($message) use($email,$username){
						$message->to($email,$username)->subject('User Credential');
					});

					$i++;
				}// end foreach of database insertion
				// success message
					$success= array('success'=>"Successfully uploaded your Employees");
					echo json_encode($success);
					return;
			}// end else part

		}// end ajax condition
		
		
	} // end function 
	function postUpload()
	{
		echo \Input::file('upload')->getRealPath();
		return;
	}


}
