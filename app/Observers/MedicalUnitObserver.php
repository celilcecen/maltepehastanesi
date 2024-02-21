<?php

namespace App\Observers;

use App\Models\MedicalUnit;

class MedicalUnitObserver
{
    /**
     * Handle the MedicalUnit "created" event.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return void
     */
    public function creating(MedicalUnit $unit)
    {
        $slug = $unit->slug;
        $duplicatedSlug = MedicalUnit::where('slug', $slug)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $unit->slug . '-' . $counter;
            $duplicatedSlug = MedicalUnit::where('slug', $slug)->select('id')->first();
        }

        $unit->slug = $slug;
    }

    /**
     * Handle the MedicalUnit "updated" event.
     *
     * @param  \App\Models\MedicalUnit  $unit
     * @return void
     */
    public function updating(MedicalUnit $unit)
    {
        if(!$unit->isDirty('slug')) return;
        $slug = $unit->slug;
        $duplicatedSlug = MedicalUnit::where('slug', $slug)->where('id', '!=', $unit->id)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $unit->slug . '-' . $counter;
            $duplicatedSlug = MedicalUnit::where('slug', $slug)->where('id', '!=', $unit->id)->select('id')->first();
        }
 
        $unit->slug = $slug;
    }

    /**
     * Handle the MedicalUnit "deleted" event.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return void
     */
    public function deleted(MedicalUnit $medicalUnit)
    {
        //
    }

    /**
     * Handle the MedicalUnit "restored" event.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return void
     */
    public function restored(MedicalUnit $medicalUnit)
    {
        //
    }

    /**
     * Handle the MedicalUnit "force deleted" event.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return void
     */
    public function forceDeleted(MedicalUnit $medicalUnit)
    {
        //
    }
}
