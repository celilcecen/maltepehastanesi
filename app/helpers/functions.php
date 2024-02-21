<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

function formatDate($date, $bigDate = false)
{
    if($bigDate)
        return Carbon\Carbon::parse($date)->translatedFormat('d F Y');
    else
        return Carbon\Carbon::parse($date)->translatedFormat('d.m.Y');
}

function parse_file($fileSerializedObject, $fileName = false): string
{
    $fileObj = json_decode($fileSerializedObject);
    if ($fileObj) {
        if($fileName)
            return $fileObj[0]->original_name;
        else
            return '/storage/' . str_replace('\\', '/', $fileObj[0]->download_link);
    }
    return '';
}

function text($key){
    $texts = Session::get('siteTexts');
    
    return isset($texts[$key]) ? nl2br($texts[$key]) : $key;
}

function localeRoute($name, $params = array()){
    if($name == "homepage" && app()->getLocale() == "tr")
        return route($name, $params);

    // if(!is_array($params))
    //     $params = ["locale" => app()->getLocale(), $params];
    // else
    //     $params["locale"] = app()->getLocale();
    
    $name = app()->getLocale() . "." . $name;

    return route($name, $params);
}

function getLangLink($lang){
    if(!request()->route()) return "";
    $routeName = Route::getCurrentRoute()->getName();
    $params = request()->route()->parameters;
    if(isset($params["slug"]) && Session::has('slugObject')){
        $params["slug"] = Session::get('slugObject')->translate($lang)->slug;
    }
    if($routeName == "homepage")
        $routeName = "$lang.$routeName";
    else{
        $routeName = $lang. substr($routeName, 2);
    }
    return route($routeName, $params);
}

function transRoute($key, $translations){
    $trans = $translations->where('key', $key)->first();
    if(!$trans) return $key;
    return $trans->content;
}

function sortTurkishLetters($a, $b) {
    static $charOrder = array('a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş','t', 'u', 'ü', 'v', 'y', 'z');

    $a = mb_strtolower($a);
    $b = mb_strtolower($b);

    for($i=0;$i<mb_strlen($a) && $i<mb_strlen($b);$i++) {
        $chA = mb_substr($a, $i, 1);
        $chB = mb_substr($b, $i, 1);
        $valA = array_search($chA, $charOrder);
        $valB = array_search($chB, $charOrder);
        if($valA == $valB) continue;
        if($valA > $valB) return 1;
        return -1;
    }

    if(mb_strlen($a) == mb_strlen($b)) return 0;
    if(mb_strlen($a) > mb_strlen($b))  return -1;
    return 1;

}

function tr_strtoupper($text)
{
    $search=array("ç","i","ı","ğ","ö","ş","ü");
    $replace=array("Ç","İ","I","Ğ","Ö","Ş","Ü");
    $text=str_replace($search,$replace,$text);
    $text=strtoupper($text);
    $text=str_replace("Ì","Ü",$text);
    return $text;
}

function tr_strtolower($text)
{
    $str = str_replace(['i', 'I'], ['İ', 'ı'], $text);
    $str = mb_convert_case($str, MB_CASE_LOWER);

    return str_replace('i̇', 'i', $str);
}