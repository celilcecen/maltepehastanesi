<?php

namespace App\Http\Middleware;

use App\Models\SiteText;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        if(!$locale || !in_array($locale, config('voyager.multilingual.locales'))){
            if($request->route()->getName() == "homepage"){
                $locale = "tr";
            }else{
                $params = $request->route()->parameters;
                $params["locale"] = 'tr';
                return redirect(route($request->route()->getName(), $params));
            }
        }

        App::setLocale($locale);

        if ($locale == Session::get('locale') && Session::has('siteTexts')){
            App::setLocale($locale);
            return $next($request);
        }

        Session::put('locale', $locale);
        
        $siteTextsArray = Cache::rememberForever('siteTexts_'.app()->getLocale(), function() use ($locale){

            $siteTexts = SiteText::withTranslation(app()->getLocale())->get()->translate($locale);
            $siteTextsArray = [];
            foreach($siteTexts as $text)
                $siteTextsArray[$text->key] = $text->content;
            
            return $siteTextsArray;
        });
        Session::put('siteTexts', $siteTextsArray);

        return $next($request);
    }
}
