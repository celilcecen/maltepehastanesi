<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta ;
use App\Models\CoverImage ;
use App\Models\InsuranceCompany ;
use App\Models\CorporatePage ;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CorporatePageController extends Controller
{
    public function show(Request $request){
        $compact = Cache::rememberForever("corporate_{$request->slug}_".app()->getLocale(), function() use ($request){
            $corporatePage = CorporatePage::with(['insurance_Companies'])->whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());

            $meta = New Meta ;
            $meta->meta_title = $corporatePage->meta_title;
            $meta->meta_description = $corporatePage->meta_description;
            $meta->meta_keyword = $corporatePage->meta_keyword;
            $meta->meta_canonical = $corporatePage->meta_canonical;
            $meta->meta_ogimage = $corporatePage->meta_ogimage;

            return [
                "corporatePage" => $corporatePage,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["corporatePage"]);

        return view('CorporatePage.show')->with($compact);

    }
}
