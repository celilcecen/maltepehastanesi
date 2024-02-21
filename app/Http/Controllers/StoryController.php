<?php

namespace App\Http\Controllers;

use App\Mail\StoryMail;
use App\Models\TargetMail;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Mail;

class StoryController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'gender' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

    //    dd($validatedData);

        $story = new Story;

        if ($request->input('sharing_preference')) {
            $story->user_name = 'Anonymous';
            $story->email = 'anonymous@anonymous.com';
        } else {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|string|max:255',
                'gender' => 'required',
                 'title' => 'required|string|max:255',
                'content' => 'required'
            ]);

            $story->user_name = $validatedData['name'];
            $story->email = $validatedData['email'];
        }

        $story->gender = $validatedData['gender'];
        $story->title = $validatedData['title'];
        $story->content = $validatedData['content'];
        $story->is_approved = 0;
        $story->save();

        $targetMail = TargetMail::where('model' , 'Story')->first();
        
        if($targetMail) Mail::to($targetMail->email)->send(new StoryMail($story));

        return redirect()->back()->with('success', text('story_submitted'));

   

    }
}
