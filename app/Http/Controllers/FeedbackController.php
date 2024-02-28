<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('feedback-form');
    }
    public function send (Request $request): Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validated = $request->validate([
            'full_name' => 'required|max:100',
            'email' => 'required|email',
            'comment' => 'required',
        ]);
        $full_name=$request->input('full_name');
        $email=$request->input('email');
        $message=$request->input('comment');
        Mail::to('comp3385@uwi.edu', 'COMP3385 Course Admin')
            ->send(new Feedback($full_name, $email, $message));
        return redirect('success');
    }
    public function success(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('success');
    }
}
