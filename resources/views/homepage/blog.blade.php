<section class="blog-section">
    <div class="container">
       <div class="sec-title">
          <h3><span>{{ text('news') }}</span> & {{ text('blogs') }}</h3>
       </div>

       <div dir="ltr" class="boxes">
          <div class="col-md-12 top">
             <div class="row">

                <div class="owl-carousel owl-theme" id="blogslider">

                  @foreach ($blogs as $blog)
                     
                     <div class="item">
                        <div class="row">
                           <div class="col-md-6 col-lg-6 col-xl-8 image">
                              <div class="content">
                                 <img class="owl-lazy" data-src={{Voyager::image($blog->thumbnail_image)}} alt="">
                              </div>
                           </div>
                           <div class="col-md-6 col-lg-6 col-xl-4 text">
                              <div @if(app()->getLocale() == 'ar')dir="rtl"@endif class="content">
                                 <div class="head">
                                    <a href="{{localeRoute('blogs.index')}}">
                                       {{ text('blogs') }}
                                       <i class="fa-solid arrow-icon"></i>
                                    </a>
                                 </div>
                                 <div class="slider-content">
                                    <div class="item" data-img="{{ $blog->thumbnail_image }}">
                                       <div class="image-sec">
                                          <img class="lazyload" data-src="{{Voyager::image($blog->thumbnail_image)}}" alt="">
                                       </div>
                                       <div class="text-content">
                                          
                                          <h3>{{ $blog->title }}</h3>
                                          <p>{{ $blog->brief }}</p>
                                          <a href="{{ localeRoute('blogs.show', $blog->slug) }}">{{ text('read_more') }}</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach

                </div>

             </div>
          </div>
          <div class="col-md-12 bottom">
             <div class="row">
                <div class="owl-carousel owl-theme" id="blogsitem">

                  @foreach ($news as $item)
                     
                   <div class="item">
                      <div class="content">
                         <div class="image">
                            <img class="owl-lazy" data-src={{Voyager::image($item->image)}} alt="">
                         </div>
                         <div @if(app()->getLocale() == 'ar')dir="rtl"@endif class="text">
                            <a href="{{localeRoute('news.show', ['slug' => $item->slug])}}">{{ $item->title }}</a>
                            <h5>{{ formatDate($item->date,true) }}</h5>
                            <p>
                              {{ $item->brief }}
                            </p>
                            <ul>
                               <li>
                                  <img src="{{asset('img/icon/sm-time.png')}}" alt="">
                                  <span>{{ $item->time }}</span>
                               </li>
                               <li>
                                  <img src="{{asset('img/icon/sm-location.png')}}" alt="">
                                  <span>{{ $item->location }}</span>
                               </li>
                            </ul>
                         </div>
                         <div class="foot-btn">
                            <a href="{{localeRoute('news.show', ['slug' => $item->slug])}}">
                               <i class="fa-solid chevron-icon"></i>
                            </a>
                         </div>
                      </div>
                   </div>

                   @endforeach
                   
                </div>

             </div>
             <div class="blog-link">
                <a href="{{localeRoute('news.index')}}">{{ text('AllNewsandAnnouncements') }}</a>
             </div>
          </div>
       </div>
    </div>
 </section>