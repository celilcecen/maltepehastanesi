<section class="blog-section">
    <div dir="ltr" class="container">
       <div @if(app()->getLocale() == 'ar')dir="rtl"@endif class="sec-title">
          <h3>{{ text('campaigns') }}</h3>
       </div>

       <div class="boxes">
          <div class="col-md-12 top">
             <div class="row">

                <div class="owl-carousel owl-theme" id="campaignslider">

                  @foreach ($campaigns as $campaign)
                     
                     <div @if(app()->getLocale() == 'ar')dir="rtl"@endif class="item">
                        <div class="row d-flex align-items-stretch g-0">
                            
                           
                           <div class="col-md-6 col-lg-6 col-xl-8 p-0 text">
                              <div class="content">
                                 <div class="head">
                                    <a href="{{localeRoute('campaigns.index')}}">
                                       {{ text('campaigns') }}
                                       <i class="fa-solid arrow-icon"></i>
                                    </a>
                                 </div>
                                 <div class="slider-content">
                                    <div class="item" data-img="{{ $campaign->cover_image }}">
                                       <div class="image-sec">
                                          <img class="lazyload" data-src="{{Voyager::image($campaign->cover_image)}}" alt="">
                                       </div>
                                       <div class="text-content">
                                          
                                          <h3 class="mt-3">{{ $campaign->title }}</h3>
                                          <p>{{ $campaign->brief }}</p>
                                          {{-- <a href="{{ localeRoute('campaigns.show', $campaign->slug) }}">{{ text('read_more') }}</a> --}}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-lg-6 col-xl-4 p-0 image campaignImage">
                            <div class="content min">
                               <img class="owl-lazy" data-src={{Voyager::image($campaign->cover_image)}} alt="">
                            </div>
                         </div>
                           
                        </div>
                     </div>
                     @endforeach

                </div>

             </div>
          </div>
          
       </div>
    </div>
 </section>