<?php

namespace App\Observers;

use App\Models\CheckupType;

class CheckupTypeObserver
{
    /**
     * Handle the CheckupType "created" event.
     *
     * @param  \App\Models\CheckupType  $checkupType
     * @return void
     */
    public function creating(CheckupType $type)
    {
        $slug = $type->slug;
        $duplicatedSlug = CheckupType::where('slug', $slug)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $type->slug . '-' . $counter;
            $duplicatedSlug = CheckupType::where('slug', $slug)->select('id')->first();
        }

        $type->slug = $slug;
    }

    /**
     * Handle the CheckupType "updated" event.
     *
     * @param  \App\Models\CheckupType  $type
     * @return void
     */
    public function updating(CheckupType $type)
    {
        if(!$type->isDirty('slug')) return;
        $slug = $type->slug;
        $duplicatedSlug = CheckupType::where('slug', $slug)->where('id', '!=', $type->id)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $type->slug . '-' . $counter;
            $duplicatedSlug = CheckupType::where('slug', $slug)->where('id', '!=', $type->id)->select('id')->first();
        }
 
        $type->slug = $slug;
    }

    /**
     * Handle the CheckupType "deleted" event.
     *
     * @param  \App\Models\CheckupType  $checkupType
     * @return void
     */
    public function deleted(CheckupType $checkupType)
    {
        //
    }

    /**
     * Handle the CheckupType "restored" event.
     *
     * @param  \App\Models\CheckupType  $checkupType
     * @return void
     */
    public function restored(CheckupType $checkupType)
    {
        //
    }

    /**
     * Handle the CheckupType "force deleted" event.
     *
     * @param  \App\Models\CheckupType  $checkupType
     * @return void
     */
    public function forceDeleted(CheckupType $checkupType)
    {
        //
    }
}
