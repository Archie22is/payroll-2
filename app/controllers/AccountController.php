<?php 
class AccountController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('csrf',array('on'=>'post'));
	}
	// User login starts on view
	public function getLogin()
	{
		return View::make('account.login');
	}//End function Login

	//user login getting data from view
	public function postLogin()
	{
		$data=Input::all();
        $validator=Validator::make($data,
            array(
           'username'=>'required',
            'password'=>'required'
        ));
        if($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $remember=(Input::has('remember'))? true : false;
            $username=$data['username'];
            $password=$data['password'];
            $active='Y';
            $field=filter_var($username,FILTER_VALIDATE_EMAIL)?'email':'userName';
            if(Auth::attempt(array($field=>$username,'password'=>$password,'active'=>$active),$remember))
            {
                $mod=Auth::getProfile();
                Session::get('login_redirect') ? $url = Session::get('login_redirect') : $url = URL::to('/').'/'.$mod;
                // echo $mod. "<>".$url;exit;
                Session::put('developers.userId',Auth::user()->id);
                return Redirect::to($url)
                            ->with('login_redirect',Session::forget('login_redirect'));
            }
            else{
                return Redirect::back()->withInput()
                    ->withErrors(array('error'=>'Username or password incorrect'))
                    ->with('error','Username or password incorrect');
            }
        }
	}//End function login validation
    // Signout function starts
    public function getSignOut()
    {
        Auth::logout();
        return Redirect::to('/')
                ->with('msg',"<div class='alert alert-info'>Sign Out successfully </div>");
    }

}//Ends Action Controller Class