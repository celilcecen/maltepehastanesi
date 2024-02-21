<?php

namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
        $slug = $blog->slug;
        $duplicatedSlug = Blog::where('slug', $slug)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $blog->slug . '-' . $counter;
            $duplicatedSlug = Blog::where('slug', $slug)->select('id')->first();
        }

        $blog->slug = $slug;
    }

    /**
     * Handle the Blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updating(Blog $blog)
    {
        if(!$blog->isDirty('slug')) return;
        $slug = $blog->slug;
        $duplicatedSlug = Blog::where('slug', $slug)->where('id', '!=', $blog->id)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $blog->slug . '-' . $counter;
            $duplicatedSlug = Blog::where('slug', $slug)->where('id', '!=', $blog->id)->select('id')->first();
        }
 
        $blog->slug = $slug;
    }

    /**
     * Handle the Blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
