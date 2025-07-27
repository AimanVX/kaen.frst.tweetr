<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function create(){

        return view('login.create');
    }


    function store(LoginRequest $request){


         $request->validated();

         if(Auth::attempt($request->validated(),true)){

          return redirect()->route('home');

    }
    return redirect()
    ->back()
    ->withInput($request->only('email'))
    ->withErrors([

        'email'=>' البيانات المدخله غير صحيحة!!'


    ]);

}

}