@extends('layout.app')
@section('content')
<div class="main-section">
    <div class="doktordetay-bg">
    <div class="doktordetay-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xxl-3 profile-sec">
                    <div class="image">
                        @if($doctor->video)
                        <div class="video">
                            <a data-fancybox="gallery" href="{{$doctor->video}}">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        @endif
                        <div class="img-content">
                            <img class="rounded-circle" src="{{$doctor->image ? Voyager::image($doctor->image) : asset('img/logo_symbol.png')}}" alt="{{$doctor->name}}">
                        </div>
                    </div>
                    <div class="details">
                        <h3>{{text('information')}}</h3>
                        <ul>
                            @if($doctor->birth)
                            <li>
                                <div class="icon"><img src="{{asset('img/icon/birth.png')}}" alt="birthday_icon"></div>
                                <h5>{{$doctor->birth}}</h5>
                            </li>
                            @endif
                            @if($doctor->graduation)
                            <li>
                                <div class="icon"><img src="{{asset('img/icon/education.png')}}" alt="education_icon"></div>
                                <h5>{{$doctor->graduation}}</h5>
                            </li>
                            @endif
                            @if($doctor->languages)
                            <li>
                                <div class="icon"><img src="{{asset('img/icon/language.png')}}" alt="language_icon"></div>
                                <h5>{{$doctor->languages}}</h5>
                            </li>
                            @endif
                            @if($doctor->email)
                            <li>
                                <div class="icon"><img src="{{asset('img/icon/sm-email.png')}}" alt="email_icon"></div>
                                <h5>{{$doctor->email}}</h5>
                            </li>
                            @endif
                            @if($doctor->phone)
                            <li>
                                <div class="icon"><img src="{{asset('img/icon/phone-512.webp')}}" alt="phone_icon"></div>
                                <h5 dir="ltr">{{$doctor->phone}}</h5>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="action">
                        <a href="{{localeRoute('appointment')}}" class="btn btn-info"><img src="{{asset('img/icon/date.png')}}" alt="appointment"> {{text('takeAppointment')}}</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xxl-9 profile-text">
                    <div class="main-content">
                        <div class="head">
                            <h1>{{$doctor->title}} {{$doctor->name}}</h1>
                            <h2>{!! $doctor->units->translate(app()->getLocale())->sortBy('title')->implode('title', '<br>') !!}</h2>
                        </div>
                        <div class="tab-content-sec">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="speciality-tab" data-bs-toggle="tab" data-bs-target="#speciality-tab-pane" type="button" role="tab" aria-controls="speciality-tab-pane" aria-selected="true">{{text('specialities')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">{{text('education')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="publications-tab" data-bs-toggle="tab" data-bs-target="#publications-tab-pane" type="button" role="tab" aria-controls="publications-tab-pane" aria-selected="false">{{text('publications')}}</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="speciality-tab-pane" role="tabpanel" aria-labelledby="speciality-tab" tabindex="0">
                                    {!! $doctor->speciality !!}
                                </div>
                                <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">
                                    {!! $doctor->education !!}
                                </div>
                                <div class="tab-pane fade" id="publications-tab-pane" role="tabpanel" aria-labelledby="publications-tab" tabindex="0">
                                    {!! $doctor->publications !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('schema')

<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Person",
      "name": "{{$doctor->name}}" ,
      "url": "{{$doctor->email}}",
      "image": "{{$doctor->image ? Voyager::image($doctor->image) : asset('img/logo_symbol.png')}}",
      "sameAs": [
        "Facebook",
        "Twitter",
        "Instagram",
        "Youtube",
        "Linkdedin"
      ],
      "jobTitle": "{{$doctor->title}} {!! $doctor->speciality !!}",
      "worksFor": {
        "@type": "Organization",
        "name": "{{$seo->meta_title}}"
      }  
    }
    </script>


@endsection
