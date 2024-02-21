<?php

namespace App\Observers;

use App\Models\Story;
use Illuminate\Support\Facades\Cache;

class StoryObserver
{
    /**
     * Handle the Story "created" event.
     *
     * @param  \App\Models\Story  $story
     * @return void
     */
    public function created(Story $story)
    {
        //
    }

    /**
     * Handle the Story "updated" event.
     *
     * @param  \App\Models\Story  $story
     * @return void
     */
    public function updated(Story $story)
    {
        Cache::flush();
    }

    /**
     * Handle the Story "deleted" event.
     *
     * @param  \App\Models\Story  $story
     * @return void
     */
    public function deleted(Story $story)
    {
        Cache::flush();
    }

    /**
     * Handle the Story "restored" event.
     *
     * @param  \App\Models\Story  $story
     * @return void
     */
    public function restored(Story $story)
    {
        //
    }

    /**
     * Handle the Story "force deleted" event.
     *
     * @param  \App\Models\Story  $story
     * @return void
     */
    public function forceDeleted(Story $story)
    {
        //
    }
}
