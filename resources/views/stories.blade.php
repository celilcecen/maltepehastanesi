@extends('layout.app')

@section('content')


<div class="main-section">
        @include('layout.banner')
    <div class="page-content">
       <div class="container">
          <div class="page-tree">
             
            {{ Breadcrumbs::render('stories') }}

          </div>
          <div class="kurumsal-text pb-3">
             <h3>{!! text('storiesTilte') !!}</span></h3> 
          </div>


          @if($stories->count() > 0)
          <div class="hasta-hikaye">
              <div class="owl-carousel owl-theme" id="hastahikaye">

                @foreach ($stories as $story)
                    
                  <div class="item">
                      <div class="content">

                          <div class="text">
                              <span>{{ text('stories') }}</span>
                               <h4>{{ $story->title }}</h4>
                                 <p>{!! $story->content !!}</p>
                          </div>
                          
                          <div class="bottom">
                              <div class="icon">
                                  <img src="{{ asset('img/icon/noun-people.png') }}" alt="">
                              </div>
                              <h5>{{ $story->user_name }}, {{ $story->gender }}</h5>
                          </div>
                      </div>
                  </div>
                  
                  @endforeach
                  
              </div>
          </div>
          @endif


          <div class="form-box pb-0">
             <div class="form-content">
                <div class="form-mcontent no-bg">
                   <div class="text">
                      <h3>{{ text('Shareyourstorytoo') }}</h3> 
                   </div>
                   <form action="{{ localeRoute('story.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="row pb-5">
                                <div class="mb-3 col-md-6 col-lg-4 col-xl-4">
                                    <label class="form-label" for="name">{{ text('userName') }} <span>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ text('userName') }}" required> 
                                    <div class="form-check mt-2">
                                        <input class="form-check-input mt-1" type="checkbox" name="sharing_preference" id="anonymous" value="anonymous" onclick="toggleRequired(this)">
                                        <label class="form-check-label" for="anonymous">
                                            {{ text('ShareAnonymously') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6 col-lg-4 col-xl-4">
                                    <label class="form-label" for="email">E-mail <span>*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@example.com" required> 
                                </div>
                                <div class="mb-3 col-md-6 col-lg-4 col-xl-4">
                                    <label class="form-label" for="gender">{{ text('Gender') }}</label>
                                    <div class="select-box">
                                        <select class="nice-select" id="gender" name="gender">
                                            <option value="male">{{ text('Male') }}</option>
                                            <option value="female">{{ text('Female') }}</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="mb-3 col-md-12 col-xl-12">
                                    <label class="form-label" for="title">{{ text('Title') }}</label>
                                    <input id="title" name="title" cols="30" rows="4" class="form-control" placeholder="{{ text('Title') }}">
                                </div>
                                <div class="mb-3 col-md-12 col-xl-12">
                                    <label class="form-label" for="content">{{ text('stories') }}</label>
                                    <textarea id="content" name="content" cols="30" rows="4" class="form-control" placeholder="{{ text('stories') }}"></textarea>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <div class="form-check">
                                            <input class="form-check-input mt-1" type="checkbox" name="acceptance" id="acceptance" required>
                                            <label class="form-check-label" for="acceptance">
                                                {!! text('acceptance') !!}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4 text-center">
                                        <button type="submit" class="btn btn-primary ps-5 pe-5">{{ text('send') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 images">
                            <img src="{{ asset('img/png/patient-doc.png') }}" alt="">
                        </div>
                    </div>
                </form>
                
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>


    

@endsection