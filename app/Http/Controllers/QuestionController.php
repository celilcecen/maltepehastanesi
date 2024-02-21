<?php

namespace App\Http\Controllers;

use App\Mail\QuestionMail;
use App\Models\MedicalUnit;
use App\Models\Question;
use App\Models\Subject;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([

            
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'unit_id' => 'required',
            'subject_id' => 'required',
            'price_request' => 'boolean',
            'contact_by_phone' => 'boolean',
            'contact_by_email'=> 'boolean',
            'contact_by_sms'=> 'boolean',
 
        ]);

        $question = new Question;
        $question->first_name = $validatedData['first_name'];
        $question->last_name = $validatedData['last_name'];
        $question->email = $validatedData['email'];
        $question->phone = $validatedData['phone'];
        $question->medical_unit_id = $validatedData['unit_id'];
        $question->subject_id = $validatedData['subject_id'];
        $question->ask_for_price = $validatedData['price_request'] ?? false;
        $question->contact_by_phone = $validatedData['contact_by_phone']?? false;
        $question->contact_by_email= $validatedData['contact_by_email']?? false;
        $question->contact_by_sms= $validatedData['contact_by_sms']?? false;
        $question->save();

        $medical_unit = MedicalUnit::findOrFail($question->medical_unit_id);
        $subject = Subject::findOrFail($question->subject_id);

        $targetMail = TargetMail::where('model' , 'Question')->first();
        
        if($targetMail) Mail::to($targetMail->email)->send(new QuestionMail($question,$medical_unit,$subject));

        return redirect()->back()->with('success', text('Question_submitted'));
      

    }
}
