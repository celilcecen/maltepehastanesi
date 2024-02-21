<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\CheckupType;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function store(Request $request ){

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' =>'required',
            'phone' => 'required',
            'message' => 'required',
            'checkuptype_id' => 'required'
        ]);


        $appointment = new Appointment;

        $appointment->first_name = $validatedData['first_name'];
        $appointment->last_name = $validatedData['last_name'];
        $appointment->email = $validatedData['email'];
        $appointment->phone = $validatedData['phone'];
        $appointment->message = $validatedData['message'];
        $appointment->checkuptype_id = $validatedData['checkuptype_id'];

        $checkupType = CheckupType::findOrFail($appointment->checkuptype_id);
        $targetMail = TargetMail::where('model' , 'Appointment')->first();

        $appointment->save();

        
        if($targetMail) Mail::to($targetMail->email)->send(new AppointmentMail($appointment,$checkupType));

        return redirect()->back()->with('success',  text('Appointment_submitted'));

    }
}
