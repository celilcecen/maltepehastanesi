<section class="program-section">
    <div class="container">
       <div class="row">
          <div class="col-md-6 image">
            @if($homehealth->{'app_img_'.app()->getLocale()})
                 <img class="lazyload" data-src="{{Voyager::image($homehealth->{'app_img_'.app()->getLocale()})}}" alt="app_image">
             @endif
         
             <div class="scroll-bar">
                <div class="content">

                @foreach ($homeServices as $homeService)

                     <div class="item">
                        <a href="">
                           <div class="icon">
                              <img class="lazyload" data-src={{Voyager::image($homeService->logo)}} alt="logo">
                              <h4>{{ $homeService->title }}</h4>

                           </div>
                        </a>
                     </div>

                  @endforeach

                </div>
             </div>
             <div class="points">
                <ul>
                  @foreach ($homeServices as $homeService)
                     
                   <li>
                      <div class="icon">
                         <div class="text">
                            <p>{{ $homeService->title }}</p>
                         </div>
                         <span></span>
                         <div class="bog-con">
                            <div class="con">
                               <img class="lazyload" data-src={{Voyager::image($homeService->logo)}} alt="logo">
                            </div>
                         </div>
                      </div>
                   </li>

                   @endforeach
                </ul>
             </div>
          </div>
          <div class="col-md-6 text">
             <div class="content">
                <h3>{{ text('Home_Health') }}</h3>
                <h4>{{ text('ourApp') }}</h4>
                <p>
                   {{ $homehealth->brife }}
                </p>
                <a class="more" href="{{ localeRoute('healthAtHome') }}">{{ text('read_more') }}</a>
                <div class="download">
                   <ul>
                     @if(!empty($homehealth->android_link))
                        <li>
                           <a href="{{ $homehealth->android_link }}"><img class="lazyload" data-src={{Voyager::image($homehealth->qr_android)}} alt="qr_android"></a>
                        </li>
                     @endif
                  
                    @if(!empty($homehealth->ios_link))
                        <li>
                           <a href="{{ $homehealth->ios_link }}"><img class="lazyload" data-src={{Voyager::image($homehealth->qr_ios)}} alt="qr_ios"></a>
                        </li>
                   @endif
                 
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>