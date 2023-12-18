<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();
        Auth::attempt($credentials);

        return redirect()->route('admin.home');
    }
}
