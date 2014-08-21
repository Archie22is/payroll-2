<?php
namespace App\Controller\Admin;
class BankController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$uId=\Auth::user()->id;
		$bank=\BankDetail::where('user_id','=',$uId)->paginate(15);
		
		return \View::make('admin/bank.bank_detail')->with('bank',$bank);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Bank details
		$uId          =  \Auth::user()->id;
		$bank_name    =  \Input::get('bank_name');
		$account_no   =  \Input::get('account_no');
		$account_type =  \Input::get('account_type');
		$branch       =  \Input::get('branch');
		$micr_no      =  \Input::get('micr_no');
		$ifsc_code    =  \Input::get('ifsc_code');
		$status       =  \Input::get('status');
		// Insert into table
		$bankId       = \BankDetail::insertGetId(array(
							'bank_name'    => $bank_name,
							'account_no'   => $account_no,
							'account_type' => $account_type,
							'branch'       => $branch,
							'micr_no'      => $micr_no,
							'ifsc_code'    => $ifsc_code,
							'status'       => $status,
							'user_id'      => $uId
			    			));
		if($bankId)
		{
			return \Redirect::back()->with('success','Bank details successfully added');
		}
		else
		{
			return \Redirect::back()->with('error','Bank detail failed to add');
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
		$bank=\BankDetail::where('id', '=', $id)->firstOrFail();
		return \View::make('admin/bank.edit')->with('bank',$bank);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bank=\BankDetail::where('id', '=', $id)->firstOrFail();
		$bank->bank_name	= \Input::get('bank_name');
		$bank->account_no   = \Input::get('account_no');
		$bank->account_type = \Input::get('account_type');
		$bank->branch       = \Input::get('branch');
		$bank->micr_no      = \Input::get('micr_no');
		$bank->ifsc_code    = \Input::get('ifsc_code');
		$bank->status       = \Input::get('status');
		$bank->updated_at	= Date('Y-m-d H:i:s');
		if(!$bank->save())
		{
			return \Redirect::back()->with('error','Please try again later')->withInput();
		}	
		else
		{
			return \Redirect::route('admin.bank.index')->with('success','Successfully update');
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
		$bank=\BankDetail::where('id', '=', $id)->firstOrFail();
		if(!$bank->delete())
		{
			return \Redirect::back()->with('error','Unalble to delete try again');
		}
		else
		{
			return \Redirect::back()->with('success','Successfully deleted');
		}	
	}

	public function trash()
	{
		$uId=\Auth::user()->id;
		$bank=\BankDetail::onlyTrashed()->where('user_id','=',$uId)->paginate(15);
		return \View::make('admin/bank.bank_detail')->with('bank',$bank);
	}


}
