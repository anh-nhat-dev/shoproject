<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\LoginRequest;

use Auth;

class LoginController extends Controller
{

    /**
     * Display form login
     * 
     * @return Response
     */

    public function index()
    {
        return view('login.login');
    }

    /**
     * Login processing
     * 
     * @param Illuminate\Http\Request $request
     * @return Response
     */

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors();
    }
}
