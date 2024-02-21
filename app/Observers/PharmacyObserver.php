<?php

namespace App\Observers;

use App\Models\Pharmacy;
use Illuminate\Support\Facades\Cache;

class PharmacyObserver
{
    /**
     * Handle the Pharmacy "created" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function created(Pharmacy $pharmacy)
    {
        Cache::forget('pharmacies');
    }

    /**
     * Handle the Pharmacy "updated" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function updated(Pharmacy $pharmacy)
    {
        Cache::forget('pharmacies');
    }

    /**
     * Handle the Pharmacy "deleted" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function deleted(Pharmacy $pharmacy)
    {
        Cache::forget('pharmacies');
    }

    /**
     * Handle the Pharmacy "restored" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function restored(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Handle the Pharmacy "force deleted" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function forceDeleted(Pharmacy $pharmacy)
    {
        //
    }
}
