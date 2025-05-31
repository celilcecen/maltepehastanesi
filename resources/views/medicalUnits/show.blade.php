@extends('layout.app')
@section('content')
<div class="main-section">
    <!-- kvkk-section ==---------------------------- -->
    @if($unit->image)
    <div class="sm-banner">
        <div class="content" >
        <div class="banner-image">
            <img src="{{Voyager::image($unit->image)}}" alt="{{$unit->title}}">
        </div>
            <div class="container">
                <div class="text">
                    <h1>{{$unit->title}}</h1>
                    @if($unit->video)
                    <div class="video">
                        <a data-fancybox="gallery" href="{{$unit->video}}">
                        <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="tup-bebek-section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-8 text">
                    <h2>{{text('aboutUnit')}}</h2>
                    {{-- <h2>{{$unit->title}}</h2> --}}
                    <div class="text-content">
                    {!! $unit->content !!}
                    </div>
                    @if($unit->blogs->count() > 0)
                    <div class="ilgili-yazilar">
                        <div class="m-content">
                            <div class="head">
                                <h3>{{text('relatedBlogs')}}</h3>
                                <div class="blog">
                                <a href="{{localeRoute('blogs.index', ['unit' => $unit->id])}}">
                                       {{text('blog')}}
                                       <i class="fa-solid arrow-icon"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="slider-content">
                                <div class="owl-carousel owl-theme" id="tup-bebek">
                                    @foreach($unit->blogs->translate(app()->getLocale()) as $blog)
                                    <div class="item">
                                        <div class="content">
                                            <div class="box-head">
                                                @foreach ($blog->categories->translate(app()->getLocale()) as $category)
                                                    <a href="{{localeRoute('blogs.index', ['unit' => $unit->id, 'category_id' => $category->id])}}" class="btn btn-{{$category->color}}">{{$category->title}}</a>
                                                @endforeach
                                                <div class="doctor-name d-flex">
                                                    <div class="starter-line mt-4"></div>
                                                    <h3>{{$blog->title}}</h3>
                                                </div>
                                                <div class="share">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#{{ $blog->slug }}"><i class="fa-solid fa-share-nodes"></i></a>
                                                  </div>
                                            </div>
                                            <div class="box-content">
                                                <p>
                                                {{$blog->brief}}
                                                </p>
                                            </div>
                                            <div class="box-footer">
                                                <ul>
                                                    <li>
                                                        <img src="{{asset('img/icon/clock.png')}}" alt="date">
                                                        <span>{{formatDate($blog->date, true)}}</span>
                                                    </li>
                                                    <li>
                                                        <img src="{{asset('img/icon/edit.png')}}" alt="author">
                                                        <span>{{$blog->author->name}}</span>
                                                    </li>
                                                </ul>
                                                <div class="action">
                                                    <a href="{{localeRoute('blogs.show', ['slug' => $blog->slug])}}"><i class="fa-solid arrow-icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach ($unit->blogs->translate(app()->getLocale()) as $blog)
                            <div class="modal fade" id="{{ $blog->slug }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                            <div class="form-box pb-0">
                                            <div class="form-content">
                                                <div class="form-mcontent no-bg">
                                                        <div class="sec-title">
                                                            <h3>{{ text('share_social') }} : </h3>
                                                            <h4>{{ $blog->title }}</h4>
                                                            {!! $shareBtns[$blog->id] !!}
                                                        </div>

                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-md-12 col-xl-4 birim-doktorlari">
                    @if($unit->doctors->count() > 0)
                        <div class="title">
                            <h3>{{text('unitDoctors')}}</h3>
                        </div>
                        @foreach($unit->doctors->translate(app()->getLocale())->sortByDesc('title') as $doctor)
                            <div class="doktorpro {{!$loop->first ? 'mt-3' : ''}}">
                                <div class="image">
                                    <img class="rounded-circle" src="{{$doctor->image ? Voyager::image($doctor->image) : asset('img/logo_symbol.png')}}" alt="{{$doctor->name}}">
                                </div>
                                <div class="text">
                                    <div class="text-cont">
                                        <div class="doctor-name d-flex">
                                            <div class="starter-line"></div>
                                            <h3>{{$doctor->title}} {{$doctor->name}}</h3>
                                        </div>
                                        <div class="descreption">
                                            <p>{!! $doctor->units->translate(app()->getLocale())->sortBy('title')->implode('title', '<br>') !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="{{localeRoute('appointment')}}" class="btn btn-info"><img src="{{asset('img/icon/date.png')}}" alt="date"></a>
                                        </li>
                                        <li>
                                            <a href="{{localeRoute('doctors.show', ['slug' => $doctor->slug])}}" class="btn btn-secondary"><span class="icon"><i class="fa-solid arrow-icon"></i></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @include('layout.doctorQuestionForm')
                </div>
            </div>
        </div>
    </div>
    <!-- kvkk-section ==---------------------------- -->
    </div>
@endsection
