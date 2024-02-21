@extends('layout.app')

@section('content')


<div class="main-section">
    <section class="search-page">
       <div class="container">
          <div class="page-tree">
             
            {{ Breadcrumbs::render('searchResult') }}


          </div>
          <div class="content-section">
             <div class="search-box">
                <div class="title">
                   <h3>{!! text('search_Result_Title') !!}</h3>
                </div>
                <form action="{{ localeRoute('searchResult') }}" method="GET">  
                        <div class="search">
                        <div class="icon">
                            <img src="{{ asset('img/icon/sm-search.png') }}" alt="">
                        </div>
                        
                        <div class="type">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="{{ text('search') }}">
                            </div>
                        </div>
                        <div class="search-btn">
                            <button><i class="fa-solid arrow-icon"></i></button>
                        </div>
                        </div>
                </form>
                <div class="search-sonuc">
                   <h3> {{ $results->count() }} {{ text('results') }}</h3>
                   <div class="searched-word">
                      <h5> {{ $search }} </h5>
                      <h4>{{ text('search_brief') }}</h4>
                   </div>
                </div>
             </div>
             <div class="search-list">
            @foreach ($results as $result)
                
            
                <div class="item">
                   <div class="content">
                      <div class="text">
                         <h3>{{ $result->title }}</h3>
                         <span>{{ $result->category }}</span>
                      </div>
                      <div class="action">
                         <a target="_blank" href="{{ $result->link }}" class="btn btn-secondary">{{ text('Detail') }} <span class="icon"><i class="fa-solid arrow-icon"></i></span></a>
                      </div>
                   </div>
                </div>
                
            @endforeach    
                
                
             </div>
          </div>
          
          {{-- {{$results->links()}} --}}

       </div>
    </section>
    </div>



@endsection