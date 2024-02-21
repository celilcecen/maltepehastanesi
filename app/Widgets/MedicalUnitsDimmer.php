<?php

namespace App\Widgets;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\MedicalUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class MedicalUnitsDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = MedicalUnit::count();
        $string = "Tıbbi Birim";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-lab',
            'title'  => "{$count} {$string}",
            'text'   => "",
            'button' => [
                'text' => "Tüm Tıbbi Birimleri Görüntüle",
                'link' => route('voyager.medical-units.index'),
            ],
            'image' => asset('img/slider.png'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
    }
}
