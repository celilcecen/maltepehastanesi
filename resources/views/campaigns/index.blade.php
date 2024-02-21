@extends('layout.app', ["robots" => "noindex"])

@section('content')

<div class="main-section">
    <section class="blogpage-section">
       <div class="container">
         <div class="page-tree d-flex">
            {{ Breadcrumbs::render('campaigns.index') }}
         </div>
          <div class="boxes">
             <div class="row">
                <div class="col-md-12 col-xl-12">
                   <div class="main-box">

                      <div class="title">
                         <h1>{{ text('campaigns') }}</h1>
                      </div>


                      <div class="row d-none">
                         <div class="owl-carousel owl-theme" id="blogslider">

                           @foreach ($featured_campaigns as $campaign)
                              @if($campaign->is_featured == 1)                           
                                 <div class="item">
                                    <div class="row">
                                       <div class="image">
                                          <div class="content">
                                             <img class="owl-lazy" data-src={{Voyager::image($campaign->thumbnail_image)}} alt="{{$campaign->title}}">
                                          </div>
                                       </div>
                                       <div class="text">
                                          <div class="content">
                                             <div class="slider-content">
                                                <div class="item" data-img="{{Voyager::image($campaign->thumbnail_image)}}">
                                                   
                                                   <div class="text-content">
                                                      
                                                      <h3>{{$campaign->title}}</h3>
                                                      <p>{{$campaign->brief}}</p>
                                                      {{-- <a href="{{ localeRoute('campaigns.show', $campaign->slug) }}">{{text('read_more')}}</a> --}}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            @endif
                           @endforeach


                         </div>
                      </div>
                   </div>

                   <div class="small-box">
                      <div class="row">

                        @foreach($campaigns->translate(app()->getLocale()) as $campaign)
                           
                         <div class="item col-md-4">
                            <div class="content">
                               <div class="image cardCampaignImage">
                                  <img src="{{Voyager::image($campaign->thumbnail_image)}}" alt="{{$campaign->title}}">
                               </div>
                               <div class="text">
                                 <div class="head">
          
                                  </div>
 
                                  <h4><a href="{{ localeRoute('campaigns.show', $campaign->slug) }}"> {{$campaign->title}} </a></h4>
 
                                  <p>
                                     {{$campaign->brief}}
                                  </p>
                                  {{-- <div class="more">
                                     <a href="{{ localeRoute('campaigns.show', $campaign->slug) }}"> {{text('read_more')}} </a>
                                  </div>
                                  <ul>
                                     <li>
                                        <img src="{{asset('img/icon/bclock.png')}}" alt="">
                                        <span>{{ formatDate($campaign->date) }}</span>
                                     </li>

                                  </ul> --}}
                               </div>
                            </div>
                         </div>
 
                         @endforeach

                        </div>

                        <div class="pagination-container"> 
                           {{$campaigns->withQueryString()->onEachSide(2)->links()}}
                        </div>
                   </div>
                </div>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

@endsection
