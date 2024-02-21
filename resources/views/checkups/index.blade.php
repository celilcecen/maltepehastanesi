@extends('layout.app')

@section('content')

        <div class="main-section">
            <!-- checkup-kadin ==---------------------------- -->
            <section class="checkup-kadin-section">
            <div class="container">
                <div class="page-tree">
                    
                    {{ Breadcrumbs::render('checkups.index') }}

                </div>
                <div class="top">
                    <div class="row">
                        <div class="left col-md-12 col-xl-8">
                        <h1>{{ text('checkUpTitle') }}</h1>
                        <p>{{ text('checkUpBrief') }}</p>
                        </div>
                        <div class="right col-md-12 col-xl-4">
                        <div class="contact-info ">
                            <ul>
                                <li>
                                    <div class="icon">
                                    <div class="con">
                                        <img loading="lazy" src="{{ asset('img/icon/wphone.png') }}" alt="Phone Icon" width="51" height="51">
                                    </div>
                                    </div>
                                    <div class="text">
                                    <span>{{ text('callCenterAppointment') }}</span>
                                    <a href="tel:{{str_replace(" ", "", $contactUs->phone1)}}">
                                        <h4 class="phone">{{ $contactUs->phone1 }}</h4>
                                    </a>
        
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    @foreach(['Female', 'Male'] as $gender)
                    <div class="row mb-5">
                    @foreach ($checkup_types->where('gender', $gender) as $checkup_type)
                        <div class="item">
                        <div class="content">
                            <div class="image">
                                <img loading="lazy" src={{Voyager::image($checkup_type->thumbnail_image)}} alt="{{ $checkup_type->title}}" width="364" height="360" />
                            </div>
                            <div class="text">
                                <div class="text-content">
                                    <div class="title">
                                    <h3>{{ $checkup_type->title}}</h3>
                                    </div>
                                    <div class="action">
                                    <a href="{{localeRoute('checkups.show', ["slug" => $checkup_type->slug])}}" class="btn btn-{{ $checkup_type->gender == 'Male' ? 'info' : 'secondary' }}">{{ text('review') }} <span class="icon"><i class="fa-solid arrow-icon"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    
                        <div class="checkup-item item">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{ $gender }}">
                                <div class="checkup {{ $checkup_type->gender == 'Male' ? 'male' : '' }}">
                                    <div class="checkup-content">
                                        <h3>{{ text('Appointment') }} </h3>
                                        <img loading="lazy" src="{{ asset('img/icon/date.png') }}" alt="Date Icon" width="38" height="36">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="modal fade" id="{{ $gender }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-box pb-0">
                                            <div class="form-content">
                                                <div class="form-mcontent no-bg">
                                            
                                                    <form action="{{ localeRoute('Appointment.store')}}" method="POST" class="formWithPhone">
                                                       
                                                        @csrf
                                                        
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6 col-lg-6 col-xl-3">
                                                               <label class="form-label">{{ text('name') }}<span>*</span></label>
                                                               <input type="text" class="form-control" placeholder="{{text('name')}}" name="first_name" required> 
                                                            </div>
                                                            <div class="mb-3 col-md-6 col-lg-6 col-xl-3">
                                                               <label class="form-label">{{ text('Lastname') }} <span>*</span></label>
                                                               <input type="text" class="form-control" placeholder="{{text('Lastname')}}" name="last_name" required> 
                                                            </div>
                                                            <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="form-label">{{ text('checkup') }} <span>*</span></label>

                                                                <select class="nice-select" name="checkuptype_id">
                                                                    @foreach ($checkup_types->where('gender', $gender) as $checkup_type)
                                                                        
                                                                   
                                                                          <option value="{{ $checkup_type->id }}">{{ $checkup_type->title }}</option>
                                                                    
                                                                    @endforeach
                                                                 </select> 

                                                             </div>
                                                            <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                                               <label class="form-label">E-mail <span>*</span></label>
                                                               <input type="email" class="form-control" placeholder="{{text('email')}}" name="email"> 
                                                            </div>
                           
                                                            <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="form-label">{{ text('Telephone') }} <span>*</span></label>
                                                           <input class="form-control phone-code" list="datalistOptions" type="text" placeholder="">
                                                           <input type="hidden" name="phone" class="phone-field">
                                                            </div>  
                           
                                                            <div class="mb-3 ">
                                                           <label class="form-label">{{ text('Message') }}</label>
                                                           <textarea id="" cols="30" rows="3" class="form-control" placeholder="{{text('Coverletter')}}" name="message" required></textarea>
                                                       </div>
                                                            <div class="row">
                                                               <div class="mb-3 col-md-8">
                                                                  <div class="form-check">
                                                                     <input class="form-check-input mt-1" type="checkbox" name="acceptance" id="acceptance" required>
                                                                     <label class="form-check-label" for="acceptance">
                                                                     {{ text('contractAgreement') }}
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                               <div class="mb-3 col-md-4 text-end">
                                                                  <button class="btn btn-primary ps-5 pe-5">{{text('submit')}}</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            </section>
            <!-- checkup-kadin ==---------------------------- -->
            </div>

@endsection