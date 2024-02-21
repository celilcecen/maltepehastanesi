<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use App\SearchResult;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = collect();
        $search = $request->search;

        if ($search){
        $staticPages = $this->getSearchResults($search, 'App\\Models\\StaticPage', ['title', 'content']);

        foreach($staticPages as $page){
            $res = new SearchResult();
            $res->category = text('DataPrivacy');
            $res->title = $page->title;
            $res->link = localeRoute('staticPage', ["slug" => $page->slug]);

            $results->push($res);
        }

        $blogs = $this->getSearchResults($search, 'App\\Models\\Blog', ['title' ,'brief' ,'content']);

        foreach($blogs as $item){
            $res = new SearchResult();
            $res->category = text('blogs');
            $res->title = $item->title;
            $res->link = localeRoute('blogs.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $checkup_typs = $this->getSearchResults($search, 'App\\Models\\CheckupType', ['title' ,'brief']);

        foreach($checkup_typs as $item){
            $res = new SearchResult();
            $res->category = text('checkups');
            $res->title = $item->title;
            $res->link = localeRoute('checkups.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $corporate_pages = $this->getSearchResults($search, 'App\\Models\\CorporatePage', ['title' ,'content']);

        foreach($corporate_pages as $item){
            $res = new SearchResult();
            $res->category = text('CorporatePage');
            $res->title = $item->title;
            $res->link = localeRoute('kurumsal.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $doctors = $this->getSearchResults($search, 'App\\Models\\Doctor', ['name' ,'title' ,'phone' , 'email' ,'education']);

        foreach($doctors as $item){
            $res = new SearchResult();
            $res->category = text('doctor');
            $res->title = $item->name;
            $res->link = localeRoute('doctors.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $units = $this->getSearchResults($search, 'App\\Models\\MedicalUnit', ['title' ,'content']);

        foreach($units as $item){
            $res = new SearchResult();
            $res->category = text('MedicalUnit');
            $res->title = $item->title;
            $res->link = localeRoute('medicalUnits.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $news = $this->getSearchResults($search, 'App\\Models\\News', ['title' ,'brief' ,'content1','content2']);

        foreach($news as $item){
            $res = new SearchResult();
            $res->category = text('news');
            $res->title = $item->title;
            $res->link = localeRoute('news.show', ["slug" => $item->slug]);

            $results->push($res);
        }

        $stories = $this->getSearchResults($search, 'App\\Models\\Story', ['user_name' ,'title','content']);

        foreach($stories as $item){
            $res = new SearchResult();
            $res->category = text('stories');
            $res->title = $item->title;
            $res->link = localeRoute('stories', ["slug" => $item->slug]);

            $results->push($res);
        }

        $homeServices = $this->getSearchResults($search, 'App\\Models\\HomeService', ['title' ,'content']);

        foreach($homeServices as $item){
            $res = new SearchResult();
            $res->category = text('HomeServices');
            $res->title = $item->title;
            $res->link = localeRoute('healthAtHome', ["slug" => $item->slug]);

            $results->push($res);
        }

        $patientsGuides = $this->getSearchResults($search, 'App\\Models\\PatientGuide', ['title' ,'content']);

        foreach($patientsGuides as $item){
            $res = new SearchResult();
            $res->category = text('PatientGuide');
            $res->title = $item->title;
            $res->link = localeRoute('patients.guide', ["slug" => $item->slug]);

            $results->push($res);
        }
    }

        
    //  dd($results);
        return view('searchResult', compact('results','search'));
    }

    public function getSearchResults($search, $model, $fields = []){
        $lang = app()->getLocale();
        $res = $model::query()->where('id', 0);
        foreach($fields as $field){
            if($lang == config('voyager.multilingual.default')) 
                $res->orWhere($field, 'like', "%$search%");
            else
                $res->orWhere(function ($query) use ($search, $field) {
                    $query->whereTranslation($field, 'like', "%$search%", [app()->getLocale()], false);
                });
        }
        $res = $res->get()->translate(app()->getLocale());

        return $res;
    }
}
