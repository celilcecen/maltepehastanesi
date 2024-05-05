<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Meta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    public function index(Request $request, $slug = null){

        if (is_null($slug)) {

            $allBlogs = Blog::withTranslation(app()->getLocale())
                ->with(['author' => function ($query) {
                    $query->withTranslation(app()->getLocale());
                }, 'categories'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->translate(app()->getLocale());

            $sortedBlogs = $allBlogs->sort(function ($a, $b) {
                $collator = collator_create('tr_TR');
                return collator_compare($collator, $a->title, $b->title);
            });

            $blogs = $sortedBlogs->groupBy(function($item) {
                return mb_strtoupper(mb_substr($item->title, 0, 1, 'UTF-8'), 'UTF-8');
            });

            $categories = BlogCategory::get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('blogs.index');

            return view('blogs.index', compact('allBlogs', 'categories', 'breadcrumbs'));

        } else {

            $category = BlogCategory::where('slug', $slug)->firstOrFail();

            $meta = New Meta ;

            $meta->meta_title = $category->meta_title;
            $meta->meta_description = $category->meta_description;
            $meta->meta_keyword = $category->meta_keyword;
            $meta->meta_canonical = $category->meta_canonical;
            $meta->meta_ogimage = $category->meta_ogimage;

            $allBlogs = Blog::whereHas('categories', function ($query) use ($category) {
                $query->where('blog_categories.id', $category->id);
            })
                ->withTranslation(app()->getLocale())
                ->with(['author' => function ($query) {
                    $query->withTranslation(app()->getLocale());
                }, 'categories'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->translate(app()->getLocale());

            $sortedBlogs = $allBlogs->sort(function ($a, $b) {
                $collator = collator_create('tr_TR');
                return collator_compare($collator, $a->title, $b->title);
            });

            $blogs = $sortedBlogs->groupBy(function($item) {
                return mb_strtoupper(mb_substr($item->title, 0, 1, 'UTF-8'), 'UTF-8');
            });

            $breadcrumbs = Breadcrumbs::generate('blogs.index');

            return view('blogs.indexx', compact('allBlogs', 'category', 'breadcrumbs', 'meta'));

        }
    }


    public function show(Request $request)
    {
        $compact = Cache::rememberForever("blogs_show_{$request->slug}_".app()->getLocale(), function() use ($request){
            $blog = Blog::with(['author', 'categories','comments'])->whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail()->translate(app()->getLocale());
            $prevBlog = Blog::withTranslations(app()->getLocale())->where('created_at', '<', $blog->created_at)->orderBy('created_at', 'desc')->first();
            $nextBlog = Blog::withTranslations(app()->getLocale())->where('created_at', '>', $blog->created_at)->orderBy('created_at', 'asc')->first();
            $breadcrumbs = Breadcrumbs::generate('blogs.show', $blog);
            $meta = New Meta ;

            $meta->meta_title = $blog->meta_title;
            $meta->meta_description = $blog->meta_description;
            $meta->meta_keyword = $blog->meta_keyword;
            $meta->meta_canonical = $blog->meta_canonical;
            $meta->meta_ogimage = $blog->meta_ogimage;

            return [
                "blog" => $blog,
                "prevBlog" => $prevBlog,
                "nextBlog" => $nextBlog,
                "breadcrumbs" => $breadcrumbs,
                "meta" => $meta
            ];
        });

        $compact["latest_blogs"] = Cache::rememberForever('latest_blogs_'.app()->getLocale(), function(){
            $latest_blogs = Blog::withTranslation(app()->getLocale())->with(['author', 'categories'])->orderByDesc('date')->take(5)->get()->translate(app()->getLocale());

            return $latest_blogs;
        });

        Session::flash('slugObject', $compact["blog"]);

        $shareBtns = [];
        foreach($compact["latest_blogs"] as $blog){
            $shareBtns[$blog->id] = \Share::page(
                localeRoute('blogs.show', $blog->slug),
                'Share this ....'
            )
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp()
                ->reddit()
                ->pinterest()
                ->telegram();
        }
        // dd($blog->comments);
        return view('blogs.show',compact('shareBtns'))->with($compact);
    }

}
