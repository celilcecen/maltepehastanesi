<?php

namespace App\Observers;

use App\Models\Doctor;

class DoctorObserver
{
    /**
     * Handle the Doctor "created" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function creating(Doctor $doctor)
    {
        $slug = $doctor->slug;
        $duplicatedSlug = Doctor::where('slug', $slug)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $doctor->slug . '-' . $counter;
            $duplicatedSlug = Doctor::where('slug', $slug)->select('id')->first();
        }

        $doctor->slug = $slug;
    }

    /**
     * Handle the Doctor "updated" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function updating(Doctor $doctor)
    {
        if(!$doctor->isDirty('slug')) return;
        $slug = $doctor->slug;
        $duplicatedSlug = Doctor::where('slug', $slug)->where('id', '!=', $doctor->id)->select('id')->first();
        $counter = 1;
        while($duplicatedSlug){
            $counter++;
            $slug = $doctor->slug . '-' . $counter;
            $duplicatedSlug = Doctor::where('slug', $slug)->where('id', '!=', $doctor->id)->select('id')->first();
        }
 
        $doctor->slug = $slug;
    }

    /**
     * Handle the Doctor "deleted" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function deleted(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "restored" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function restored(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "force deleted" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }
}
