<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'All Users';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return 'to create new user';
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		return 'to store user data';
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
		if(Auth::user()->id == $id)
		{
			if($user=User::where('id','=',$id)->first())
			{
				$contact=UserContact::firstOrCreate(array('user_id'=>$id));
				// echo "<pre>";
				// print_r($user);
				// print_r($contact);exit;
				return View::make('account.profile')->with('user',$user)->with('contact',$contact);
			}
		}
		else
		{
			App::abort(403, 'Unauthorized action.');
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
		return \Redirect::to(Auth::getProfile().'/users/'.$id)->with('tab','changePassword');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function changepassword($id)
	{
		echo $id;
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$old_password=  Input::get('old_password');

		if(!$old_password)
		{
			$displayname =	Input::get('displayname');
			$dob         =	implode('-',array_reverse(explode('/',Input::get('dob'))));
			$gender      =	Input::get('gender');
			$alt_email   =	Input::get('alt_email');
			$phone       =	Input::get('phone');
			$mobile      =	Input::get('mobile');
			$alt_mobile  =	Input::get('alt_mobile');
			$address     =	Input::get('address');
			$city        =	Input::get('city');
			$state       =	Input::get('state');
			$country     =	Input::get('country');
			$image       =	Input::file('image');
			$signature   =	Input::file('signature');
			$user=User::where('id','=',$id)->first();
			$contact=UserContact::where('user_id','=',$id)->first();
			$user->displayname=$displayname;
			if(!$user->save())
			{
				return Redirect::back()->with('error','Failed to update');
			}
			$contact->dob         = $dob;
			$contact->gender      = $gender;
			$contact->alt_email   = $alt_email;
			$contact->phone       = $phone;
			$contact->mobile      = $mobile;
			$contact->alt_mobile  = $alt_mobile;
			$contact->address     = $address;
			$contact->city        = $city;
			$contact->state       = $state;
			$contact->country     = $country;
			if($image)// condition for if file uploaded
			{
				//unique name of file
				$image_name='_'.Date('dmyihs').str_replace(' ','',Input::file('image')->getClientOriginalName());
				//upload file to destination
				$fileupload=Input::file('image')->move('public/img/',$image_name);
				
				if($fileupload)// condition for file uploaded success
				{
					// Delete existing image
					File::delete('public/img/'.$contact->image);
					$contact->image       = $image_name;
				}
			}
			if($signature)// condition for if file uploaded
			{
				//unique name of file
				$sign_name='_'.Date('idmyhs').str_replace(' ','',Input::file('signature')->getClientOriginalName());
				//upload file to destination
				$sign_upload=Input::file('signature')->move('public/img/',$sign_name);

				if($sign_upload)
				{
					// Delete existing image
					File::delete('public/img/'.$contact->signature);
					$contact->signature   = $sign_name;
				}
			}
			if($contact->save())
			{
				return Redirect::back()->with('success','Successfully update');
			}
			else
			{
				return Redirect::back()->with('error','Failed to update');
			}
		}
		// Change password
		elseif($old_password)
		{
			
			$new_password=Input::get('new_password');
			$confirm_password=Input::get('confirm_password');
			$data=array('old_password'=>$old_password,'new_password'=>$new_password,'confirm_password'=>$confirm_password);
			$validator=Validator::make($data,array(
							'old_password' =>'required',
                            'new_password' =>'required',
                            'confirm_password'=>'required|same:new_password'
						));
			if($validator->fails())
             {
                return Redirect::back()
                ->withInput()
                ->withErrors($validator);
             }
             else
             {
             
                $user=User::find(Auth::user()->id);
                if(Hash::check($old_password,$user->getAuthPassword()))
                {
                    $user->password=Hash::make($new_password);
                    if($user->save())
                    {
                        return Redirect::back()
                            ->with('success','Your password has been changed.');
                           
                    }
                    else{
                        return Redirect::back()
                            ->with('error','Your password could not change')
                             ->with('tab','changePassword');
                    }
                }
                else{
                    return Redirect::back()
                        ->with('error','Your old password incorrect')
                         ->with('tab','changePassword');
                }
            }
		}
		else
		{
			return Redirect::back();
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
