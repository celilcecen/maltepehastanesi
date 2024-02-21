<?php

namespace App\Http\Controllers;

use App\Mail\BultenMail;
use App\Models\Bulten;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BultenController extends Controller
{

    public function store(Request $request){

        $validatedData = $request->validate([
            'email' => 'required'

        ]);

        $bulten = new Bulten;
        $bulten->email = $validatedData['email'];
        $bulten->save();

        $targetMail = TargetMail::where('model' , 'Bulten')->first();

        // Mail::to(targetMail->Email)->send(new BultenMail($bulten));

        return redirect()->back()->with('success', text('bulten_submitted'));

        

    }
}
