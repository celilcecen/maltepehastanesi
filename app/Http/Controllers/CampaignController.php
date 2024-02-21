<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Meta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Session;


class CampaignController extends Controller
{
    public function index(Request $request){

        $compact = Cache::rememberForever('campaigns_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'kampanyalar')->first()->translate(app()->getLocale());
            
            $featured_campaigns = Campaign::withTranslation(app()->getLocale())->where('is_featured', 1)->orderByDesc('id')->get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('campaigns.index');

            return [
                "meta" => $meta,
                "breadcrumbs" => $breadcrumbs,
                "featured_campaigns" => $featured_campaigns,
            ];
        });

        $campaigns = Campaign::withTranslation(app()->getLocale())
        ->orderByDesc('id')->paginate(6);

        return view('campaigns.index',compact('campaigns'))->with($compact);
        
    }

    public function show(Request $request){

        $compact = Cache::rememberForever("campaigns_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $campaign = Campaign::whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());

            $meta = New Meta ;
            
            $meta->meta_title = $campaign->meta_title;
            $meta->meta_description = $campaign->meta_description;
            $meta->meta_keyword = $campaign->meta_keyword;
            $meta->meta_canonical = $campaign->meta_canonical;
            $meta->meta_ogimage = $campaign->meta_ogimage;

            $breadcrumbs = Breadcrumbs::generate('campaigns.show', $campaign);


            return [
                "campaign" => $campaign,
                "breadcrumbs" => $breadcrumbs,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["campaign"]);

        // dd($compact);
        return view('campaigns.show')->with($compact); 

    }
}
