@extends('layout.app')

@section('content')

<div class="main-section"> 
    @include('layout.banner')
    
    <div class="evde-saglik">
        
        <div class="container">

            {{ Breadcrumbs::render('healthAtHome') }}

        </div>

        <div class="saglik-content">
            <div class="container">
                <div class="text">
                    <h3>{!!  text('healthAtHomeTitle') !!}</h3>
                    <p>{{ $homehealth->brife }}</p>
                    <h2>{{ $homehealth->about_title }}</h2>
                    <p>
                        {!! $homehealth->about_content !!}
                    </p>
                </div>
            </div>
            <div class="banner">
                <div class="container">
                    <div class="row">
                        <div class="detials col-md-6 col-lg-7 col-xl-8 ">
                            <div class="title">
                                <div class="line">
                                    <span></span>
                                </div>
                                <div class="title-text">
                                    <h3>{{ $homehealth->app_title }}<span>{{ $homehealth->app_state }}</span></h3>
                                </div>
                            </div>
                            <p>
                                {!! $homehealth->app_content !!}
                            </p>
                            <div class="download">
                                <ul>
                                    @if(!empty($homehealth->android_link))
                                        <li>
                                        <a href="{{ $homehealth->android_link }}"><img src={{Voyager::image($homehealth->qr_android)}} alt="qr_android"></a>
                                        </li>
                                    @endif
                                
                                    @if(!empty($homehealth->ios_link))
                                        <li>
                                        <a href="{{ $homehealth->ios_link }}"><img src={{Voyager::image($homehealth->qr_ios)}} alt="qr_ios"></a>
                                        </li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class="image col-md-6 col-lg-5 col-xl-4">
                            @if($homehealth->{'app_img_'.app()->getLocale()})
                            <img src={{Voyager::image($homehealth->{'app_img_'.app()->getLocale()})}} alt="Maltepe Application">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="services">
                <div class="container">

                    <div class="title">
                        <h3>{{ text('HomeServices') }}</h3>
                    </div>

                    <div class="boxes">
                        <div class="row">

                        @foreach ($homeServices as $homeService)
                            
                        
                            <div class="item col-md-6 col-lg-4 {{ $homeService->category }}">
                                <div class="content">
                                    <div class="icon">
                                        <img src={{Voyager::image($homeService->logo)}} alt="{{$homeService->title}} icon">
                                    </div>
                                    <div class="text">
                                        <h4>{{ $homeService->title }}</h4>
                                        <p>{{ $homeService->content }}</p>
                                        <button><i class="fa-solid fa-chevron-down"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        @endforeach
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection