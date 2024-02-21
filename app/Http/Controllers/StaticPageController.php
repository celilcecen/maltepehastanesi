<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class StaticPageController extends Controller
{
    public function index(Request $request){
        $compact = Cache::rememberForever("doctors_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $page = StaticPage::whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());

            $meta = New Meta ;
            $meta->meta_title = $page->meta_title;
            $meta->meta_description = $page->meta_description;
            $meta->meta_keyword = $page->meta_keyword;
            $meta->meta_canonical = $page->meta_canonical;
            $meta->meta_ogimage = $page->meta_ogimage;

            return [
                "page" => $page,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["page"]);

        return view('staticPage.index')->with($compact);
    }
}
