<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function show(Request $request){


        $author = Author::whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());
        $blogs = Blog::with(['author', 'categories','comments'])->whereTranslation('author_id', $author->id)->get()->translate(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('author.show', $author);

        Session::flash('slugObject', $author);

        return view('author.show',compact('author','blogs','breadcrumbs'));
    }
}
