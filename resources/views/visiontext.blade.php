@extends('layout.app')

@section('content')

    <div class="main-section">
        <!-- kvkk-section ==---------------------------- -->
        @include('layout.banner')
        <div class="page-content">
            <div class="container">
                <div class="page-tree">
                    
                    {{ Breadcrumbs::render('kurumsal.vision') }}

                </div>
                <div class="kurumsal-text">
                    <h3>{!! text('ourMissionTitle') !!}</h3>
                    <p>
                        {!! $visiontext->content !!}
                    </p>
                </div>
            </div> 
        </div>
        <!-- kvkk-section ==---------------------------- -->
        </div>

@endsection