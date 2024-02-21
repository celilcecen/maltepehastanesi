<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationMail;
use App\Models\Branch;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
 
            'userName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'TRIdentity' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string|max:255',
            'branch' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'coverletter' => 'nullable|string|max:500',
            'cv' => 'nullable|file|max:5120|mimes:pdf,docx,doc',
        ]);

        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $path = $file->store("/hr", 'public');
            $filepath = '[{"download_link":"'.$path.'","original_name":"'.$file->getClientOriginalName().'"}]';
        }

        $jobApplication = new JobApplication;
        $jobApplication->user_name = $validatedData['userName'];
        $jobApplication->email = $validatedData['email'];
        $jobApplication->phone = $validatedData['phone'];
        $jobApplication->tr_identity = $validatedData['TRIdentity'];
        $jobApplication->age = $validatedData['age'];
        $jobApplication->gender = $validatedData['gender'];
        $jobApplication->branch_id = $validatedData['branch'];
        $jobApplication->country = $validatedData['country'];
        $jobApplication->address = $validatedData['address'];
        $jobApplication->cover_letter = $validatedData['coverletter'];
        $jobApplication->cv_file = $filepath ?? null;
        
        $branch = Branch::findOrFail($jobApplication->branch_id);

        $jobApplication->save();

        $targetMail = TargetMail::where('model' , 'JobApplication')->first();

        if($targetMail) Mail::to($targetMail->email)->send(new JobApplicationMail($jobApplication,$branch));

        return redirect()->back()->with('success', text('job_Application_submitted'));
    }
}
