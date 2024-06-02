<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public static function sendEmail($destinatation,$body,$title)
    {
        $details=[
            'title'=>$title,
            'body'=>$body
        ];

        Mail::to($destinatation)->send(new ConfirmationMail($details));

    }
}
