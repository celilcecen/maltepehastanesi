<?php

namespace App\Http\Controllers;

use App\Mail\WishingMessageMail;
use App\Models\TargetMail;
use App\Models\WishingMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WishingMessageController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'patientName' => 'required|string|max:255',
            'senderName' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $wishMessage = new WishingMessage ;
        
        $wishMessage->relativeName = $validatedData['patientName'];
        $wishMessage->yourName = $validatedData['senderName'];
        $wishMessage->phone = $validatedData['phone'];
        $wishMessage->message = $validatedData['message'];
        $wishMessage->save();
        
        $targetMail = TargetMail::where('model' , 'WishingMessage')->first();
        
        if($targetMail) Mail::to($targetMail->email)->send(new WishingMessageMail($wishMessage));

        return redirect()->back()->with('success', text('Wishing_Message_submitted'));
       

    }
}
