<?php

namespace App\Observers;

use App\Models\SiteText;
use Illuminate\Support\Facades\Session;

class SiteTextObserver
{
    /**
     * Handle the SiteText "created" event.
     *
     * @param  \App\Models\SiteText  $siteText
     * @return void
     */
    public function created(SiteText $siteText)
    {
        Session::forget('siteTexts');
    }

    /**
     * Handle the SiteText "updated" event.
     *
     * @param  \App\Models\SiteText  $siteText
     * @return void
     */
    public function updated(SiteText $siteText)
    {
        Session::forget('siteTexts');
    }

    /**
     * Handle the SiteText "deleted" event.
     *
     * @param  \App\Models\SiteText  $siteText
     * @return void
     */
    public function deleted(SiteText $siteText)
    {
        Session::forget('siteTexts');
    }

    /**
     * Handle the SiteText "restored" event.
     *
     * @param  \App\Models\SiteText  $siteText
     * @return void
     */
    public function restored(SiteText $siteText)
    {
        //
    }

    /**
     * Handle the SiteText "force deleted" event.
     *
     * @param  \App\Models\SiteText  $siteText
     * @return void
     */
    public function forceDeleted(SiteText $siteText)
    {
        //
    }
}
