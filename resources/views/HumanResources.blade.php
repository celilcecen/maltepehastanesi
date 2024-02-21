@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- kvkk-section ==---------------------------- -->
    <div class="sm-banner">
        <div class="content" >

            @include('layout.banner')

            <div class="container">
                <div class="text">  
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="page-tree">
                
                {{ Breadcrumbs::render('HumanResources') }}

            </div>
            <div class="kurumsal-text pb-3">
                <h3>{!! text('HumanResourcesTitle') !!}</h3> 
                <p>
                    {!! text('HumanResourcesBrief') !!}
                </p>
            </div> 
            <div class="form-box pb-6"> 
                <div class="form-content">
                    <div class="form-mcontent"> 
                    <div class="text">
                    <h3>{{ text('Jobapplicationform') }}</h3>
                    <p class="">{{ text('Fieldsmarkedwith*') }}</p>
                </div>
                    <form class="formWithPhone" action="{{ localeRoute('JobApplication.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{ text('userName') }}<span>*</span></label>
                                <input type="text" name="userName" class="form-control" placeholder="{{ text('enterName') }}" required> 
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{text('email')}} <span>*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="{{text('email')}}" required> 
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{ text('Telephone') }} <span>*</span></label>
                                <input class="form-control phone-code"  list="datalistOptions" type="text" placeholder="" required>
                                <input type="hidden" name="phone" class="phone-field">
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{ text('TRIdentity') }}</label>
                                <input type="number" class="form-control" name="TRIdentity" placeholder="{{ text('TRIdentity') }}"> 
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{ text('YourAge') }}</label>
                                <input type="number" class="form-control" name="age" placeholder="{{ text('YourAge') }}"> 
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label">{{ text('Gender') }}</label>
                                <div class="select-box">
                                          <select class="nice-select" name="gender">
                                             <option value="Male">{{ text('Male') }}</option>
                                             <option value="Female">{{ text('Female') }}</option> 
                                          </select>
                                       </div>
                            </div>
                            <div class="mb-3 col-md-6 col-lg-8 col-xl-6">
                                <label class="form-label">{{ text('Branch') }}</label>
                                <div class="select-box">
                                    
                                          <select class="nice-select" name="branch">
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                            @endforeach
                                          </select>
                                       </div>
                            </div>
                            <div class="mb-3 col-md-6 col-lg-4 col-xl-3">
                                <label class="form-label ">{{ text('Country') }}</label>
                                <div class="select-box" >
                                          <select class="nice-select" name="country" id="country" >
                                             <option value="">{{text('selectCountry')}}</option>
                                             @foreach ($countries as $code => $country)
                                                <option value="{{ $code }}">{{ $country }}</option>
                                            @endforeach
                                          </select>
                                       </div>
                            </div>
                            <div class="mb-3 col-md-12 col-xl-9">
                                <label class="form-label">{{ text('Address') }}</label>
                                <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="{{ text('Address') }}"></textarea>
                            </div>
                            <div class="mb-3 col-md-12 col-lg-6">
                                <label class="form-label">{{ text('Coverletter') }}</label>
                                <textarea name="coverletter" id="" cols="30" rows="3" class="form-control" placeholder="{{ text('Coverletter') }}"></textarea>
                            </div>
                            <div class="mb-3 col-md-12 col-lg-6">
                                <label class="form-label">{{ text('CV/Resume') }}</label>
                                <div class="file-upload">
                                    <div class="file-content">
                                        <input type="file" name="cv" class="form-control" accept="application/pdf,.doc,.docx"> 
                                        <div class="text">
                                            <h4>{{ text('DragandDrop') }}</h4>
                                            <button>{{ text('Selectfile') }}</button>
                                        </div>
                                    </div>
                                    <span class="alert">
                                    {!! text('FileDescription') !!}
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12 text-center">
                                <button class="btn btn-primary ps-5 pe-5">{{ text('send') }}</button>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div> 
    </div>
    <!-- kvkk-section ==---------------------------- -->
    </div>




@endsection