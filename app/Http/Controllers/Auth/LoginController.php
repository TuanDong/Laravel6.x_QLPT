<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\SendMail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        return view('login');
    }
    public function authenticate(LoginRequests $request)
    {
        $request->validation($request);
        if (Auth::attempt(['name'=> $request->user_name,'password' => $request->pass])) {

            return redirect('/home');
        }
        return redirect()->back()->withErrors(['username' => trans('messages.autlogin')])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function forget_password(Request $request)
    {
        $users = User::where('email','=',$request->email_forget)->get();
        $random = Str::random(10);
        foreach ($users as $user) {
            if ($user) {
                User::where('name',$user->name)->where('email',$request->email_forget)->update(['password' => Hash::make($random)]);
                Mail::to($request->email_forget)->send(new SendMail(['Password: '. $random]));
                return redirect()->back()->with('success','Open email watch password');
            }
        }
        return redirect()->back()->withErrors(['error'=>'email not found'])->withInput();
    }
}
