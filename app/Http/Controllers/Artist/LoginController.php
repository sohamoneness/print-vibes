<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Mail;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect artists after login.
     *
     * @var string
     */
    protected $redirectTo = '/artist';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:artist')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('artist.registration');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('artist.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard('artist')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember_me)) {
            return redirect()->intended(route('artist.dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function register(Request $request){

        $this->validate($request, [
            'name'   => 'required',
            'email'   => 'required|email',
            'mobile'   => 'required',
            'password' => 'required',

        ]);

        $params = $request->except('_token');

        $user = new User;
        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->mobile = $params['mobile'];
        $user->otp = 1234;
        $user->country = '';
        $user->city = '';
        // $user->address = $params['address'];
        $user->type = '3';
        $user->status = 1;
        $user->is_deleted = 0;
        
        $user->save();

        if($user){
            $to_name = $params['name'];
            $to_email = $params['email'];
            $data = array('name'=>$params['name'], "body" => "Welcome to Print Vibe!");
            Mail::send('artist.register_mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Welcome to Print Vibe!');
            $message->from('info@tngim2024.com','Print Vibe');
            });

            return $this->responseRedirect('artist.login', 'You have registered successfully. Please login to continue' ,'success',false, false);
        }else{
            return $this->responseRedirectBack('Failed to register. Please try again', 'error', true, true);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout(Request $request)
    {
        Auth::guard('artist')->logout();
        $request->session()->invalidate();
        return redirect()->route('artist.login');
    }
}