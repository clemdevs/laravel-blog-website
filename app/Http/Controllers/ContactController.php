<?php

namespace App\Http\Controllers;

use App\Http\Requests\Email\SendEmailRequest;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Mime\Message;

class ContactController extends Controller
{
    public function send(SendEmailRequest $request)
    {
        $recepient = User::admins()->first();

        Mail::to($recepient)
            ->send(new ContactMail($request->validated()));

        return redirect()->route('blog.contact')
            ->with('success', 'Your message has been sent successfully.');
    }
}
