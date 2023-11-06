<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect admin after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('website.auth.login');
    }

    public function showRegisterForm(){
        return view('website.auth.register');
    }
    public function SubmitRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // Ensure password matches password_confirmation
        ]);
    
        if ($validator->fails()) {
            return redirect('registration')
                ->withErrors($validator)
                ->withInput();
        }else{
            $hashedPassword = Hash::make($request['password']);
            User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'type'=>1,
                'status'=>1,
                'otp'=>'1234',
                'password'=>$hashedPassword,
                ]);
            return redirect()->route('login')->with(['message' => 'Registration successful! Please log in.', 'response' => true]);
        }
        
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $remember_me = $request->has('remember') ? true : false;
        if (Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember_me)) {
            if(Auth::guard('web')->user()->type==1){
                return redirect()->intended(route('dashboard'));
            }else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return redirect()->route('login');
            }
            
        }
        return back()->withInput($request->only('email', 'remember'));
    }
     /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
