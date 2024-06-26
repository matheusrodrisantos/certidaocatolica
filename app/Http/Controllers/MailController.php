<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use App\Mail\PendigMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public static function sendEmail($destinatation,$body,$title, $nome, $type,$file='')
    {
        $details=[
            'title'=>$title,
            'body'=>$body,
            'nome'=>$nome
        ];

        switch($type){
            case "confirmation":
                Mail::to($destinatation)->send(new ConfirmationMail($details));
                break;
            case "approved":
                if(!empty($file)){
                    Mail::to($destinatation)->send(new ApprovedMail($details,$file));    
                }else{
                    Mail::to($destinatation)->send(new ApprovedMail($details));
                }
                break;
            case "file":
                    Mail::to($destinatation)->send(new ApprovedMail($details));
                    break;
            case "pending":
                Mail::to($destinatation)->send(new PendigMail($details));
                break;
        }
        

    }
}
