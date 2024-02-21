<?php

namespace App\Observers;

use App\Models\RedirectLink;
use Illuminate\Support\Facades\Artisan;

class RedirectLinkObserver
{
    public $afterCommit = true;
    /**
     * Handle the RedirectLink "created" event.
     *
     * @param  \App\Models\RedirectLink  $redirectLink
     * @return void
     */
    public function created(RedirectLink $redirectLink)
    {
        Artisan::call('route:clear');
    }

    /**
     * Handle the RedirectLink "updated" event.
     *
     * @param  \App\Models\RedirectLink  $redirectLink
     * @return void
     */
    public function updated(RedirectLink $redirectLink)
    {
        Artisan::call('route:clear');
    }

    /**
     * Handle the RedirectLink "deleted" event.
     *
     * @param  \App\Models\RedirectLink  $redirectLink
     * @return void
     */
    public function deleted(RedirectLink $redirectLink)
    {
        Artisan::call('route:clear');
    }

    /**
     * Handle the RedirectLink "restored" event.
     *
     * @param  \App\Models\RedirectLink  $redirectLink
     * @return void
     */
    public function restored(RedirectLink $redirectLink)
    {
        //
    }

    /**
     * Handle the RedirectLink "force deleted" event.
     *
     * @param  \App\Models\RedirectLink  $redirectLink
     * @return void
     */
    public function forceDeleted(RedirectLink $redirectLink)
    {
        //
    }
}
