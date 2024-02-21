<?php

namespace App\Widgets;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\DoctorQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class DoctorQuestionDimmer extends BaseDimmer
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
        $count = DoctorQuestion::count();
        $string = "Doktor Sorusu";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-edit',
            'title'  => "{$count} {$string}",
            'text'   => "",
            'button' => [
                'text' => "Tüm Doktor Soruları Görüntüle",
                'link' => route('voyager.doctor-questions.index'),
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
