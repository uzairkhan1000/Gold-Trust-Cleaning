<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function SendMail(Request $request) 
    { 
        $name = $request->all()['name'];
        $email = $request->all()['email'];
        $phone = $request->all()['phone'];
        $message = $request->all()['message'];

            Mail::to(env('MAIL_RECEIVER'))->send(new ContactMail($name, $email, $phone, $message));
            return new JsonResponse(
                [
                    'success' => true, 
                    'message' => "Email Sent"
                ], 
                200
            );
    }
}
