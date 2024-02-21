<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BultenController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\ContactOrderController;
use App\Http\Controllers\CorporatePageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MedicalUnitController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\WishingMessageController;
use App\Models\ContactOrder;
use App\Models\Language;
use App\Models\RedirectLink;
use App\Models\SiteText;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/robots', [AdminController::class, 'robots'])->name('robots.index');
    Route::post('/robots', [AdminController::class, 'robotsStore'])->name('robots.store');
    Route::post('/regenerateSitemap', [AdminController::class, 'regenerateSitemap'])->name('regenerateSitemap');
    Route::post('/refreshRouteCache', [AdminController::class, 'refreshRouteCache'])->name('refreshRouteCache');

    Route::post('/setLastLang', function(Request $request) {
        $lastLang = $request->lastLang;
        session()->put('lastLang', $lastLang);
        return response('done', 200);
    })->name('setLastLang');
});

foreach(RedirectLink::all() as $link){
    Route::redirect($link->source, $link->target, 301);
}

$translations = SiteText::all();

// ttl = 24 hours
Route::group(['middleware'=>['locale', 'ttl:8640']], function () use($translations){
    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    foreach(Language::all() as $lang){
        $langTranslations = $translations->translate($lang->code);
        Route::group(['prefix' => $lang->code], function () use ($lang, $langTranslations){

            Route::get('/', [HomeController::class, 'index'])->name($lang->code.'.homepage');
            
            Route::get('/'.transRoute('routeNews', $langTranslations).'', [NewsController::class, 'index'])->name($lang->code.'.news.index');
            Route::get('/'.transRoute('routeDetails', $langTranslations).'/{slug}', [NewsController::class, 'show'])->name($lang->code.'.news.show');
        
            Route::get('/'.transRoute('routeMedicalUnits', $langTranslations).'', [MedicalUnitController::class, 'index'])->name($lang->code.'.medicalUnits.index');
            Route::get('/'.transRoute('routeMedicalUnits', $langTranslations).'/{slug}', [MedicalUnitController::class, 'show'])->name($lang->code.'.medicalUnits.show');
        
            Route::get('/'.transRoute('routeDoctors', $langTranslations).'', [DoctorController::class, 'index'])->name($lang->code.'.doctors.index');
            Route::get('/'.transRoute('routeDoctorDetails', $langTranslations).'/{slug}', [DoctorController::class, 'show'])->name($lang->code.'.doctors.show');
            
            Route::get('/'.transRoute('routeOnlineAppointment', $langTranslations).'', [HomeController::class, 'appointment'])->name($lang->code.'.appointment');
            Route::get('/'.transRoute('routeEResult', $langTranslations).'', [HomeController::class, 'eResult'])->name($lang->code.'.eResult');
            
            Route::get('/'.transRoute('routeHomeHealth', $langTranslations).'', [HomeController::class, 'healthAtHome'])->name($lang->code.'.healthAtHome');
            Route::get('/'.transRoute('routeAskForPrice', $langTranslations).'', [HomeController::class, 'askForPrice'])->name($lang->code.'.askForPrice');
        
            Route::get('/'.transRoute('routeContact', $langTranslations).'', [HomeController::class, 'contactUs'])->name($lang->code.'.contactUs');
        
            Route::get('/'.transRoute('routeBlogDetails', $langTranslations).'/{slug}', [BlogController::class, 'show'])->name($lang->code.'.blogs.show');
            Route::get('/'.transRoute('routeBlog', $langTranslations).'/{slug?}', [BlogController::class, 'index'])->name($lang->code.'.blogs.index');

            Route::get('/'.transRoute('routeCampaignDetails', $langTranslations).'/{slug}', [CampaignController::class, 'show'])->name($lang->code.'.campaigns.show');
            Route::get('/'.transRoute('routeCampaign', $langTranslations).'/{slug?}', [CampaignController::class, 'index'])->name($lang->code.'.campaigns.index');
        
            Route::get('/'.transRoute('routePatientGuide', $langTranslations).'', [HomeController::class, 'patientGuide'])->name($lang->code.'.patients.guide');
        
            Route::get('/'.transRoute('routeQualityCertificates', $langTranslations).'', [HomeController::class, 'qualityCertificate'])->name($lang->code.'.kurumsal.qualityCertificate');
        
            Route::get('/'.transRoute('routeAboutUs', $langTranslations).'', [HomeController::class, 'institutional'])->name($lang->code.'.kurumsal.aboutUs');
        
            Route::get('/'.transRoute('routeVision', $langTranslations).'', [HomeController::class, 'visiontext'])->name($lang->code.'.kurumsal.vision');
        
            Route::get('/'.transRoute('routeCheckup', $langTranslations).'', [CheckupController::class, 'index'])->name($lang->code.'.checkups.index');
            Route::get('/'.transRoute('routeCheckup', $langTranslations).'/{slug}', [CheckupController::class, 'show'])->name($lang->code.'.checkups.show');
        
            Route::get('/'.transRoute('routePatientStory', $langTranslations).'', [HomeController::class, 'stories'])->name($lang->code.'.stories');
        
            Route::post('/'.transRoute('routePatientStory', $langTranslations).'', [StoryController::class, 'store'])->name($lang->code.'.story.store');
        
            Route::post('/'.transRoute('routeContact', $langTranslations).'', [ContactOrderController::class, 'store'])->name($lang->code.'.ContactOrder.store');
        
            Route::post('/'.transRoute('routeGetWell', $langTranslations).'', [WishingMessageController::class, 'store'])->name($lang->code.'.WishingMessage.store');
        
            Route::get('/'.transRoute('routePage', $langTranslations).'/{slug}', [StaticPageController::class, 'index'])->name($lang->code.'.staticPage');
        
            Route::post('/'.transRoute('routeBulten', $langTranslations).'', [BultenController::class, 'store'])->name($lang->code.'.Bulten.store');
        
            Route::post('/'.transRoute('routeAskForPrice', $langTranslations).'', [QuestionController::class, 'store'])->name($lang->code.'.Question.store');
        
            Route::get('/'.transRoute('routeHR', $langTranslations).'', [HomeController::class, 'HumanResources'])->name($lang->code.'.kurumsal.HumanResources');
            
            Route::post('/'.transRoute('routeHR', $langTranslations).'', [JobApplicationController::class, 'store'])->name($lang->code.'.JobApplication.store');
        
            Route::post('/'.transRoute('routeMedicalUnits', $langTranslations).'', [DoctorQuestionController::class, 'store'])->name($lang->code.'.DoctorQuestion.store');
        
            Route::post('/'.transRoute('routeCheckup', $langTranslations).'', [AppointmentController::class, 'store'])->name($lang->code.'.Appointment.store');
        
            Route::get('/'.transRoute('routeKurumsal', $langTranslations).'/{slug}', [CorporatePageController::class, 'show'])->name($lang->code.'.kurumsal.show');
            
            
            Route::post('/'.transRoute('routeSuggestion', $langTranslations).'', [SuggestionController::class, 'store'])->name($lang->code.'.Suggestion.store');
            
            Route::get('/'.transRoute('routeSearch', $langTranslations).'', [SearchController::class, 'search'])->name($lang->code.'.searchResult');
            
            Route::get('/'.transRoute('routeAuthor', $langTranslations).'/{slug}', [AuthorController::class, 'show'])->name($lang->code.'.author.show');

            Route::get('/pharmacy', [HomeController::class, 'pharmacy'])->name($lang->code.'.pharmacy');
        });
    }


});