@extends('layout.app', ["robots" => "noindex"])
@section('content')
<div class="main-section">
    <section class="blog-detay tup-bebek-section" >
        <div class="container">
            <div class="row"> 
                {{ Breadcrumbs::render('campaigns.show', $campaign) }} 
                
                <div class="col-md-12 col-xl-12 text-content">
                    <div class="page-content">
                        <div class="text">
                            <h1>{{$campaign->title}}</h1>
                            <div class="details">
                            <ul>
                            <li>
                                <img src="{{asset('img/icon/clock.png')}}" alt="">
                                <span>{{formatDate($campaign->date, true)}}</span>
                            </li>

                        </ul>
                            </div>
                            <div class="main-image cardCampaignImage">
                                <img src="{{Voyager::image($campaign->cover_image)}}" alt="{{$campaign->title}}">
                            </div>
                            {!! $campaign->content !!}
                        </div>
                        <div class="haber-pagenation">
                            <div class="left btn-sec">
                            </div>
                            <div class="center">
                                <ul>
                                    @if($contactUs->youtube)<li><a target="_blank" href="{{$contactUs->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>@endif
                                    @if($contactUs->twitter)<li><a target="_blank" href="{{$contactUs->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>@endif
                                    @if($contactUs->facebook)<li><a target="_blank" href="{{$contactUs->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
                                    @if($contactUs->instagram)<li><a target="_blank" href="{{$contactUs->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
                                    @if($contactUs->linkedin)<li><a target="_blank" href="{{$contactUs->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>@endif
                                </ul>
                            </div>
                            <div class="right btn-sec">
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
