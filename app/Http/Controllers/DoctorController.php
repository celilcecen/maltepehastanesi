<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalUnit;
use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $compact = Cache::rememberForever('doctors_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'doktorlarimiz')->first()->translate(app()->getLocale());
            $doctorsCount = Doctor::active()->count();
    
            $units = MedicalUnit::withTranslation(app()->getLocale())->get()->translate(app()->getLocale())->sortBy([function ($a, $b) {
                static $charOrder = array('a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş','t', 'u', 'ü', 'v', 'y', 'z');
                
                $a = mb_strtolower($a["title"]);
                $b = mb_strtolower($b["title"]);
            
                for($i=0;$i<mb_strlen($a) && $i<mb_strlen($b);$i++) {
                    $chA = mb_substr($a, $i, 1);
                    $chB = mb_substr($b, $i, 1);
                    $valA = array_search($chA, $charOrder);
                    $valB = array_search($chB, $charOrder);
                    if($valA == $valB) continue;
                    if($valA > $valB) return 1;
                    return -1;
                }
            
                if(mb_strlen($a) == mb_strlen($b)) return 0;
                if(mb_strlen($a) > mb_strlen($b))  return -1;
                return 1;
            
            }]);
            
            $unitsCount = $units->count();
            return [
                "meta" => $meta,
                "doctorsCount" => $doctorsCount,
                "units" => $units,
                "unitsCount" => $unitsCount,
            ];
        });

        $doctors = Doctor::withTranslation(app()->getLocale())->with('units')->active()
        ->when($request->unit, function($query) use($request){
            $query->whereRelation('units', 'medical_units.id', $request->unit);
        })
        ->when($request->search, function($query) use($request){
            $query->whereTranslation('name', 'like', "%$request->search%");
        })
        ->orderBy('sort')->paginate(16);
        return view('doctors.index', compact('doctors'))->with($compact);
    }

    public function show(Request $request)
    {
        $compact = Cache::rememberForever("doctors_show_{$request->slug}_".app()->getLocale(), function() use ($request){

            $doctor = Doctor::with('units')->whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());
            $meta = New Meta ;
            $meta->meta_title = $doctor->meta_title;
            $meta->meta_description = $doctor->meta_description;
            $meta->meta_keyword = $doctor->meta_keyword;
            $meta->meta_canonical = $doctor->meta_canonical;
            $meta->meta_ogimage = $doctor->meta_ogimage;

            return [
                "doctor" => $doctor,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["doctor"]);
        
        return view('doctors.show')->with($compact);
    }
}
