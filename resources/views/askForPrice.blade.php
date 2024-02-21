@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- haberler-detay ==---------------------------- -->
    <section class="randevu-section">
       <div class="container">
          <div class="page-tree">

            {{ Breadcrumbs::render('askForPrice') }}

          </div>
          <div class="randevu-content no-reversed">
             <div class="row">
                <div class="col-md-12 col-lg-6 text">
                   <h1>{!! text('GetPrice/Ask') !!}</h1>
                   <p>
                      {!! text('askForPriceBrief') !!}
                   </p>
                   <div class="call">
                      <a href="">
                         <div class="icon">
                            <div class="con">
                               <img src="{{ asset('img/icon/wphone.png') }}" alt="">
                            </div>
                         </div>
                         <div class="text">
                            <span>{{ text('CallCenterRandevu') }}</span>
                            <h4 class="phone">{{ $contactUs->phone1 }}</h4>
                         </div>
                      </a>
                   </div>
                </div>
                <div class="col-md-12 col-lg-6">
                   <div class="ifram-box">
                      <div class="form-box">
                         <form action="{{ localeRoute('Question.store') }}" method="POST" class="formWithPhone">
                            @csrf

                            <div class="row">
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">{{ text('name') }} <span>*</span></label>
                                  <input type="text" name="first_name" class="form-control" placeholder="{{ text('enterName') }}">
                               </div>
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">{{ text('Lastname') }}<span>*</span></label>
                                  <input type="text" name="last_name" class="form-control" placeholder="{{ text('enterlastName') }}">
                               </div>
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">E-mail <span>*</span></label>
                                  <input type="email" name="email" class="form-control" placeholder="@email.com">
                               </div>
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">{{ text('Telephone') }} <span>*</span></label>
                                  <input class="form-control phone-code" list="datalistOptions" type="text" placeholder="">
                                  <input type="hidden" name="phone" class="phone-field">
                               </div>
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">{{ text('MedicalUnit') }}</label>

                                  <div class="select-box">
                                     <select class="nice-select" name="unit_id">
                                        @foreach ($units as $unit)
         
                                            <option value="{{ $unit->id }}">{{ $unit->title }}</option>
           
                                        @endforeach
                                     </select>
                                  </div>

                               </div>
                               <div class="mb-3 col-md-6 col-lg-12 col-xl-6">
                                  <label class="form-label">{{ text('Subject') }}</label>
                                  <div class="select-box">

                                     <select class="nice-select" name="subject_id">
                                        @foreach ($subjects as $subject)
                                            
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>

                                       @endforeach

                                     </select>
                                  </div>

                               </div>
                               <div class="mb-3 col-md-12">
                                  <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="price_request">
                                     <label class="form-check-label" for="flexCheckDefault">
                                        {{ text('askForPriceRequest') }}
                                     </label>
                                  </div>
                               </div>
                               <div class="mb-3 col-md-2 col-sm-3 col-4 col-lg-3">
                                  <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="contact_by_phone">
                                     <label class="form-check-label" for="flexCheckDefault">
                                        {{ text('Telephone') }}
                                     </label>
                                  </div>
                               </div>
                               <div class="mb-3 col-md-2 col-sm-3 col-4 col-lg-3">
                                  <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="contact_by_email">
                                     <label class="form-check-label" for="flexCheckDefault">
                                        E-mail
                                     </label>
                                  </div>
                               </div>
                               <div class="mb-3 col-md-2 col-sm-3 col-4 col-lg-3">
                                  <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="contact_by_sms">
                                     <label class="form-check-label" for="flexCheckDefault">
                                        SMS
                                     </label>
                                  </div>
                               </div>
                               
 
                               <div class="row">
                                  <div class="mb-3 col-md-8">
                                     <div class="form-check">
                                        <input class="form-check-input mt-1" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                           {!! text('contractAgreement') !!}
                                        </label>
                                     </div>
                                  </div>
                                  <div class="mb-3 col-md-4 text-center">
                                     <button class="btn btn-primary ps-5 pe-5">{{ text('send') }}</button>
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
    </section>
    <!-- haberler-detay ==---------------------------- -->
    </div>

@endsection

