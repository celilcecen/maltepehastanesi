<!DOCTYPE html>
<html @if(app()->getLocale() == 'ar')dir="rtl"@endif lang="{{app()->getLocale()}}">
<head>

   <?php 
      $title = $meta->meta_title ?? $seo->meta_title;
      $description = $meta->meta_description ?? $seo->description;
      $keywords = $meta->meta_keyword ?? $seo->keywords;
      $canonical = $meta->meta_canonical ?? $seo->canonical;
      $ogimage = $meta->meta_ogimage ?? $seo->ogimage;
      $currentLang = $langs->where('code', app()->getLocale())->first();
      $locale = $currentLang ? $currentLang->locale : null;
      $currentURL = Request::getPathInfo();
      $currentRouteName = Route::currentRouteName();
   ?>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
   @if($title)<title>{{$title}}</title>@endif

   {{-- {{dd($seo->meta_title)}} --}}
   <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "DiagnosticLab",
        "name": "{{$seo->meta_title}}",
        "alternateName": "{{$seo->meta_title}}",
        "url": "https://maltepehastanesi.com.tr/",
        "logo": "https://maltepehastanesi.com.tr/storage/contact-us/April2023/ypmicZCnhW4bsxXreJa8.png",
        "sameAs": [
          "{{$contactUs->twitter}}",
          "{{$contactUs->instagram}}",
          "{{$contactUs->youtube}}",
          "{{$contactUs->linkedin}}",
          "{{$contactUs->facebook}}"
        ]
      }
   </script>

   @if(isset($breadcrumbs))
      <script type="application/ld+json">
         {

         "@context": "https://schema.org/",
         "@type": "BreadcrumbList",
         "itemListElement": [
            @foreach($breadcrumbs as $index => $breadcrumb)
                  {
                     "@type": "ListItem",
                     "position": {{ $index + 1 }},
                     "name": "{{ $breadcrumb->title }}",
                     "item": "{{ $breadcrumb->url }}"
                  }{{ $index !== count($breadcrumbs) - 1 ? ',' : '' }}
            @endforeach
         ]
         }
      </script>
   @endif
    
    @yield('schema')
    
    @yield('breadcrumbs')


    @if(isset($robots) && $robots == "noindex")
    <meta name="robots" content="noindex">
    @else
   {!! $seo->meta !!}
   @endif
   @if($description)<meta name="description" content="{{ $description }}">@endif
   @if($keywords)<meta name="keywords" content="{{ $keywords }}">@endif
   @if($canonical)<link rel="canonical" href="{{ $canonical }}" />@endif
   @if($ogimage)<meta property="og:image" content="{{ $ogimage }}" />@endif
   <!-- <meta name="author" content="smartwork.com.tr"> -->
   <meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="300">
	<meta property="og:image:height" content="300">
   @if($title)<meta property="og:title" content="{{$title}}"/>@endif
   @if($locale)<meta property="og:locale" content="{{$locale}}"/>@endif
   <meta property="og:type" content="website"/>
   @if($description)<meta property="og:description" content="{{$description}}"/>@endif
   <meta property="og:url" content="{{request()->url()}}"/>
   @if($seo->site_name)<meta property="og:site_name" content="{{$seo->site_name}}"/>@endif
   <meta name="twitter:card" content="summary_large_image"/>
   @if($title)<meta name="twitter:title" content="{{$title}}"/>@endif
   @if($description)<meta name="twitter:description" content="{{$description}}"/>@endif
   @if($ogimage)<meta name="twitter:image" content="{{$ogimage}}"/>@endif
   @foreach($langs as $lang)
   <link rel="alternate" hreflang="{{$lang->code}}" href="{{getLangLink($lang->code)}}" />
   @endforeach
	<link rel="icon" type="image/png" href="{{asset('img/favicon/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="16x16" href="{{asset('img/favicon/favicon-16x16.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('img/favicon/apple-touch-icon.png')}}">
	<meta name="msapplication-TileImage" content="{{asset('imgs/favicon/apple-touch-icon.png')}}">
   <link rel="stylesheet" href="{{asset('lib/fontawesome-free-6.2.0-web/css/all.min.css')}}">
   <link rel="stylesheet" href="{{asset('lib/bootstrap-5.2.0/css/bootstrap.'.(app()->getLocale() == 'ar' ? 'rtl' : 'min').'.css')}}">
   <link rel="stylesheet" href="{{asset('lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('lib/intl-tel-input-master/build/css/intlTelInput.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/humberger.css')}}">
   <link rel="stylesheet" href="{{asset('lib/animate.css-main/animate.min.css')}}">
   <link rel="stylesheet" href="{{asset('lib/fancybox/dist/jquery.fancybox.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
   {{-- <link href="{{asset('lib/aos-master/dist/aos.css')}}" rel="stylesheet">
   <link href="{{asset('lib/select2-4.1.0-rc.0/dist/css/select2.min.css')}}" rel="stylesheet" /> --}}
   <link href="{{asset('lib/jquery-nice-select-1.1.0/css/nice-select.css')}}" rel="stylesheet" />
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
   {!! $seo->header_bottom !!}
</head>

<body>
   {!! $seo->body_top !!}
    <!-- menu ==---------------------------- -->

    
   <section class="menu-section">
    <div class="row">
       <div class="col-md-4 col-lg-3 col-xl-3 sidebar">
          <div class="content">
             <div class="topsec">
                <div class="close">
                   <button><img class="lazyload" data-class="lazyload" data-src="{{asset('img/icon/close.png')}}" alt=""></button>
                </div>
                <div class="logo">
                   <img class="lazyload" data-class="lazyload" data-src="{{asset('img/logow.png')}}" alt="">
                </div>
                <div class="location">
                   <a href="{{$contactUs->map}}" target="_blank">
                      <div class="icon">
                         <img class="lazyload" data-class="lazyload" data-src="{{asset('img/icon/lokasyon.png')}}" alt="">
                      </div>
                   </a>
                </div>
             </div>
             <div class="centersec">
                <ul>
                   <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <button @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'kurumsal')]) id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#nav1" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{text('institutional')}} <i class="fa-solid chevron-icon"></i></button>
                      <a href="{{localeRoute('medicalUnits.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'medicalUnits')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('ourMedicalUnits')}} <i class="fa-solid chevron-icon"></i></a>
                      <a href="{{localeRoute('doctors.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'doctors')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('ourDoctors')}} <i class="fa-solid chevron-icon"></i></a>
                      <button @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'patients')]) id="v-pills-patients-tab" data-bs-toggle="pill" data-bs-target="#nav2" type="button" role="tab" aria-controls="v-pills-patients" aria-selected="true">{{text('patients')}} <i class="fa-solid chevron-icon"></i></button>
                      <a href="{{localeRoute('checkups.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'checkups')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('checkUpTitle')}} <i class="fa-solid chevron-icon"></i></a>
                      <a href="{{localeRoute('news.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'news')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('news')}} <i class="fa-solid chevron-icon"></i></a>
                      <a href="{{localeRoute('blogs.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'blogs')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('blogs')}} <i class="fa-solid chevron-icon"></i></a>
                      <a href="{{localeRoute('campaigns.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'campaigns')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('campaigns')}} <i class="fa-solid chevron-icon"></i></a>
                      <a href="{{localeRoute('contactUs')}}" @class(["nav-link", "active" => Route::currentRouteName() == 'contactUs']) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('contact')}} <i class="fa-solid chevron-icon"></i></a>
                   </div>


                </ul>
                <ul>
                   @foreach ($pages as $page)
         
                        <li><a href="{{ localeRoute('staticPage', $page->slug) }}">{{ $page->title }}</a></li>
                  @endforeach
                </ul>
             </div>

             <div class="bottomsec">
                <ul>
                   <li class="">
                      <a href="https://randevu.maltepehastanesi.com.tr">
                         <div class="icon">
                            <img class="lazyload" data-src="{{asset('img/icon/date.png')}}" alt="Appointment">
                            <h4>{{text('onlineAppointment')}}</h4>

                         </div>
                      </a>
                   </li>
                   <li class="">
                      <a href="{{localeRoute('eResult')}}">
                         <div class="icon">
                            <img class="lazyload" data-src="{{asset('img/icon/sonuc.png')}}" alt="">
                            <h4>{{text('eResult')}}</h4>

                         </div>
                      </a>
                   </li>
                   <li class="">
                      <a href="{{localeRoute('healthAtHome')}}">
                         <div class="icon">
                            <img class="lazyload" data-src="{{asset('img/icon/evde.png')}}" alt="">
                            <h4>{{text('healthAtHome')}}</h4>

                         </div>
                      </a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
       
       <div class="col-md-8 col-lg-9 col-xl-9 rightbar">
          <div class="rightbar-content">
             <div class="head">
                <div class="row">
                   <div class="left col-md-5 col-xxl-6">
                     <form action="{{ localeRoute('searchResult') }}" method="GET">
                      <div class="search">
                         <div class="icon">
                            <img class="lazyload" data-src="{{asset('img/icon/sm-search.png')}}" alt="">
                         </div>
                         <div class="type">
                            <div class="input-group">
                               <input type="text" name="search" class="form-control" placeholder="{{ text('search') }}">
                            </div>
                         </div>
                         <div class="search-btn">
                            <button><i class="fa-solid arrow-icon"></i></button>
                         </div>
                      </div>
                     </form>
                   </div>
                   <div class="right col-md-7 col-xxl-6">
                      <div class="actions">
                         <ul>
                            <li>
                               <div class="home">
                                  <a href="{{localeRoute('homepage')}}">
                                     <img class="lazyload" data-src="{{asset('img/icon/home.png')}}" alt="">
                                  </a>
                               </div>
                            </li>
                            <li>
                               <div class="dropdown">
                                  <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <div class="icon">
                                        <img class="lazyload" data-src="{{asset('img/icon/world.png')}}" alt="">
                                     </div>
                                     <div class="text">
                                        <h4>{{ text('International_Patients') }}</h4>
                                     </div>
                                     <div class="flag">
                                        <img class="lazyload" data-src="{{asset('img/icon/'.app()->getLocale().'.png')}}" alt="{{app()->getLocale()}} flag">
                                     </div>
                                  </button>
                                  <ul class="dropdown-menu">
                                    @foreach($langs as $lang)
                                     <li><a @class(["dropdown-item", "active" => $lang->code == app()->getLocale()]) href="{{getLangLink($lang->code)}}"><img width="16" class="lazyload" data-src="{{asset('img/icon/'.$lang->code.'.png')}}" alt="{{app()->getLocale()}} flag"> {{$lang->title}}</a></li>
                                     @endforeach
                                  </ul>
                               </div>
                            </li>
                            <li>
                               <div class="lokasyon">
                                  <a href="{{$contactUs->map}}" target="_blank">
                                     <div class="icon">
                                        <img class="lazyload" data-src="{{asset('img/icon/lokasyon.png')}}" alt="">
                                     </div>
                                     {{ text('Hospital_Location') }}
                                  </a>
                               </div>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
             <div class="center">
                <div class="content">
                   <!-- disktop menu ------------------- -->
                   <div class="disktop-menu">
                      <div class="tab-content" id="v-pills-tabContent">
                         <div class="tab-pane fade show {{str_contains(Route::currentRouteName(), 'kurumsal') ? 'active' : ''}}" id="nav1" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <ul class="">
                               
               
                               @foreach ($headerCorporateLinks as $headerCorporateLink)
                               @php($params = $headerCorporateLink->corporatePage ? ["slug" => $headerCorporateLink->corporatePage->translate(app()->getLocale())->slug] : [])
                                  <li><a href="{{ $headerCorporateLink->link ?? localeRoute($headerCorporateLink->route_name,$params) }}" @if($headerCorporateLink->link)target="_blank"@endif>{{ $headerCorporateLink->title }}</a></li>
                               @endforeach

                         </div>
                         <div class="tab-pane fade show {{str_contains(Route::currentRouteName(), 'patients') ? 'active' : ''}}" id="nav2" role="tabpanel" aria-labelledby="v-pills-patients-tab" tabindex="0">
                            <ul class="">
                              <li><a href="{{localeRoute('patients.guide')}}"> {{text('patientGuide')}} </a></li>
                              <li><a href="{{localeRoute('stories')}}"> {{ text('PatientStories') }} </a></li>
                              <li><a href="#" data-bs-toggle="modal" class="dismiss-menu" data-bs-target="#opinionsSuggestions"> {{ text('YourOpinionsandSuggestions(PatientandStaff)') }} </a></li>
                              <li><a href="#" data-bs-toggle="modal" class="dismiss-menu" data-bs-target="#getWellModal"> {{ text('getwellsoon') }} </a></li>
                            </ul>
                         </div>
                      </div>
                   </div>

                   <!-- disktop menu ------------------- -->

                   <!-- mobile menu ------------------- -->
                   <div class="mobile-menu">
                      <div class="tabs-content">
                         <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade nav1" id="" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                               <div class="tab-head">
                                  <div class="left">
                                     <button onclick="closemenu()"><i class="fa-solid chevron-icon-revers"></i></button>
                                  </div>
                                  <div class="title">
                                     <h3>{{ text('institutional') }}</h3>
                                  </div>
                               </div>
                               <div class="link-content">
                                  <ul class="">
                                    @foreach ($headerCorporateLinks as $headerCorporateLink)
                                    @php($params = $headerCorporateLink->corporatePage ? ["slug" => $headerCorporateLink->corporatePage->translate(app()->getLocale())->slug] : [])
                                       <li><a href="{{ $headerCorporateLink->link ?? localeRoute($headerCorporateLink->route_name,$params) }}" @if($headerCorporateLink->link)target="_blank"@endif>{{ $headerCorporateLink->title }}</a></li>
                                    @endforeach
                                  </ul>
                               </div>
                            </div>
                            <div class="tab-pane fade nav2" id="" role="tabpanel" aria-labelledby="v-pills-patients-tab" tabindex="0">
                               <div class="tab-head">
                                  <div class="left">
                                     <button onclick="closemenu()"><i class="fa-solid chevron-icon-revers"></i></button>
                                  </div>
                                  <div class="title">
                                     <h3>{{text('patients')}}</h3>
                                  </div>
                               </div>
                               <div class="link-content">
                                  <ul class="">
                                    <li><a href="{{localeRoute('patients.guide')}}"> {{text('patientGuide')}} </a></li>
                                    <li><a href="{{localeRoute('stories')}}"> {{ text('PatientStories') }} </a></li>
                                    <li><a href="#" data-bs-toggle="modal" class="dismiss-menu" data-bs-target="#opinionsSuggestions"> {{ text('YourOpinionsandSuggestions(PatientandStaff)') }} </a></li>
                                    <li><a href="#" data-bs-toggle="modal" class="dismiss-menu" data-bs-target="#getWellModal"> {{ text('getwellsoon') }} </a></li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="top-menu">
                         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button @class(["nav-link", "active" => false && str_contains(Route::currentRouteName(), 'kurumsal')]) id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target=".nav1" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{text('institutional')}} <i class="fa-solid chevron-icon"></i></button>
                            <a href="{{localeRoute('medicalUnits.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'medicalUnits')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('ourMedicalUnits')}} <i class="fa-solid chevron-icon"></i></a>
                            <a href="{{localeRoute('doctors.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'doctors')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('ourDoctors')}} <i class="fa-solid chevron-icon"></i></a>
                            <button @class(["nav-link", "active" => false && str_contains(Route::currentRouteName(), 'patients')]) id="v-pills-patients-tab" data-bs-toggle="pill" data-bs-target=".nav2" type="button" role="tab" aria-controls="v-pills-patients" aria-selected="true">{{text('patients')}} <i class="fa-solid chevron-icon"></i></button>
                            <a href="{{localeRoute('checkups.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'checkups')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('checkUpTitle')}} <i class="fa-solid chevron-icon"></i></a>
                            <a href="{{localeRoute('news.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'news')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('news')}} <i class="fa-solid chevron-icon"></i></a>
                            <a href="{{localeRoute('blogs.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'blogs')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('blogs')}} <i class="fa-solid chevron-icon"></i></a>
                            <a href="{{localeRoute('campaigns.index')}}" @class(["nav-link", "active" => str_contains(Route::currentRouteName(), 'campaigns')]) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('campaigns')}} <i class="fa-solid chevron-icon"></i></a>
                            <a href="{{localeRoute('contactUs')}}" @class(["nav-link", "active" => Route::currentRouteName() == 'contactUs']) role="tab" aria-controls="v-pills-settings" aria-selected="false">{{text('contact')}} <i class="fa-solid chevron-icon"></i></a>
                         </div>
                      </div>
                      <div class="bottom-menu">
                         <ul>
                           @foreach ($pages as $page)
         
                              <li><a href="{{ localeRoute('staticPage', $page->slug) }}">{{ $page->title }}</a></li>
                            @endforeach
                         </ul>
                      </div>
                   </div>
                   

                   <!-- mobile menu ------------------- -->



                </div>
             </div>
             <div class="footer">
                <div class="row">
                   <div class="row saglik-row">
                      <div class="col-md-5 evdesaglik">
                         <ul>
                            <li class="active">
                               <a href="https://randevu.maltepehastanesi.com.tr">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/date.png')}}" alt="Appointment">
                                     <h4>{{text('onlineAppointment')}}</h4>

                                  </div>
                               </a>
                            </li>
                            <li class="">
                               <a href="{{localeRoute('eResult')}}">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/sonuc.png')}}" alt="">
                                     <h4>{{text('eResult')}}</h4>

                                  </div>
                               </a>
                            </li>
                            <li class="">
                               <a href="{{localeRoute('healthAtHome')}}">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/evde.png')}}" alt="">
                                     <h4>{{text('healthAtHome')}}</h4>

                                  </div>
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="left col-md-3 col-xl-4 col-xxl-5">
                      <ul>
                         <li class="">
                            <a href="{{localeRoute('askForPrice')}}">
                               <div class="icon">
                                  <img class="lazyload" data-src="{{asset('img/icon/b4.png')}}" alt="">
                                  <h4>{{text('askForPrice')}}</h4>

                               </div>
                            </a>
                         </li>
                      </ul>
                   </div>
                   <div class="right col-md-9 col-xl-8 col-xxl-7">
                      <div class="images">

                         <ul>

                            @foreach ($footer_logos as $footer_logo)
                            <li>
                              <a href="{{ $footer_logo->link }}" target="_blank">
                                 <img class="lazyload" data-src={{Voyager::image($footer_logo->logo)}} alt="{{ $footer_logo->link }}">
                              </a>
                           </li>
                            @endforeach   
                            
                         </ul>

                      </div>
                   </div>
                   <div class="row saglik-row">
                      <div class="col-md-5 evdesaglik">
                         <ul>
                            <li class="active">
                               <a href="https://randevu.maltepehastanesi.com.tr/">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/date.png')}}" alt="Appointment">
                                     <h4>{{text('onlineAppointment')}}</h4>

                                  </div>
                               </a>
                            </li>
                            <li class="">
                               <a href="{{localeRoute('eResult')}}">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/sonuc.png')}}" alt="">
                                     <h4>{{text('eResult')}}</h4>

                                  </div>
                               </a>
                            </li>
                            <li class="">
                               <a href="{{localeRoute('healthAtHome')}}">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/evde.png')}}" alt="">
                                     <h4>{{text('healthAtHome')}}</h4>

                                  </div>
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>

             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- menu ==---------------------------- -->

 <!-- header ==---------------------------- -->
 <div class="header">
    <!-- social media ------------ -->
    <div class="heade-social-media">
       <ul>
          <li class="socialmedia-list text-end">
             <div class="social-list">
                <ul>
                  @if($contactUs->youtube)<li><a target="_blank" href="{{$contactUs->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>@endif
                  @if($contactUs->twitter)<li><a target="_blank" href="{{$contactUs->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>@endif
                  @if($contactUs->facebook)<li><a target="_blank" href="{{$contactUs->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
                  @if($contactUs->instagram)<li><a target="_blank" href="{{$contactUs->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
                  @if($contactUs->linkedin)<li><a target="_blank" href="{{$contactUs->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>@endif
                </ul>
             </div>
             <button class="p-0">
             <img class="lazyload" data-src="{{asset('img/icon/like.png')}}" alt="Social Media">
             </button>
          </li>
          <li class="text-end">
             <a href="tel:{{str_replace(" ", "", $contactUs->phone1)}}" target="_blank">
                <img class="lazyload" data-src="{{asset('img/icon/phone.png')}}" alt="Tel">
             </a>
          </li>
          <li class=" text-end">
             <a href="https://wa.me/{{$contactUs->whatsapp}}" class="whatsapp" target="_blank">
                <img class="lazyload" data-src="{{asset('img/icon/whatsapp.png')}}" alt="whatsapp">
             </a>
          </li>
       </ul>
    </div>
    
    <!-- social media ------------ -->
    <div class="upper">
       <div class="menu-btn">
          <button>
             <div class="icon">
                <img class="lazyload" data-src="{{asset('img/icon/menu.png')}}" alt="">
             </div>
             <div class="text">
                <h4>{{ text('Menu') }}</h4>
             </div>
          </button>
       </div>
       <div class="right">
          <div class="row">
             <div class="contact col-md-7 col-lg-6">
                <div class="content">
                   <div class="links">
                      <ul>
                         <li><a href="{{localeRoute('kurumsal.aboutUs')}}">{{text('institutional')}}</a></li>
                         <li><a href="{{localeRoute('contactUs')}}">{{text('contact')}}</a></li>
                      </ul>
                   </div>
                   <div class="actions">
                      <ul>
                         <li>
                            <div class="home">
                               <a href="{{localeRoute('homepage')}}">
                                  <img class="lazyload" data-src="{{asset('img/icon/home.png')}}" alt="">
                               </a>
                            </div>
                         </li>
                         <li>
                            <div class="dropdown">
                               <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/world.png')}}" alt="">
                                  </div>
                                  <div class="text">
                                     <h4>{{ text('International_Patients') }}</h4>
                                  </div>
                                  <div class="flag">
                                     <img class="lazyload" data-src="{{asset('img/icon/'.app()->getLocale().'.png')}}" alt="{{app()->getLocale()}} flag">
                                  </div>
                               </button>
                               <ul class="dropdown-menu">
                                 @foreach($langs as $lang)
                                     <li><a @class(["dropdown-item", "active" => $lang->code == app()->getLocale()]) href="{{getLangLink($lang->code)}}"><img width="16" class="lazyload" data-src="{{asset('img/icon/'.$lang->code.'.png')}}" alt="{{app()->getLocale()}} flag"> {{$lang->title}}</a></li>
                                     @endforeach
                               </ul>
                            </div>
                         </li>
                         <li>
                            <div class="lokasyon">
                               <a href="{{$contactUs->map}}" target="_blank">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/lokasyon.png')}}" alt="">
                                  </div>
                                  {{ text('Hospital_Location') }}
                               </a>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="announcement col-md-5 col-lg-6">
                <div class="content">
                   <div class="title">
                      <h4>{{text('announcement')}}</h4>
                   </div>
                   <div class="text">
                     <div>
                        <span style="white-space: nowrap;"><h3>{{ $navbarMessages }}</h3></span>

                     </div>

                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="bottom">
       <div class="row">
          <div class="col-md-7 left">
             <div class="content">
                <div class="logo">
                   <div class="logo-con">
                      <a href="{{localeRoute('homepage')}}">
                      <img class="lazyload" data-src="{{Voyager::image($contactUs->{'site_logo_'.app()->getLocale()})}}" alt="Maltepe Hastanesi Logo">
                      </a>
                   </div>

                   <div class="actions">
                      <ul>
                         <li>
                            <div class="home">
                               <a href="{{localeRoute('homepage')}}">
                                  <img class="lazyload" data-src="{{asset('img/icon/home.png')}}" alt="">
                               </a>
                            </div>
                         </li>
                         {{-- <li>
                            <div class="dropdown">
                               <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/world.png')}}" alt="">
                                  </div>
                                  <div class="text">
                                     <h4>{{ text('International_Patients') }}</h4>
                                  </div>
                                  <div class="flag">
                                     <img class="lazyload" data-src="{{asset('img/icon/'.app()->getLocale().'.png')}}" alt="{{app()->getLocale()}} flag">
                                  </div>
                               </button>
                               <ul class="dropdown-menu">
                                 @foreach($langs as $lang)
                                     <li><a @class(["dropdown-item", "active" => $lang->code == app()->getLocale()]) href="{{getLangLink($lang->code)}}"><img width="16" class="lazyload" data-src="{{asset('img/icon/'.$lang->code.'.png')}}" alt="{{app()->getLocale()}} flag"> {{$lang->title}}</a></li>
                                     @endforeach
                               </ul>
                            </div>
                         </li> --}}
                         <li>
                            <div class="lokasyon">
                               <a href="{{$contactUs->map}}" target="_blank">
                                  <div class="icon">
                                     <img class="lazyload" data-src="{{asset('img/icon/lokasyon.png')}}" alt="">
                                  </div>
                                  {{ text('Hospital_Location') }}
                               </a>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
                <div class="links-sec">
                   <ul>
                     <li><a href="{{localeRoute('medicalUnits.index')}}">{{text('ourMedicalUnits')}} <i class="fa-solid chevron-icon"></i></a></li>
                     <li><a href="{{localeRoute('doctors.index')}}">{{text('ourDoctors')}} <i class="fa-solid chevron-icon"></i></a></li>
                     <li><a href="{{localeRoute('patients.guide')}}">{{text('patients')}} <i class="fa-solid chevron-icon"></i></a></li>
                     <li><a href="{{localeRoute('checkups.index')}}">{{text('checkUpTitle')}} <i class="fa-solid chevron-icon"></i></a></li>
                     <li><a href="{{localeRoute('campaigns.index')}}">{{text('campaigns')}} <i class="fa-solid chevron-icon"></i></a></li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-md-5 evdesaglik">
             <ul>
                <li class="active">
                   <a href="https://randevu.maltepehastanesi.com.tr/">
                      <div class="icon">
                         <img class="lazyload" data-src="{{asset('img/icon/date.png')}}" alt="Appointment">
                         <h4>{{text('onlineAppointment')}}</h4>

                      </div>
                   </a>
                </li>
                <li class="">
                   <a href="{{localeRoute('eResult')}}">
                      <div class="icon">
                         <img class="lazyload" data-src="{{asset('img/icon/sonuc.png')}}" alt="">
                         <h4>{{text('eResult')}}</h4>

                      </div>
                   </a>
                </li>
                <li class="">
                   <a href="{{localeRoute('healthAtHome')}}">
                      <div class="icon">
                         <img class="lazyload" data-src="{{asset('img/icon/evde.png')}}" alt="">
                         <h4>{{text('healthAtHome')}}</h4>

                      </div>
                   </a>
                </li>
             </ul>
          </div>
       </div>
    </div>
    <div class="sticky-menu">
      <div class="upper">
         <div class="menu-btn">
            <button>
               <div class="icon">
                  <img class="lazyload" data-src="{{asset('img/icon/menu.png')}}" alt="">
               </div>
               <div class="text">
                  <h4>{{ text('Menu') }}</h4>
               </div>
            </button>
         </div>
         <div class="right">
            <div class="row">
               <div class="contact col-md-12 col-lg-8 col-xl-6">
                  <div class="content">
                     <div class="logo">
                        <a href="{{localeRoute('homepage')}}">
                           <img class="lazyload" data-src="{{Voyager::image($contactUs->{'site_logo_'.app()->getLocale()})}}" alt="Maltepe Hastanesi Logo">
                        </a>
                     </div>
                     <div class="actions">
                        <ul>
                           <li>
                              <div class="home">
                                 <a href="{{localeRoute('homepage')}}">
                                    <img class="lazyload" data-src="{{asset('img/icon/home.png')}}" alt="">
                                 </a>
                              </div>
                           </li>
                           <li>
                              <div class="dropdown">
                                 <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="icon">
                                       <img class="lazyload" data-src="{{asset('img/icon/world.png')}}" alt="">
                                    </div>
                                    <div class="text">
                                       <h4>{{ text('International_Patients') }}</h4>
                                    </div>
                                    <div class="flag">
                                       <img class="lazyload" data-src="{{asset('img/icon/'.app()->getLocale().'.png')}}" alt="{{app()->getLocale()}} flag">
                                    </div>
                                 </button>
                                 <ul class="dropdown-menu">
                                    @foreach($langs as $lang)
                                     <li><a @class(["dropdown-item", "active" => $lang->code == app()->getLocale()]) href="{{getLangLink($lang->code)}}"><img width="16" class="lazyload" data-src="{{asset('img/icon/'.$lang->code.'.png')}}" alt="{{app()->getLocale()}} flag"> {{$lang->title}}</a></li>
                                     @endforeach
                                 </ul>
                              </div>
                           </li> 
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="announcement col-md-5 col-lg-3 ">
                  <div class="content">
                     <div class="title">
                        <h4>{{text('announcement')}}</h4>
                     </div>
                     <div class="text">
                        <div>
                           <span style="white-space: nowrap;"><h3>{{ $navbarMessages }}</h3></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-xl-3 evdesaglik-item">
               <div class=" evdesaglik">
               <ul>
                  <li class="active">
                     <a href="https://randevu.maltepehastanesi.com.tr/">
                        <div class="icon">
                           <img class="lazyload" data-src="{{asset('img/icon/date.png')}}" alt="Appointment">
                           <h4>{{text('onlineAppointment')}}</h4>

                        </div>
                     </a>
                  </li>
                  <li class="">
                     <a href="{{localeRoute('eResult')}}">
                        <div class="icon">
                           <img class="lazyload" data-src="{{asset('img/icon/sonuc.png')}}" alt="">
                           <h4>{{text('eResult')}}</h4>

                        </div>
                     </a>
                  </li>
                  <li class="">
                     <a href="{{localeRoute('healthAtHome')}}">
                        <div class="icon">
                           <img class="lazyload" data-src="{{asset('img/icon/evde.png')}}" alt="">
                           <h4>{{text('healthAtHome')}}</h4>

                        </div>
                     </a>
                  </li>
               </ul>
            </div>
               </div>
            </div>
         </div>
      </div>
      </div>
 </div>
