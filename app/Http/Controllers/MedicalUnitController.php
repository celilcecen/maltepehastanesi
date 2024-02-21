<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalUnit;
use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class MedicalUnitController extends Controller
{
    public function index(Request $request)
    {
        $compact = Cache::rememberForever('units_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'tibbi-birimlerimiz')->first()->translate(app()->getLocale());
            $unitsCount = MedicalUnit::count();
            $doctorsCount = Doctor::active()->count();

            return [
                "meta" => $meta,
                "doctorsCount" => $doctorsCount,
                "unitsCount" => $unitsCount,
            ];
        });

        $units = MedicalUnit::withTranslation(app()->getLocale())->when($request->search, function($query) use ($request){
            $query->whereTranslation('title', 'like', "%$request->search%");
        })
        ->get()
        ->translate(app()->getLocale())->sortBy('title')->groupBy(function($item){
            return tr_strtoupper(mb_substr($item->title, 0, 1));
        })->sortKeysUsing('sortTurkishLetters');
        
        return view('medicalUnits.index', compact('units'))->with($compact);
    }

    public function show(Request $request)
    {
        $compact = Cache::rememberForever("units_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $unit = MedicalUnit::with('blogs', 'blogs.categories', 'blogs.author', 'doctors', 'doctors.units')->whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());

            $meta = New Meta ;
            $meta->meta_title = $unit->meta_title;
            $meta->meta_description = $unit->meta_description;
            $meta->meta_keyword = $unit->meta_keyword;
            $meta->meta_canonical = $unit->meta_canonical;
            $meta->meta_ogimage = $unit->meta_ogimage;

            return [
              "unit" => $unit,
              "meta" => $meta
            ];
        });

        $shareBtns = [];
        foreach($compact["unit"]->blogs as $blog){
            $shareBtns[$blog->id] = \Share::page(
                localeRoute('blogs.show', $blog->slug),
                $blog->title
            )
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp()
                ->reddit()
                ->pinterest()
                ->telegram();
        }

        Session::flash('slugObject', $compact["unit"]);

        return view('medicalUnits.show',compact('shareBtns'))->with($compact);
    }
}
