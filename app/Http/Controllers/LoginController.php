<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->erro == 1){
            $erro = 'Usuario e ou senha não existe';
        };

        if($request->erro == 2){
            $erro = 'Necessario realizar login para ter acesso a pagina';
        };

        return view('auth.login', ['erro' => $erro]);
    }


    public function authentication(LoginRequest $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $userModel = new User();
        $user = $userModel->where('email', $email)
                      ->where('password', $password)
                      ->get()
                      ->first();

        if(isset($user->name)){
           session_start();
           $_SESSION['nome'] = $user->name;
           $_SESSION['email'] = $user->email;

           return redirect('/');
        }
        else{
            return redirect()->route('login', ['erro'=>1]);
        }
    }


    public function exit(){
        session_start();
        session_destroy();
        return redirect()->route('login');
    }
}
