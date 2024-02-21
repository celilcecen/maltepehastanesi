@extends('layout.app')

@section('content')

    <div class="main-section">
        <!-- kvkk-section ==---------------------------- -->
        @include('layout.banner')
        <div class="page-content">
            <div class="container">
                <div class="page-tree">

                    {{ Breadcrumbs::render('kurumsal.aboutUs') }}

                </div>

                <div class="kurumsal-text">
                    <h3>{!! text('institutionalTitle') !!}</h3>
                    <p>
                        {!! $institutional->brife !!}
                    </p>
                </div>
            </div>
            <div class="kurumsal-about">
                <div class="container">
                <div class="col-md-12 col-xl-8">
                    <div class="main-item col-md-12">
                    <h3>1997</h3>
                            <h4>{{ text('foundedYear') }}</h4>
                            <p><strong>{{ $institutional->founded_year_title }}</strong> <br> {{ $institutional->founded_year_brife }}</p>
                    </div>
                    <div class="row">
                        <div class="item col-sm-12 col-md-4">
                            <div class="content cn-box-flex text-start">
                            <h3>{{ $institutional->experience_years	 }}{{text('year')}}</h3>
                            <div class="cn-box">
                            <p>{{ text('QualityinHealth') }}</p>
                            <strong>{{ text('HISTORYANDEXPERIENCE') }}</strong>
                            </div>
                            </div>
                        </div>
                        <div class="item col-6 col-sm-6 col-md-4">
                            <div class="content">
                            <p>{{ text('ExperiencedAcademicStaff') }}</p>
                            <h3>{{ $institutional->teaching_staff }}</h3>
                            <strong>{{ text('TEACHINGSTAFF') }}</strong>
                            </div>
                        </div>
                        <div class="item col-6 col-sm-6 col-md-4">
                            <div class="content">
                            <strong>{{ text('EMPLOYEE') }}</strong>
                            <h3>{{ $institutional->employee_count }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- kvkk-section ==---------------------------- -->

        </div>

@endsection