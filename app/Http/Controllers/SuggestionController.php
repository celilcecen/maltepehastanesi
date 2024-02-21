<?php

namespace App\Http\Controllers;

use App\Mail\SuggestionMail;
use App\Models\Suggestion;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuggestionController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $suggestion = new Suggestion ;
        
        $suggestion->first_name = $validatedData['first_name'];
        $suggestion->last_name = $validatedData['last_name'];
        $suggestion->email = $validatedData['email'];
        $suggestion->phone = $validatedData['phone'];
        $suggestion->message = $validatedData['message'];

        $suggestion->save();

        $targetMail = TargetMail::where('model' , 'Suggestion')->first();
        
        if($targetMail) Mail::to($targetMail->email)->send(new SuggestionMail($suggestion));
        
        
        return redirect()->back()->with('success', text('Suggestion_Message_submitted'));
       

    }
}
