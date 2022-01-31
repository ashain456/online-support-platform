<?php

namespace App\Http\Controllers;

use App\Usecase\LoginUsecase;
use App\Usecase\MailUsecase;
use App\Usecase\OnlineSupportPlatformUsecase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OnlineSupportPlatformController extends Controller
{
    /**
     * @var MailUsecase
     */
    private $mailUsecase;

    /**
     * @param LoginUsecase $loginUsecase
     * @param OnlineSupportPlatformUsecase $onlineSupportPlatformUsecase
     * @param MailUsecase $mailUsecase
     */
    public function __construct(
        LoginUsecase $loginUsecase,
        OnlineSupportPlatformUsecase $onlineSupportPlatformUsecase,
        MailUsecase $mailUsecase
    )
    {
        $this->loginUsecase = $loginUsecase;
        $this->onlineSupportPlatformUsecase = $onlineSupportPlatformUsecase;
        $this->mailUsecase = $mailUsecase;
    }

    /**
     * @return mixed
     */
    public function ticket()
    {
        return view('ticket');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function complain(Request $request)
    {
        $data = $request->all();
        $keyword = (isset($data['q']))?$data['q']:'';

        $resDta = $this->onlineSupportPlatformUsecase->listComplains($keyword);
        return view('complain', compact('resDta'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function complainStatus(Request $request)
    {
        $resDta = [];
        $isSearch = false;
        $data = $request->all();
        $keyword = (isset($data['q']))?$data['q']:'';

        if(!empty($keyword)){
            $isSearch = true;
            $resDta = $this->onlineSupportPlatformUsecase->complainStatus($keyword);
            return view('complain_status', compact('resDta','isSearch'));
        }else{
            return view('complain_status', compact('resDta','isSearch'));
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function complainInfo(Request $request, $id=0)
    {
        $resDta = $this->onlineSupportPlatformUsecase->complainInfoById($id);
        return view('complain_info', compact('resDta'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function complainAddComment(Request $request, $id=0)
    {
        $request->validate([
            'agent_comment' => 'required|max:400',
        ]);

        $data = $request->all();

        $res = $this->onlineSupportPlatformUsecase->complainAddComment($data, $id);

        // send email to client to inform the ticket has open
        if($res){
            $subject = "Replied to your complaint";
            $to = $data['customer_email'];
            $body = "<p>Dear customer,</p>";
            $body .= "<p>We were looked at your complaint and replied</p>";
            $body .= "<div style='font-weight: bold; background: #bfffd0; padding: 10px; line-height: 24px; border: 2px solid #93e0a7;'>Your name is: ".$data['customer_name']."<br />";
            $body .= "Your complain key is: ".$data['customer_key']."</div>";
            $body .= "<p>Use your key and review your complaint status from : <a href='http://127.0.0.1:8000/complain/status?q=".$data['customer_key']."' >CLECK HERE</a> </p>";

            $this->mailUsecase->sendMail($to, $subject, $body);
        }

        return redirect('complain');

    }

    /**
     * @return mixed
     */
    public function dashboard()
    {

        if(!Session::exists('token-key')) {
            return redirect()->intended('login');
        }

        return view('dashboard');

        //return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createTicket(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|max:20',
            'customer_email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'customer_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'customer_problem' => 'required|max:400',
        ],[
            'customer_email.regex' => 'Please enter the valid email address',
        ]);

        $data = $request->all();
        $data['complain_key'] = "COM-OSP-".time();
        $resDta = $this->onlineSupportPlatformUsecase->createTicket($data);

        // send email to client to view their complaint by key
        if($resDta){
            $subject = "Received Your Complaint";
            $to = $data['customer_email'];
            $body = "<p>Dear customer,</p>";
            $body .= "<p>We have received your complaint</p>";
            $body .= "<div style='font-weight: bold; background: #bfffd0; padding: 10px; line-height: 24px; border: 2px solid #93e0a7;'>Your name is: ".$data['customer_name']."<br />";
            $body .= "Your complain key is: ".$data['complain_key']."</div>";
            $body .= "<p>Use your key and review your complaint status from : <a href='http://127.0.0.1:8000/complain/status?q=".$data['complain_key']."' >CLECK HERE</a> </p>";

            $this->mailUsecase->sendMail($to, $subject, $body);
        }

        return view('ticket', compact('resDta'));
    }

}
