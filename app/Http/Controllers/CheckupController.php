<?php

namespace App\Http\Controllers;

use App\Models\CheckupType;
use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CheckupController extends Controller
{
    public function index(Request $request){
        $compact = Cache::rememberForever('checkup_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'checkup')->first()->translate(app()->getLocale());
            $checkup_types = CheckupType::withTranslation(app()->getLocale())->orderByDesc('gender')->orderBy('sort')->get()->translate(app()->getLocale());

            return [
                "meta" => $meta,
                "checkup_types" => $checkup_types
            ];
        });

        return view('checkups.index')->with($compact);
    }

    public function show(Request $request){
        $compact = Cache::rememberForever("checkup_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $checkup_type = CheckupType::with(['groups' => function ($query) {
                $query->orderBy('title');
            }, 'groups.items' => function ($query) {
                $query->orderBy('title');
            }])
            ->whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')
            ->firstOrFail()
            ->translate(app()->getLocale());

            $groups = $checkup_type->groups->translate(app()->getLocale())->sortBy('title')->groupBy(function($item){
                return strtoupper(mb_substr($item->title, 0, 1));
            })->sortKeysUsing('sortTurkishLetters');

            $meta = New Meta ;
            $meta->meta_title = $checkup_type->meta_title;
            $meta->meta_description = $checkup_type->meta_description;
            $meta->meta_keyword = $checkup_type->meta_keyword;
            $meta->meta_canonical = $checkup_type->meta_canonical;
            $meta->meta_ogimage = $checkup_type->meta_ogimage;

            return [
                "checkup_type" => $checkup_type,
                "groups" => $groups,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["checkup_type"]);

        return view('checkups.show')->with($compact);
    }
}
