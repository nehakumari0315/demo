<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Mail\MyTestMail;
use App\Models\User;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }



    public function login(Request $request)
    {

        $input = $request->all();
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',

        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);


        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin') {
                return redirect('admin/dashboard')->with('success','login successfully');;
            }
            return redirect('login')->with('error','email and password dose not match');
        }
             return redirect('login')->with('error','email and password dose not match');

    }

    // public function sendMail($otp){
    //     $details = [
    //         'title' => 'This Mail Is OTP(one time password)',
    //         'body' =>$otp,
    //     ];

    //     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));

    //     return redirect('getEmail');

    // }
    // public function sendOtp(Request $request){

    //      $data=User::where('otp',$request->otp)->first();
    //     if($data->otp == $request->otp){
    //         $data->otp = null;
    //         $data->update();
    //         return redirect('dashboard');
    //     }
    //     return view('MailSendOTP')->with('otp is not match');
    // }

    // public function mail_otp_send(){
    //   return view('MailSendOTP');
    // }

    // else{

    //     $otp = rand(1000,9999);
    //     $data['otp'] = $otp;
    //     $data['email'] = $request->email;
    //     $data['password'] = $request->password;
    //     User::create($data);
    // return   $otp = $this->sendMail($otp);
    // }
}





