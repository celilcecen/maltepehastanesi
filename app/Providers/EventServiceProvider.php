<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\CheckupType;
use App\Models\Doctor;
use App\Models\MedicalUnit;
use App\Models\News;
use App\Models\RedirectLink;
use App\Models\SiteText;
use App\Models\Author;
use App\Models\BlogCategory;
use App\Models\Branch;
use App\Models\Campaign;
use App\Models\Certificate;
use App\Models\CheckupGroup;
use App\Models\CheckupItem;
use App\Models\ContactUs;
use App\Models\ContactUsLocation;
use App\Models\CorporatePage;
use App\Models\CoverImage;
use App\Models\FooterLogo;
use App\Models\HeaderCorporateLink;
use App\Models\HomeHealth;
use App\Models\HomeService;
use App\Models\Institutional;
use App\Models\InsuranceCompany;
use App\Models\Language;
use App\Models\Meta;
use App\Models\NavbarMessage;
use App\Models\NewsCategory;
use App\Models\PatientGuide;
use App\Models\Pharmacy;
use App\Models\SEO;
use App\Models\SlideShow;
use App\Models\StaticPage;
use App\Models\Story;
use App\Models\Subject;
use App\Models\VisionText;
use App\Observers\BlogObserver;
use App\Observers\CacheObserver;
use App\Observers\CheckupTypeObserver;
use App\Observers\DoctorObserver;
use App\Observers\MedicalUnitObserver;
use App\Observers\NewsObserver;
use App\Observers\PharmacyObserver;
use App\Observers\RedirectLinkObserver;
use App\Observers\SiteTextObserver;
use App\Observers\StoryObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use TCG\Voyager\Models\Translation;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        News::observe(NewsObserver::class);
        MedicalUnit::observe(MedicalUnitObserver::class);
        Doctor::observe(DoctorObserver::class);
        CheckupType::observe(CheckupTypeObserver::class);
        Blog::observe(BlogObserver::class);
        // RedirectLink::observe(RedirectLinkObserver::class);

        SiteText::observe(SiteTextObserver::class);

        Pharmacy::observe(PharmacyObserver::class);
        // Story::observe(StoryObserver::class);

        SiteText::observe(CacheObserver::class);

        Author::observe(CacheObserver::class);
        Blog::observe(CacheObserver::class);
        BlogCategory::observe(CacheObserver::class);
        Branch::observe(CacheObserver::class);
        // Certificate::observe(CacheObserver::class);
        Campaign::observe(CacheObserver::class);
        CheckupGroup::observe(CacheObserver::class);
        CheckupItem::observe(CacheObserver::class);
        CheckupType::observe(CacheObserver::class);
        ContactUs::observe(CacheObserver::class);
        ContactUsLocation::observe(CacheObserver::class);
        CorporatePage::observe(CacheObserver::class);
        CoverImage::observe(CacheObserver::class);
        Doctor::observe(CacheObserver::class);
        FooterLogo::observe(CacheObserver::class);
        HeaderCorporateLink::observe(CacheObserver::class);
        HomeHealth::observe(CacheObserver::class);
        HomeService::observe(CacheObserver::class);
        Institutional::observe(CacheObserver::class);
        InsuranceCompany::observe(CacheObserver::class);
        Language::observe(CacheObserver::class);
        MedicalUnit::observe(CacheObserver::class);
        Meta::observe(CacheObserver::class);
        NavbarMessage::observe(CacheObserver::class);
        News::observe(CacheObserver::class);
        NewsCategory::observe(CacheObserver::class);
        PatientGuide::observe(CacheObserver::class);
        SEO::observe(CacheObserver::class);
        SiteText::observe(CacheObserver::class);
        SlideShow::observe(CacheObserver::class);
        StaticPage::observe(CacheObserver::class);
        Subject::observe(CacheObserver::class);
        Translation::observe(CacheObserver::class);
        VisionText::observe(CacheObserver::class);
    }
}
