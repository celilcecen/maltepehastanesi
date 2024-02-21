@extends('layout.app')

@section('content')
    <div class="error-page">
        <div class="container">
            <div class="main-content">
                <div class="details">
                    <div class="details-content">
                        <div class="image">
                            <img src="{{asset('img/png/OBJECTS.png')}}" alt="">
                        </div>
                        <div class="text">
                            <h3>{{ text('404title') }}</h3>
                            <p>{!! text('404content') !!}</p>
                            <a href="{{localeRoute('homepage')}}" class="btn btn-primary"> <img class="" src="{{asset('img/icon/homew.png')}}" alt="">
                                {{ text('404backToHomepage') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection