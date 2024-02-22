<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create() {
        return view('feedback-form');
    }
    public function send (){
        
    }
}
