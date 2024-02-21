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

    public function index(Request $request){

   /* //    dd($request->slug);
        $compact = Cache::rememberForever('blogs_index_'.app()->getLocale(), function(){
            $meta = Meta::where('page_name', 'makaleler')->first()->translate(app()->getLocale());
            
            $featured_blogs = Blog::withTranslation(app()->getLocale())->where('is_featured', 1)->orderByDesc('date')->get()->translate(app()->getLocale());
            $categories = BlogCategory::get()->translate(app()->getLocale());
            $breadcrumbs = Breadcrumbs::generate('blogs.index');

            // dd($breadcrumbs);
            return [
                "meta" => $meta,
                "featured_blogs" => $featured_blogs,
                "breadcrumbs" => $breadcrumbs,
                "categories" => $categories ,
            ];
        });

        $compact["latest_blogs"] = Cache::rememberForever('latest_blogs_'.app()->getLocale(), function(){
            $latest_blogs = Blog::withTranslation(app()->getLocale())->with(['author', 'categories'])->orderByDesc('date')->take(5)->get()->translate(app()->getLocale());


            return $latest_blogs;
        });

        $category = null;
        if($request->slug)
            $category = BlogCategory::whereTranslation('slug', '=', $request->slug, [app()->getLocale()], app()->getLocale() == 'tr')->firstOrFail();

        $blogs = Blog::withTranslation(app()->getLocale())->with(['author' => function ($query) {
            $query->withTranslation(app()->getLocale());
        }, 'categories'])

        ->when($request->slug, function($query) use($request, $category){
            $query->whereRelation('categories', 'blog_categories.id', $category->id);
        })
        ->when($request->unit, function($query) use($request){
            $query->whereRelation('units', 'medical_units.id', $request->unit);
        })
        ->when($request->search, function($query) use($request){
            $query->whereTranslation('title', 'like', "%$request->search%")
                  ->orWhere(function ($query2) use($request){
                    $query2->whereTranslation('content', 'like', "%$request->search%");
                  })
                  ->orWhere(function ($query2) use($request){
                    $query2->whereTranslation('brief', 'like', "%$request->search%");
                  });

        })
        ->orderByDesc('date')->paginate(6);

        $shareBtns = [];
        foreach($compact["latest_blogs"] as $blog){
            $shareBtns[$blog->id] = \Share::page(
                localeRoute('blogs.show', $blog->slug),
                $blog->title
            )
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp()
                ->reddit()
                ->pinterest()
                ->telegram();
        }
        // dd($shareBtns) ;
        if($category)
            Session::flash('slugObject', $category);
        

        return view('blogs.index',compact('blogs','shareBtns'))->with($compact);*/
      
      
      $blogs = Cache::rememberForever('blogs_index_'.app()->getLocale(), function() {
    $allBlogs = Blog::withTranslation(app()->getLocale())
                    ->with(['author' => function ($query) {
                        $query->withTranslation(app()->getLocale());
                    }, 'categories'])
                    ->get()
                    ->translate(app()->getLocale());

    // Türkçe karakterleri dikkate alan özel sıralama
    $sortedBlogs = $allBlogs->sort(function ($a, $b) {
        $collator = collator_create('tr_TR');
        return collator_compare($collator, $a->title, $b->title);
    });

    // Başlığın ilk harfine göre gruplama
    return $sortedBlogs->groupBy(function($item) {
        return mb_strtoupper(mb_substr($item->title, 0, 1, 'UTF-8'), 'UTF-8');
    });
});

  
  
    // Kategori ve diğer verileri hazırla
    $categories = BlogCategory::get()->translate(app()->getLocale());
    $breadcrumbs = Breadcrumbs::generate('blogs.index'); 

  
  
    // Verileri görünüme gönder
    return view('blogs.index', compact('blogs', 'categories', 'breadcrumbs')); 
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
