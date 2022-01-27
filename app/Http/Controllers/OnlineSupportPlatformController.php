<?php

namespace App\Http\Controllers;

use App\Usecase\LoginUsecase;
use App\Usecase\OnlineSupportPlatformUsecase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OnlineSupportPlatformController extends Controller
{

    public function __construct(
        LoginUsecase $loginUsecase,
        OnlineSupportPlatformUsecase $onlineSupportPlatformUsecase
    )
    {
        $this->loginUsecase = $loginUsecase;
        $this->onlineSupportPlatformUsecase = $onlineSupportPlatformUsecase;
    }

    public function ticket()
    {
        return view('ticket');
    }

    public function complain(Request $request)
    {
        $data = $request->all();
        $keyword = (isset($data['q']))?$data['q']:'';

        $resDta = $this->onlineSupportPlatformUsecase->listComplains($keyword);
        return view('complain', compact('resDta'));
    }

    public function complainInfo(Request $request, $id=0)
    {
        $resDta = $this->onlineSupportPlatformUsecase->complainInfoById($id);
        return view('complain_info', compact('resDta'));
    }

    public function complainAddComment(Request $request, $id=0)
    {
        $request->validate([
            'agent_comment' => 'required|max:200',
        ]);

        $data = $request->all();
        $this->onlineSupportPlatformUsecase->complainAddComment($data, $id);

        $resDta = $this->onlineSupportPlatformUsecase->listComplains("");
        return view('complain', compact('resDta'));

    }

    public function dashboard()
    {

        if(!Session::exists('token-key')) {
            return redirect()->intended('login');
        }

        return view('dashboard');

        //return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function createTicket(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|max:20',
            'customer_email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'customer_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'customer_problem' => 'required|max:200',
        ],[
            'customer_email.regex' => 'Please enter the valid email address',
        ]);

        $data = $request->all();
        $resDta = $this->onlineSupportPlatformUsecase->createTicket($data);
        return view('ticket', compact('resDta'));
    }

}
