<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Login;
use App\Http\Requests\Users\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function loginForm(){
        return view('Users.login');
    }

    public function login(Login $request){
        $credentials = $request->only('document', 'password');

        if(!Auth::attempt($credentials)){
            return back()->withErrors(['document' => 'Usuario o contraseña inválidos']);
        }

        session()->regenerate();
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        session()->regenerate();
        return redirect()->route('login');
    }

    public function password(){
        return view('Users.password');
    }

    public function passwordReset(ResetPassword $request, User $user){
        $user->password = bcrypt($request->passwordNew);
        $user->save();
        return $this->logout();
    }
}
