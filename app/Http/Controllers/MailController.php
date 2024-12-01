<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendMailJob;
use App\Models\SentMail;
use Illuminate\Support\Str;

class MailController
{
    public function index()
    {
        return view('mail-form');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|email',
            'to' => 'required|email',
            'cc' => 'nullable|email',
            'subject' => 'required|string',
            'type' => 'required|in:text,html',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $uuid = (string) Str::uuid();

        $mail = SentMail::create([
            'uuid' => $uuid,
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'cc' => $request->input('cc'),
            'subject' => $request->input('subject'),
            'type' => $request->input('type'),
            'body' => $request->input('body'),
            'ip_address' => $request->ip(),
        ]);

        SendMailJob::dispatch($mail);

        return redirect()->route('email.success', $uuid);
    }

    public function success($uuid)
    {
        $mail = SentMail::where('uuid', $uuid)->firstOrFail();
        return view('success', compact('mail'));
    }
}
