<?php

namespace App\Http\Controllers;

use App\Usecase\LoginUsecase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function __construct(LoginUsecase $loginUsecase)
    {
        $this->loginUsecase = $loginUsecase;
    }

    public function index()
    {
        $reqData = [];

        if(Session::exists('token-key')) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }

        return view('login');
    }

    public function agentLogin(Request $request)
    {

        $message = "";

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Please enter your email address',
            'password.required' => 'Please enter your password',
        ]);

        $data = $request->all();
        $res = $this->loginUsecase->login($data);

        if(isset($res['status']) && $res['status']) {
            $id = isset($res['id'])?$res['id']:0;
            Session::push('token-key', 'OSP-'.$id.'-'.time());
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }

        //Session::flush();
        return redirect('login')->with('message', 'Invalid login credentials');

    }

    public function agentLogout() {
        Session::flush();
        return redirect('login');
    }
}
