<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob; // Make sure this line is present

class EmailController extends Controller
{
    public function sendEmail()
    {
        $emailDetails = [
            'email' => 'soniyavijaya63@gmail.com',
            'subject' => 'Test Email',
            'title' => 'Hello!',
            'body' => 'This is a test email message.'
        ];

        SendEmailJob::dispatch($emailDetails)->onQueue('emails')->delay(now()->addSeconds(10));

        return response()->json(['message' => 'Email job dispatched successfully!']);
    }
}
