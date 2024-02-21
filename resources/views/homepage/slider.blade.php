<section class="slider-section">
@php($pharma = $pharmacies->first())
   <div class="slider-upper">
      <div class="nobetci col-md-7">
         <div class="content">
               <div class="eczane">
                  <div class="icon">
                     <img src="{{asset('img/icon/location.png')}}" alt="">
                  </div>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#pharmacies">
                     <div class="text">
                        <h4>{{ text('PharmacyonDuty') }}</h4>
                           <span>{{ formatDate($pharma->updated_at) }}</span>

                     </div>
               </a>
               </div>
               <div class="location">
                  <a href="https://www.google.com/maps?q={{ $pharma->loc }}" target="_blank">
                  <p>{{ $pharma->name }}<br/>{{ $pharma->phone }}</p>
                  </a>
               </div>
         </div>
      </div>
      <div class="helper-search col-md-5">
         <div class="content">
            <h4>{!! text('How_can_we_help_you') !!}</h4>

          <form action="{{ localeRoute('searchResult') }}" method="GET">  
            
            <div class="form-sec">
               <div class="input-group mb-3">
                  <input type="text" name="search" class="form-control" placeholder="{{ text('Keyword') }}">
               </div>
               <div class="input-group mb-3">
                  <button>{{text('search')}}</button>
               </div>
            </div>
          </form>

            <div class="links">
               <ul>
               <li><a href="{{localeRoute('medicalUnits.index')}}">{{text('azUnits')}}</a></li>
               <li><a href="{{localeRoute('doctors.index')}}">{{text('doctors')}}</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>


    <div class="owl-carousel owl-theme main-slider" id="slider">
      @foreach ($slideShows as $slideShow)
               
         <div class="item">
            <div class="caption">
               <div class="container" >
                  <div class="content">
                     <div class="text">
                        
                        {!! $slideShow->content !!}
                        @if($slideShow->button_active)
                        @if($slideShow->link)
                           <a href="{{ $slideShow->link }}" target="_blank" class="slider-btn ">{{ $slideShow->button_text }}</a>
                        @elseif($slideShow->file)
                           <a href="{{ parse_file($slideShow->file) }}" class="slider-btn fancybox" data-fancybox>{{ $slideShow->button_text }}</a>
                        @endif
                        @endif


                     </div>
                     
                  </div>
               </div>
            </div>

            <div class="image">
               @if($slideShow->video)
               <div class="video">
                  <a data-fancybox="gallery" href="{{ $slideShow->video }}">
                     <img src="{{asset('img/icon/play.png')}}" alt="">
                  </a>
               </div>
               @endif
               @if(parse_file($slideShow->video_slide))
               <video loop autoplay muted poster="">
                  <source src="{{parse_file($slideShow->video_slide)}}" type="video/mp4">
              </video>
               @else
               <img class="owl-lazy" data-src={{Voyager::image($slideShow->image)}} alt="" >
               @endif
            </div>
            
         </div>

      @endforeach


    </div>
    <!-- acil tip ------------ -->
    <div class="aciltip">
       <div class="container">

       <div class="owl-carousel owl-theme " id="aciltipslider">
         @foreach($units as $letter => $unitsGroup)
         @foreach($unitsGroup as $unit)
          <div class="item">
             <div class="content">
                <div class="text">
                   <h3>{{$letter}}</h3>
                </div>
                <div class="text">
                   <a href="{{localeRoute('medicalUnits.show', ["slug" => $unit->slug])}}">
                   <h3>{{$unit->title}}</h3>
                   </a>
                </div>
             </div>
          </div> 
          @endforeach
          @endforeach
      </div>
      </div>
     
    </div>
    <!-- acil tip ------------ -->

    <section class="slider-bottom">
       <div class="container">
          <div class="row">

             <div class="helper-search">
                <div class="content">
                  <h4>{!! text('How_can_we_help_you') !!}</h4>
                   <form action="{{ localeRoute('searchResult') }}" method="GET">  
                   <div class="form-sec">
                      <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="{{ text('Keyword') }}">
                      </div>
                      <div class="input-group mb-3">
                         <button>{{text('search')}}</button>
                      </div>
                   </div>
                  </form>
                   <div class="links">
                      <ul>
                         <li><a href="{{localeRoute('medicalUnits.index')}}">{{text('azUnits')}}</a></li>
                         <li><a href="{{localeRoute('doctors.index')}}">{{text('doctors')}}</a></li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>

 </section>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "url": "https://maltepehastanesi.com.tr/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://maltepehastanesi.com.tr/tr/arama?search={query}",
        "query-input": "required name=query"
      }
    },
    {
      "@type": "Organization",
      "@id": "Maltepe Hastanesi",
      "name": "Maltepe Üniversitesi Tıp Fakültesi Hastanesi",
      "image": "https://maltepehastanesi.com.tr/storage/contact-us/April2023/ypmicZCnhW4bsxXreJa8.png",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Feyzullah cad. No:39",
        "addressLocality": "Maltepe",
        "addressRegion": "İstanbul",
        "postalCode": "34843",
        "addressCountry": "TR"
      },
      "alternateName": "Maltepe Üniversitesi Tıp Fakültesi Hastaneleri",
      "areaServed": "Turkey",
      "description": "Maltepe Üniversitesi Tıp Fakültesi Hastanesi olarak akademik kadromuzda 59 profesör, 12 doçent, 41 doktor öğretim üyesi, 3 uzman hekim, 2 diyetisyen ve 29 araştırma görevlisi görev yapmaktadır.",
      "email": "info@maltepehastanesi.com.tr",
      "location": {
        "@type": "Place",
        "name": "Maltepe / Turkey"
      },
      "logo": "https://maltepehastanesi.com.tr/storage/contact-us/April2023/ypmicZCnhW4bsxXreJa8.png",
      "sameAs": [
        "https://www.youtube.com/channel/UCGYFM1EzmkMN3B1hno4FRWg",
        "https://twitter.com/maltepehastane",
        "https://www.facebook.com/Maltepehastanesi/",
        "https://www.instagram.com/maltepehastanesi/"
      ],
      "telephone": [
        "0850 811 02 51",
        "444 06 20"
      ],
      "url": "https://maltepehastanesi.com.tr/"
    }
  ]
}


</script>

 @include('homepage.pharmacies')