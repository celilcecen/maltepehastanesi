<?php

namespace App\Observers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheObserver
{
    public function created($item)
    {
        Cache::flush();
        Artisan::call('httpcache:clear');
    }

    /**
     * Handle the Blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updated($item)
    {
        Cache::flush();
        Artisan::call('httpcache:clear');
    }

    /**
     * Handle the Blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function deleted($item)
    {
        Cache::flush();
        Artisan::call('httpcache:clear');
    }
}
