<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\FooterLogo;
use App\Models\HeaderCorporateLink;
use App\Models\Language;
use App\Models\NavbarMessage;
use App\Models\SEO;
use App\Models\SiteText;
use App\Models\StaticPage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('layout.pagination');
        Paginator::defaultSimpleView('layout.pagination');

        View::composer(['errors::*', 'errors.*'], function ($view) {
            $contactUs = ContactUs::first();
            $seo = SEO::first()->translate(Session::get('locale'));
            $pages = StaticPage::select('id', 'title', 'slug')->get()->translate(Session::get('locale'));

            $navbarMessages = NavbarMessage::all()->translate(Session::get('locale'));
            $navbarMessagesString = $navbarMessages->implode('content', ' // ');

            $headerCorporateLinks = HeaderCorporateLink::with(['corporatePage'])
                ->orderBy('sort', 'ASC')
                ->get()
                ->translate(Session::get('locale'));

            $footer_logos = FooterLogo::orderBy('sort', 'ASC')->get();

            $kvkk = StaticPage::where('is_KVKK',1)->first()->translate(Session::get('locale'));
            
            View::share('contactUs', $contactUs );
            View::share('seo', $seo );
            View::share('navbarMessages', $navbarMessagesString);
            View::share('pages', $pages );
            View::share('headerCorporateLinks', $headerCorporateLinks );
            View::share('kvkk', $kvkk );
            view::share('footer_logos',$footer_logos);

            $langs = Language::where('active', 1)->get();

            // dd($langs);
            
            View::share('langs', $langs);

            $locale = request()->segment(1);
            if(!$locale || !in_array($locale, config('voyager.multilingual.locales')))
                $locale = "tr";
            
            App::setLocale($locale);

            Session::put('locale', $locale);
        
            $siteTextsArray = Cache::rememberForever('siteTexts_'.app()->getLocale(), function() use ($locale){

                $siteTexts = SiteText::withTranslation(app()->getLocale())->get()->translate($locale);
                $siteTextsArray = [];
                foreach($siteTexts as $text)
                    $siteTextsArray[$text->key] = $text->content;
                
                return $siteTextsArray;
            });
            
            Session::put('siteTexts', $siteTextsArray);
        });
    }
}
