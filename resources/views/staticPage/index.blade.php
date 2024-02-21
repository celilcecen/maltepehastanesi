@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- kvkk-section ==---------------------------- -->
    <section class="kvkk-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 sidebar">
                    <div class="content">
                        <div class="title">
                            <h3>{{ text('DataPrivacy') }}</h3>
                        </div>
                        <div class="lists">

                            @foreach ($pages as $Spage)
                                
                            <ul>
                                <li><a href="{{ localeRoute('staticPage', $Spage->slug) }}" class="{{ ($page->slug == $Spage->slug) ? 'active' : '' }}">{{ $Spage->title }}</a></li>

                            </ul>

                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 text-content">

                    <div class="page-tree">
                        
                        {{ Breadcrumbs::render('staticPage.index', $page) }} 

                    </div>

                    <div class="page-content">
                        <div class="text">
                            {!! $page->content !!}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kvkk-section ==---------------------------- -->



    </div>

@endsection