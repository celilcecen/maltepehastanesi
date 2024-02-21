<?php

namespace App\Http\Controllers;

use App\Mail\DoctorQuestionMail;
use App\Models\DoctorQuestion;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DoctorQuestionController extends Controller
{
    public function store(Request $request)
{

    

    $validatedData = $request->validate([
        'user_name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $question = new DoctorQuestion;
    $question->user_name = $validatedData['user_name'];
    $question->email = $validatedData['email'];
    $question->question = $validatedData['message'];
    $question->source_url = $request->headers->get('referer') ;
    $question->save();
  
    $targetMail = TargetMail::where('model' , 'DoctorQuestion')->first();

    if($targetMail) Mail::to($targetMail->email)->send(new DoctorQuestionMail($question));


    return redirect()->back()->with('success', text('DoctorQuestion_submitted'));
}
}
