<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function showLoginForm () {
        return view('auth.admin-login');
    }

    public function login (Request $request) {
        //validate the request input
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // attempt the loginn
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], ['remember'=>$request->remember])){
            // if success then redirect to intended
            return redirect()->intended(route('admin.login'));
        }

        // if fail then return back with errors message
        return redirect()->back();
    }

    public function logout (Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
