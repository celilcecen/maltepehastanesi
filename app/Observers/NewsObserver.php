<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function creating(News $news)
    {
        $slug = $news->slug;
        $duplicatedSlug = News::where('slug', $slug)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $news->slug . '-' . $counter;
            $duplicatedSlug = News::where('slug', $slug)->select('id')->first();
        }

        $news->slug = $slug;
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updating(News $news)
    {
        if(!$news->isDirty('slug')) return;
        $slug = $news->slug;
        $duplicatedSlug = News::where('slug', $slug)->where('id', '!=', $news->id)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $news->slug . '-' . $counter;
            $duplicatedSlug = News::where('slug', $slug)->where('id', '!=', $news->id)->select('id')->first();
        }
 
        $news->slug = $slug;
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
