@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- kvkk-section ==---------------------------- -->
    @include('layout.banner')
    <div class="page-content">
        <div class="container">
            <div class="page-tree">

                {{ Breadcrumbs::render('healthInsurance') }}

            </div>

            <div class="kurumsal-text pb-3">
                <h1>{!! text('PrivatehealthinsuranceTitle') !!}</h1> 
            </div>

            <div class="logos-section">
                <div class="row">

                    @foreach ($insuranceCompanies as $insuranceCompany)
                        
                        
                        <div class="item col-6 col-sm-6 col-md-3 col-xl-2">
                            <a href="{{ $insuranceCompany->link }}">
                            <div class="content" style="background: url('{{Voyager::image($insuranceCompany->logo)}}') center no-repeat; background-size: contain;">
                            </div>
                        </a>
                        </div>

                    @endforeach

                </div>
            </div>
        </div> 
    </div>
    <!-- kvkk-section ==---------------------------- -->

    </div>

@endsection