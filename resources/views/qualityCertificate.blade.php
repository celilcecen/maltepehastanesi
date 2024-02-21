@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- kvkk-section ==---------------------------- -->
    @include('layout.banner')
    <div class="page-content">
        <div class="container">
            <div class="page-tree">

                {{ Breadcrumbs::render('qualityCertificate') }}

            </div>
            <div class="kurumsal-text">
                <h3>{!! text('qualityCertificateTitle') !!}</h3>
                <p>
                    {!! text('qualityCertificateBrife') !!}
                <br> 
                </p>
            </div>
            <div class="belge-list">

                @foreach ($certificates as $certificate)

                    <div class="item">
                        <div class="content">
                            <div class="left">
                                <div class="title">
                                    <h3>{{ $certificate->title }}</h3>
                                </div>
                            </div>
                            <div class="right">
                                <div class="image">
                                    @if ($certificate->logo)
                                    <img class="img" src={{Voyager::image($certificate->logo)}} alt="{{ $certificate->title }}">
                                    @endif
                                </div>
                                <div class="actions">

                                    @if ($certificate->link)
                                        <a href="{{ $certificate->link }}" class="btn btn-secondary" target="_blank">
                                            {{ text('view') }}
                                            <img class="ms-2" src="{{ asset('img/icon/ssearch.png') }}" alt="search">
                                        </a>
                                    @else
                                        <a data-fancybox="quality" href="{{ parse_file($certificate->file) }}" class="btn btn-secondary pdf-button">
                                            {{ text('view') }}
                                            <img class="ms-2" src="{{ asset('img/icon/ssearch.png') }}" alt="search">
                                        </a>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach   
                <div class="pagination-container">   
                    {{$certificates->withQueryString()->onEachSide(2)->links()}}
                </div>
            </div>
        </div> 
    </div>
    <!-- kvkk-section ==---------------------------- -->
    </div>
@endsection