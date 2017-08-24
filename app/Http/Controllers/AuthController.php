<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' =>  'required|email|exists:users,email',
            'password'  =>  'required'
        ]);

        if($validator->passes()){
            if(Auth::attempt([
                'email' =>  $request->email,
                'password'  =>  $request->password
            ])){
                if(Auth::user()->type === 'admin'){
                    return redirect('/admin');
                }
                return redirect('/');
            }else{
                $request->session()->flash('message', 'Incorrect password');
                return redirect('/login');
            }
        }else{
            return redirect('/login')->withErrors($validator)->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users',
            'password'  =>  'required|min:6'
        ]);

        if($validator->passes()){

            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = $request->password;
            $user->type = 'user';

            if($user->save()){
                Auth::login($user, true);
                return redirect('/');
            }
        }else{
            return redirect('/register')->withErrors($validator)->withInput();
        }
    }
}
