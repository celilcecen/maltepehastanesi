<?php

namespace App\Http\Controllers;

use App\Mail\ContactOrderMail;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use App\Models\ContactOrder;
use Illuminate\Support\Facades\Mail;

class ContactOrderController extends Controller
{
    public function store(Request $request){


        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'cover_letter' => 'required',

        ]);

  //      dd($validatedData);

        $contactOrder = new ContactOrder();
        $contactOrder->first_name = $validatedData['first_name'];
        $contactOrder->last_name = $validatedData['last_name'];
        $contactOrder->email = $validatedData['email'];
        $contactOrder->telephone = $validatedData['telephone'];
        $contactOrder->cover_letter = $validatedData['cover_letter'];

        $contactOrder->save();

        $targetMail = TargetMail::where('model' , 'ContactOrder')->first();

        if($targetMail) Mail::to($targetMail->email)->send(new ContactOrderMail($contactOrder));


        return redirect()->back()->with('success', text('Contact_Order_submitted'));
    }
}
