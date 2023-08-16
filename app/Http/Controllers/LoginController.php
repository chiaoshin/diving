<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod("Post")) {
            return $this->postLogin($request);
        }

        return view('forum.login.show');
    }

    public function postLogin($request){
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ], [], [
            'email' => '信箱'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->route('forum.index');
        }
 
        return back()->withErrors([
            'email' => '帳號或密碼錯誤',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        if ($request->isMethod("Post")) {
            return $this->postRegister($request);
        }

        return view('forum.register.show');
    }

    public function postRegister(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'name' => 'string'
        ], [], [
            'email' => '信箱',
            'password' => '密碼',
            'name' => '姓名'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('login');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function forgot(Request $request) {
        if ($request->isMethod("Post")) {
            return $this->postForgot($request);
        }

        return view('forum.forgot.show');
    }

    public function postForgot($request) {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request) {
        if ($request->isMethod("POST")) {
            return $this->postResetPassword($request);
        }

        $data = $request->all();

        return view('forum/reset/show', compact('data'));
    }

    public function postResetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
