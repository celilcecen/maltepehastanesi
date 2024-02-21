@extends('layout.app')
@section('content')
<div class="main-section">
    <section class="blogpage-section">
       <div class="container">

        {{ Breadcrumbs::render('author.show', $author) }} 

          <div class="boxes">
             <div class="row">
                <div class="col-md-12 col-xl-12">

                    <div class="main-box col-md-12 col-xl-12">

                        <div class="row container">

                                <div class="img-content col-md-6 col-xl-3 ">
                                    <img class="rounded-circle" src="{{$author->image ? Voyager::image($author->image) : asset('img/logo_symbol.png')}}" alt="{{$author->name}}">
                                </div>
                        
                                <div class="text col-md-6 col-xl-9">
                                    <div class="title">
                                        <h1>{{ $author->name }}</h1>
                                    </div>
                                    <div class="brief">
                                        <p>{{ $author->brief }}</p>
                                    </div>
                                </div>

                        </div>
                    
                    

                   <div class="small-box">
                      <div class="row">

                        @foreach($blogs->translate(app()->getLocale()) as $blog)
                           
                         <div class="item col-md-4">
                            <div class="content">
                               <div class="image">
                                  <img src="{{Voyager::image($blog->thumbnail_image)}}" alt="{{$blog->title}}">
                               </div>
                               <div class="text">
                                 <div class="head">
                                    @foreach ($blog->categories->translate(app()->getLocale()) as $category)
                                       
                                          <a href="{{ localeRoute('blogs.index', ['slug' => $category->slug]) }}" class="btn-{{$category->color}}">{{$category->title}}</a>
                                       
                                    @endforeach
                                  </div>
 
                                  <h4><a href="{{ localeRoute('blogs.show', $blog->slug) }}"> {{$blog->title}} </a></h4>
 
                                  <p>
                                     {{$blog->brief}}
                                  </p>
                                  <div class="more">
                                     <a href="{{ localeRoute('blogs.show', $blog->slug) }}"> {{text('read_more')}} </a>
                                  </div>
                                  <ul>
                                     <li>
                                        <img src="{{asset('img/icon/bclock.png')}}" alt="">
                                        <span>{{ formatDate($blog->date) }}</span>
                                     </li>
                                     <li>
                                        <img src="{{asset('img/icon/edit.png')}}" alt="">
                                        <a href="{{ localeRoute('author.show',$author->slug) }}"><span>{{ $author->name }}</span></a>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
 
                         @endforeach

                        </div>

                         
                           {{-- {{$blogs->withQueryString()->onEachSide(2)->links()}} --}}
                        
                   </div>
                </div>

                   
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

@endsection