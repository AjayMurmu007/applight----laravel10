<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function forgot_password()
    {
        return view('auth.forgot');
    }

    public function forgot_admin(Request $request)
    {
        // dd($request->all());

        $random_password = rand(111111,999999);
        $user = User::where('email','=', $request->email)->first();

        if(!empty($user))
        {
            // echo 'dd';
            $user->password = Hash::make($random_password);
            $user->save();

            $user->password_random = $random_password;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Password successful send your email box.Please check your email...");
        }
        else
        {
            return redirect()->back()->with('error', "E-Mail ID Not Found...");  
        }
    }

    public function login_post(Request $request)
    {
        // dd($request->all()); 

        // 123456 - $2y$12$kON5b46PRTdi6wqc5SMQ4uw7LtIvF1M7/GjPEs/eBMWtrSWUqx6pq
        // $password = Hash::make($request->password);
        // dd($password);

        $remember =!empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],  $remember))
        {
            if(Auth::User()->is_role =='1')
            {
                return Redirect()->intended('admin/dashboard');
            }
            else
            {
                Auth::logout();
                return Redirect()->back()->with('error', "Invalid admin");
            }
        }
        else
        {
            return Redirect()->back()->with('error', "please enter correct email and password...");
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();

        // return Redirect()->intended('login');
        return Redirect(url('login'));

    }
}
