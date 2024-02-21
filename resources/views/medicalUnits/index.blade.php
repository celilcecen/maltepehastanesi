@extends('layout.app')
@section('content')
<div class="main-section">
    <!-- doktor-section ==---------------------------- -->
    <section class="doktor-section tibbi-birimleri">
        <div class="content">
            <div class="top-sec" style="background-image: url('{{ asset('img/png/tibbi' . (app()->getLocale() == 'ar' ? '-ar' : '') . '.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 text">
                            <div class="text-content">
                                <h1>{{text('ourMedicalUnits')}}</h1>
                                <p>{{ text('Medical_units_brief') }}</p>
                                <div class="lists">
                                    <div class="item col-6 col-sm-6 col-md-6">
                                        <div class="image">
                                            <img src="{{asset('img/icon/tibbibirim.png')}}" alt="">
                                        </div>
                                        <div class="textb">
                                            <h3>{{$unitsCount}}</h3>
                                            <h4>{{text('medicalUnit')}}</h4>
                                        </div>
                                    </div>
                                    <div class="item col-6 col-sm-6 col-md-6">
                                        <div class="image">
                                            <img src="{{asset('img/icon/kadro.png')}}" alt="">
                                        </div>
                                        <div class="textb">
                                            <h3>{{$doctorsCount}}</h3>
                                            <h4>{{text('teachingStaff')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-bar-sec">
                <div class="container">

                    <div class="row">
                        <div class="filter-bar">
                            <div class="randevu">
                                <h3>{{ text('Find_Your_Doctor') }}<a href=""> {{ text('Create_an_Appointment') }}</a></h3>
                            </div>
                            <div class="content">
                                <form action="{{localeRoute('medicalUnits.index')}}" method="get">
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 item">
                                        <label for="">{{ text('units') }}</label>
                                        <div class="search">
                                            <div class="icon">
                                                <img src="{{asset('img/icon/sm-search.png')}}" alt="">
                                            </div>
                                            <div class="type">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="{{text('units')}}" name="search" value="{{request()->search ?? ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2 item">
                                        <div class="row">
                                            <div class="filtrele-btn cls_pt_6">
                                                <button class="btn btn-primary">{{text('filter')}} <span class="icon"><i class="fa-solid fa-arrow-down"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <div class="row">
                    
                                    <div class="letters">

                                        <div class="title">
                                            <a href="{{localeRoute('medicalUnits.index')}}"><h4>{{text('all')}}</h4></a>
                                        </div>
                                        <div class="letter-list">
                                            <ul>
                                                @foreach($units as $letter => $unitsGroup)
                                                <li><a href="{{localeRoute('medicalUnits.index', ['letter' => $letter])}}">{{$letter}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="letter-select">
                                            <div class="select-box">
                                                <select class="medical-units-letters nice-select">
                                                    @foreach($units as $letter => $unitsGroup)
                                                        <option value="{{localeRoute('medicalUnits.index', ['letter' => $letter])}}" @if(request()->letter == $letter) selected @endif>{{$letter}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filtrele-btn cls_pt_6 mobile">
                                        <button type="submit" class="btn btn-primary">{{text('filter')}} <span class="icon"><i class="fa-solid fa-arrow-down"></i></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- doktor-section ==---------------------------- -->

    <!-- letters-listbar-section ==---------------------------- -->
    <section class="letters-listbar-section">
        <div class="container">
            @foreach($units as $letter => $unitsGroup)
            @continue(request()->letter && request()->letter != $letter)
            <div class="item">
                <div class="row">
                    <div class="col-md-1 left">
                        <h3>{{$letter}}</h3>
                    </div>
                    <div class="col-md-10 center">
                        <div class="row">
                            @foreach ($unitsGroup as $unit)
                            <div class="col-md-4 sm-item">
                                <div class="actions">
                                    <div class="text">
                                        <p><a href="{{localeRoute('medicalUnits.show', ["slug" => $unit->slug])}}">{{$unit->title}}</a></p>
                                    </div>
                                    <div class="action-btn">
                                        <ul>
                                            <li>
                                                <a href="{{localeRoute('appointment')}}" class="btn btn-info"><img src="{{asset('img/icon/date.png')}}" alt=""></a>
                                            </li>
                                            <li>
                                                <a href="{{localeRoute('medicalUnits.show', ["slug" => $unit->slug])}}" class="btn btn-secondary"><span class="icon"><i class="fa-solid arrow-icon"></i></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-1 right">
                        <h4>{{tr_strtolower($letter)}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- letters-listbar-section ==---------------------------- -->
    </div>
@endsection