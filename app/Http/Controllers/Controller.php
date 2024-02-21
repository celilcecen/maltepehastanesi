<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\FooterLogo;
use App\Models\HeaderCorporateLink;
use App\Models\Language;
use App\Models\NavbarMessage;
use App\Models\SEO;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $shared = Cache::rememberForever('shared_'.app()->getLocale(), function(){
                $contactUs = ContactUs::first()->translate(app()->getLocale());
                $seo = SEO::withTranslation(app()->getLocale())->first()->translate(app()->getLocale());
                $pages = StaticPage::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
    
                $navbarMessages = NavbarMessage::withTranslation(app()->getLocale())->get()->translate(app()->getLocale())->implode('content', ' // ');

                $headerCorporateLinks = HeaderCorporateLink::withTranslation(app()->getLocale())->with(['corporatePage'])
                    ->orderBy('sort', 'ASC')
                    ->get()
                    ->translate(app()->getLocale());
    
                $footer_logos = FooterLogo::orderBy('sort', 'ASC')->get();
    
                $kvkk = $pages->where('is_KVKK', true)->first();
    
                $langs = Language::where('active', 1)->get();

                return [
                    "contactUs" => $contactUs,
                    "seo" => $seo,
                    "pages" => $pages,
                    "navbarMessages" => $navbarMessages,
                    "headerCorporateLinks" => $headerCorporateLinks,
                    "footer_logos" => $footer_logos,
                    "kvkk" => $kvkk,
                    "langs" => $langs,
                ];
            });

            View::share($shared);

            return $next($request);
            
        });
    }
}
