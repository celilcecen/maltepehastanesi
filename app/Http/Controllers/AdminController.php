<?php

namespace App\Http\Controllers;

use App\Models\RedirectLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function robots()
    {
        $robots = file_get_contents(public_path("robots.txt"));
        $sitemap = file_get_contents(public_path("sitemap.xml"));
        return view('admin.robots', compact('robots', 'sitemap'));
    }

    public function robotsStore(Request $request)
    {
        file_put_contents(public_path("robots.txt"), $request->robots);
        file_put_contents(public_path("sitemap.xml"), $request->sitemap);

        return redirect()->route('robots.index')->with(['message' => 'Kaydedildi', 'alert-type' => 'success']);
    }

    public function regenerateSitemap()
    {
        $redirectLinks = RedirectLink::get()->pluck('source')->toArray();
        SitemapGenerator::create(config('app.url'))
        ->shouldCrawl(function ($url) use ($redirectLinks){
            return !in_array($url->getPath(), $redirectLinks);
        })
        ->writeToFile(public_path('sitemap.xml'));

        $sitemap = file_get_contents(public_path("sitemap.xml"));
        $sitemap = str_replace(['<priority>0.8</priority>','<changefreq>daily</changefreq>'], "", $sitemap);
        file_put_contents(public_path("sitemap.xml"), $sitemap);

        return redirect()->route('robots.index')->with(['message' => 'Sitemap.xml dosyası oluşturuldu', 'alert-type' => 'success']);
    }

    public function refreshRouteCache()
    {
        Artisan::call('route:cache');

        return redirect()->back()->with(['message' => 'Route Cache başarıyla güncellendi', 'alert-type' => 'success']);
    }
}
