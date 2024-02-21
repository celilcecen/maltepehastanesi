@extends('layout.app')
@section('content')
<div class="main-section">
    <!-- haberler-detay ==---------------------------- -->
    <section class="haberler-section">
        <div class="container">

            {{ Breadcrumbs::render('news.index') }} 

            <div class="haberler-box">
                <div class="title  555ss">
                    <h1>{{ text('news') }}</h1> 
                    <div class="select-box">
                        <select class="order-news nice-select">
                            @php($orderOptions = ["dateDesc", "dateAsc", "titleAsc", "titleDesc"])
                            @foreach($orderOptions as $order)
                            <option value="{{localeRoute('news.index', array_filter(['category' => request()->category, 'page' => request()->page, 'order' => $order]))}}" @if(request()->order == $order) selected @endif>{{text($order)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="lists">
                    <div class="row">
                        <div class="item">
                            <ul class="lists">
                                <li><a href="{{localeRoute('news.index')}}" @class(["btn btn-primary", "active" => !request()->category || request()->category == "all"])>{{ text('all') }}</a></li>
                                @foreach ($categories as $category)
                                <li><a href="{{localeRoute('news.index', ['category' => $category->id])}}" @class(["btn btn-primary", "active" => request()->category == $category->id])>{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div> 
                    </div> 
                    </div>
                    <div class="main-boxes">
                        <div class="row">
                            @foreach ($news->translate(app()->getLocale()) as $item)
                                <div class="item col-md-6 col-xl-4">
                                    <div class="content">
                                        <div class="image">
                                          <a href="{{localeRoute('news.show', ['slug' => $item->slug])}}">  <img src="{{Voyager::image($item->image)}}" alt="{{$item->title}}"> </a>
                                        </div>
                                        <div class="text">
                                            <a href="{{localeRoute('news.show', ['slug' => $item->slug])}}">{{$item->title}}</a>
                                            <h5>{{formatDate($item->date, true)}}</h5>
                                            <p>
                                                {!! $item->brief !!}
                                            </p>
                                            <ul>
                                                <li>
                                                    <img src="{{asset('img/icon/sm-time.png')}}" alt="">
                                                    <span>{{$item->time}}</span>
                                                </li>
                                                <li>
                                                    <img src="{{asset('img/icon/sm-location.png')}}" alt="">
                                                    <span>{{$item->location}}</span>
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
                        <div class="pagination-container">
                            {{$news->withQueryString()->onEachSide(2)->links()}}
                        </div>
                    </div>
            </div>
        </div>
    </section>
    </div>
@endsection