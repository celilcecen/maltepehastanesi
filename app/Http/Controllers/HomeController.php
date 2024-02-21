<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\ContactUsLocation;
use App\Models\CoverImage;
use App\Models\HomeHealth;
use App\Models\HomeService;
use App\Models\Institutional;
use App\Models\PatientGuide;
use App\Models\VisionText;
use Illuminate\Http\Request;
use App\Models\CheckupType;
use App\Models\Story;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\Campaign;
use App\Models\News;
use App\Models\MedicalUnit;
use App\Models\Meta;
use App\Models\Pharmacy;
use App\Models\Popup;
use App\Models\SlideShow;
use App\Models\Subject;
use Carbon\Carbon;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Monarobase\CountryList\CountryListFacade;


class HomeController extends Controller
{
    public function index()
    {
        $compact = Cache::rememberForever('homepage_'.app()->getLocale(), function(){
            $homehealth = HomeHealth::withTranslation(app()->getLocale())->first()->translate(app()->getLocale());
            $homeServices = HomeService::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
            $institutional = Institutional::withTranslation(app()->getLocale())->first()->translate(app()->getLocale());
            $blogs = Blog::withTranslation(app()->getLocale())->where('is_featured', 1)->orderByDesc('date')->get()->translate(app()->getLocale());
            $news = News::withTranslation(app()->getLocale())->orderByDesc('date')->take(5)->get()->translate(app()->getLocale());
            $slideShows = SlideShow::withTranslation(app()->getLocale())->orderBy('sort', 'asc')->get()->translate(app()->getLocale());
            $campaigns = Campaign::withTranslation(app()->getLocale())->where('is_featured', 1)->orderByDesc('date')->get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('homepage');

            $checkup_types = CheckupType::withTranslation(app()->getLocale())->where('showHomePage', 1)->orderBy('sort')->get()->translate(app()->getLocale());
    
            $units = MedicalUnit::all()
            ->translate(app()->getLocale())->sortBy('title')->groupBy(function($item){
                return tr_strtoupper(mb_substr($item->title, 0, 1));
            })->sortKeysUsing('sortTurkishLetters');
    
            $meta = Meta::withTranslation(app()->getLocale())->where('page_name', 'anasayfa')->first()->translate(app()->getLocale());

            return [
                "homehealth" => $homehealth,
                "homeServices" => $homeServices,
                "institutional" => $institutional,
                "blogs" => $blogs,
                "news" => $news,
                "breadcrumbs" => $breadcrumbs,
                "slideShows" => $slideShows,
                "checkup_types" => $checkup_types,
                "units" => $units,
                "meta" => $meta,
                "campaigns" => $campaigns ,
            ];
        });

        $compact["pharmacies"] = Cache::rememberForever('pharmacies', function(){
            $pharmacies = Pharmacy::orderBy('updated_at', 'desc')->orderBy('distance')->take(3)->get();
            return $pharmacies;
        });

        $compact["popup"] = Popup::where('expiration_date', '>=', Carbon::now())->where('lang', app()->getLocale())->first();

        // dd($compact);
        return view('homepage')->with($compact);

    }
    
    public function contactUs()
    {
        $compact = Cache::rememberForever('contactUs_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'iletisim')->first()->translate(app()->getLocale());
            $locations = ContactUsLocation::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('contactUs');

            return [
                "meta" => $meta,
                "breadcrumbs" => $breadcrumbs,
                "locations" => $locations
            ];
        });
        return view('contactUs')->with($compact);
    }

    public function healthAtHome(){
        $compact = Cache::rememberForever('healthAtHome_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'evde-saglik')->first()->translate(app()->getLocale());
            $coverImage = CoverImage::where('page_name', 'evde-saglik')->first()->translate(app()->getLocale());
            $homehealth = HomeHealth::first()->translate(app()->getLocale());
            $homeServices = HomeService::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('healthAtHome');

            return [
                "meta" => $meta,
                "coverImage" => $coverImage,
                "homehealth" => $homehealth,
                "breadcrumbs" => $breadcrumbs,
                "homeServices" => $homeServices,
            ];
        });
        return view('healthAtHome')->with($compact);
    }
    
    public function patientGuide(){
        $compact = Cache::rememberForever('patientGuide_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'hasta-rehberi')->first()->translate(app()->getLocale());
            $coverImage = CoverImage::where('page_name', 'hasta-rehberi')->first()->translate(app()->getLocale());
            $patientsGuides = PatientGuide::withTranslation(app()->getLocale())->get()->translate(app()->getLocale())->sortBy('title');
            $breadcrumbs = Breadcrumbs::generate('patientGuide');

            return [
                "meta" => $meta,
                "coverImage" => $coverImage,
                "breadcrumbs" => $breadcrumbs,
                "patientsGuides" => $patientsGuides,
            ];
        });
        return view('patientGuide')->with($compact);
    }

    public function qualityCertificate(){
        $meta = Meta::where('page_name', 'kalite-belgeleri')->first()->translate(app()->getLocale());
        $coverImage = CoverImage::where('page_name', 'kalite-belgeleri')->first()->translate(app()->getLocale());
        $certificates = Certificate::withTranslation(app()->getLocale())->paginate(10);
        $breadcrumbs = Breadcrumbs::generate('qualityCertificate');

        $certificates->getCollection()->transform(function ($certificate) {
             return $certificate->translate(app()->getLocale());
        });

        return view('qualityCertificate',compact('certificates', 'coverImage','meta','breadcrumbs'));
    }

    public function institutional(){
        $compact = Cache::rememberForever('institutional_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'kurumsal')->first()->translate(app()->getLocale());
            $coverImage = CoverImage::where('page_name', 'kurumsal')->first()->translate(app()->getLocale());
            $institutional = Institutional::first()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('kurumsal.aboutUs');

            return [
                "meta" => $meta,
                "coverImage" => $coverImage,
                "breadcrumbs" => $breadcrumbs,
                "institutional" => $institutional,
            ];
        });
        return view('institutional')->with($compact);
    }

    public function visiontext(){
        $compact = Cache::rememberForever('visiontext_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'vizyon')->first()->translate(app()->getLocale());
            $coverImage = CoverImage::where('page_name', 'vizyon')->first()->translate(app()->getLocale());
            $visiontext = VisionText::first()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('kurumsal.vision');

            return [
                "meta" => $meta,
                "coverImage" => $coverImage,
                "breadcrumbs" => $breadcrumbs,
                "visiontext" => $visiontext,
            ];
        });
        return view('visiontext')->with($compact);
    }

    public function stories(){
        $meta = Meta::where('page_name', 'hasta_hikaye')->first()->translate(app()->getLocale());
        $coverImage = CoverImage::where('page_name', 'hasta_hikaye')->first()->translate(app()->getLocale());
        $stories = Story::where('is_approved',1)->get()->translate(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('stories');

        return view('stories',compact('stories','coverImage','meta','breadcrumbs'));
    }

    public function appointment(){

        $meta = Meta::where('page_name', 'online-randevu')->first()->translate(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('appointment');

        //return view('appointment',compact('meta','breadcrumbs')) ;
		  return redirect()->away('https://randevu.maltepehastanesi.com.tr');
    }

    public function eResult(){

        $meta = Meta::where('page_name', 'e-sonuc')->first()->translate(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('eResult');

        return view('eResult',compact('meta','breadcrumbs')) ;

    }

    public function askForPrice(){

        $meta = Meta::where('page_name', 'fiyat-ogren-sor')->first()->translate(app()->getLocale());
        $units = MedicalUnit::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
        $subjects = Subject::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('askForPrice');

        return view('askForPrice',compact('units','subjects','meta','breadcrumbs')) ;
    }

    public function HumanResources(){

        $meta = Meta::where('page_name', 'insan-kaynaklari')->first()->translate(app()->getLocale());
        $coverImage = CoverImage::where('page_name', 'insan-kaynaklari')->first()->translate(app()->getLocale());
        $branches = Branch::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
        $countries = CountryListFacade::getList(app()->getLocale());
        $breadcrumbs = Breadcrumbs::generate('HumanResources');

    //    dd(json_encode($countries));
        return view('HumanResources',compact('coverImage','branches','countries','meta','breadcrumbs'));
    }

    public function pharmacy()
{
    $hospitalLocation = [40.925157, 29.135561]; 

    $pharmacies = Http::withHeaders([
        "content-type"=> "application/json",
        "authorization"=> "apikey 0OSEKsmUd2HA7nKbNFrskC:4BLEbfLbCnUw0KQMgvJu9n"
    ])->get('https://api.collectapi.com/health/dutyPharmacy', [
        'il' => 'istanbul',
    ]);



    $distances = [];
    foreach ($pharmacies->collect()["result"] as $pharmacy) {
        $pharmacyLocation = explode(',', $pharmacy['loc']);
        $distance = $this->haversine($hospitalLocation, $pharmacyLocation);

        $distances[] = [
            "pharma" => $pharmacy,
            "distance" => $distance
        ];

    }
    
    $nearestPharmas = collect($distances)->sortBy('distance');
    $nearestPharmas->splice(3);

    foreach ($nearestPharmas as $pharmacy) {
        $pharma = new Pharmacy;
        $pharma->name = $pharmacy["pharma"]['name'] ;
        $pharma->dist = $pharmacy["pharma"]['dist'] ;
        $pharma->address = $pharmacy["pharma"]['address'] ;
        $pharma->phone = $pharmacy["pharma"]['phone'] ;
        $pharma->loc = $pharmacy["pharma"]['loc'] ;
        $pharma->distance = $pharmacy["distance"];
 

        $pharma->save();
    }

}

    private function haversine($location1, $location2)
    {
        $lat1 = deg2rad($location1[0]);
        $lon1 = deg2rad($location1[1]);
        $lat2 = deg2rad($location2[0]);
        $lon2 = deg2rad($location2[1]);
        
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2)**2 + cos($lat1) * cos($lat2) * sin($dlon / 2)**2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = 6371 * $c; // approximate radius of Earth in kilometers
        
        return $distance;
    }

    public function kvkk(){

        return view('layout.kvkkModal');
    }
    
}
