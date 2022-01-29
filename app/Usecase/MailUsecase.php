<?php

/*
 *  Business logic handle here
 */

namespace App\Usecase;

use App\Repository\Contracts\LoginRepositoryInterface;
use App\Repository\Contracts\OnlineSupportPlatformRepositoryInterface;
use Illuminate\Support\Facades\Log;


class MailUsecase
{

    public function __construct()
    {
    }

    public function sendMail($to="", $subject="", $body=""){

//        try{

            $details = [
                'body' => $body
            ];

            \Mail::to($to)->send(new \App\Mail\MailService($subject, $details));

//        }catch (\Exception $ex) {
//            Log::error("Error in email send: ", (array)$ex);
//        }

    }

}
