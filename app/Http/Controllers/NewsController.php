<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\Meta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $compact = Cache::rememberForever('news_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'haberler')->first()->translate(app()->getLocale());
            $categories = NewsCategory::withTranslation(app()->getLocale())->get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('news.index');

            return [
                "meta" => $meta,
                "breadcrumbs" => $breadcrumbs,
                "categories" => $categories
            ];
        });
        $news = News::withTranslation(app()->getLocale())->when($request->category, function($query) use ($request){
            $query->where('category_id', $request->category);
        })
        ->when($request->order, function($query) use ($request){
            switch($request->order){
                case "dateAsc":
                    $query->orderBy('date', 'asc');
                    break;
                case "titleAsc":
                    $query->orderBy('title', 'asc');
                    break;
                case "titleDesc":
                    $query->orderBy('title', 'desc');
                    break;
                case "dateDesc":
                default:
                    $query->orderBy('date', 'desc');
                    break;
            }
        })
        ->when(!$request->order, function($query){
            $query->orderBy('date', 'desc');
        })
        ->paginate(9);

        

        return view('news.index', compact('news'))->with($compact);
    }

    public function show(Request $request)
    {
        $compact = Cache::rememberForever("news_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $item = News::whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());

            $meta = New Meta ;
            
            $meta->meta_title = $item->meta_title;
            $meta->meta_description = $item->meta_description;
            $meta->meta_keyword = $item->meta_keyword;
            $meta->meta_canonical = $item->meta_canonical;
            $meta->meta_ogimage = $item->meta_ogimage;

            $breadcrumbs = Breadcrumbs::generate('news.show', $item);


            return [
                "item" => $item,
                "breadcrumbs" => $breadcrumbs,
                "meta" => $meta
            ];
        });

        Session::flash('slugObject', $compact["item"]);
        
        return view('news.show')->with($compact);
    }
}
