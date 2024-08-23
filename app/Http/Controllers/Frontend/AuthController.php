<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ],[
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'password.required' => 'Password is required',
            ]);
            $user = User::where('email', $request->email)->first();
            if($user){
                if(Hash::check($request->password, $user->password)){
                    Auth::login($user);
                    if($user->type == 0){
                        return redirect()->route('user_dashboard')->with('success', 'User logged in successfully');
                    }
                    if($user->type == 1){
                        return redirect()->route('service_provider.dashboard')->with('success', 'User logged in successfully');
                    }
                    if($user->type == 2){
                        return redirect()->route('dashboard')->with('success', 'User logged in successfully');
                    }
                    if($user->type == 3){
                        return redirect()->route('admin.dashboard')->with('success', 'User logged in successfully');
                    }
                    return redirect()->route('home')->with('success', 'User logged in successfully');
                }else{
                    return back()->with('error', 'Invalid password');
                }
            }else{
                return back()->with('error', 'Invalid email');
            }
        }
        return view('frontend.auth.login');
    }
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'type' => 'required',
            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'password.required' => 'Password is required',
                'confirm_password.required' => 'Confirm Password is required',
                'confirm_password.same' => 'Password and Confirm Password should be same',
                'type.required' => 'Type is required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
                'status' => $request->type == 0 ? 1 : 0,
            ]);

            if(!$user){
                return back()->with('error', 'User not registered');
            }

            $role = '';
            if($request->type == 1){
                $role = 'Master';
            }elseif($request->type == 2){
                $role = 'Salon';
            }elseif($request->type == 3){
                $role = 'Admin';
            }else{
                $role = 'Customer';
            }
            $email = $request->email;
            $emailContent = [
                'title' =>  'A plateform where you can find best saloon services in your area.',
                'role' => $role,
                'email' => $request->email,
                'password' => $request->password,
            ];
            Mail::send('emails.register', $emailContent, function($message) use ($email){
                $message->to($email)
                ->subject('The Sakoon - Registration');
            });
            return redirect()->route('login')->with('success', 'User registered successfully. Admin will contact you soon thanks.');
        }
        return view('frontend.auth.register');
    }
    public function forgot_password(Request $request)
    {
        if($request->isMethod('post')){{
            $request->validate([
                'email' => 'required|email',
            ],[
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
            ]);
            $user = User::where('email', $request->email)->first();
            if($user){
                $password = rand(100000, 999999);
                $user->password = Hash::make($password);
                $user->save();
                $email = $request->email;
                $emailContent = [
                    'title' =>  'Use the following password to login.',
                    'email' => $request->email,
                    'password' => $password,
                ];
                Mail::send('emails.forgot_password', $emailContent, function($message) use ($email){
                    $message->to($email)
                    ->subject('The Sakoon - Forgot Password');
                });
                return redirect()->route('login')->with('success', 'Password sent to your email');
            }else{
                return back()->with('error', 'Invalid email');
            }
        }
        }
        return view('frontend.auth.forgot_password');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User logged out successfully');
    }
}
