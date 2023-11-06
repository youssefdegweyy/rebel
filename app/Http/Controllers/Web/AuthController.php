<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup_page()
    {
        return view('web.signup');
    }

    public function register(RegisterRequest $request)
    {
        $request['name'] = $request->first_name . ' ' . $request->last_name;
        $plain_password = $request->password;
        $request['password'] = bcrypt($plain_password);
        $request['role'] = 1;
        $request['points'] = 1000;

        if ($user = User::create($request->all())) {
            Auth::login($user);
            return redirect('/');
        } else return redirect()->back()->with('error', 'Error in registration.');
    }

    public function login_page()
    {
        return view('web.login');
    }

    public function authenticate(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return redirect()->back()->with(['error' => 'Invalid email or password.']);
        }
    }
}
