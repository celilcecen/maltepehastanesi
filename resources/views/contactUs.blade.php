@extends('layout.app')
@section('content')
<div class="main-section">
    <section class="randevu-section ">
        <div class="container">
            {{ Breadcrumbs::render('contactUs') }} 

            <div class="randevu-content contact">
                <div class="row">
                    <div class="col-md-12 col-lg-6 text">
                        <h3 class="pt-4"><span>{{text('contact')}}</span></h3>
                        <p>
                        {!! text('contactDescription') !!}
                        </p>
                        <div class="contact-info">
                           <ul>
                              <li>
                                    <div class="icon">
                                          <div class="con">
                                             <img src="{{asset('img/icon/wmail.png')}}" alt="">
                                          </div>
                                    </div>
                                    <div class="text">
                                          <span>{{text('email')}}</span>
                                       <a href="mailTo:{{$contactUs->email}}">
                                          <h4>{{$contactUs->email}}</h4>
                                       </a>
                                    </div>
                              </li> 
                              <li>
                                    <div class="icon">
                                          <div class="con">
                                             <img src="{{asset('img/icon/wphone.png')}}" alt="">
                                          </div>
                                    </div>
                                    <div class="text">
                                          <span>{{text('callCenterAppointment')}}</span>
                                 <a href="Tel:{{str_replace(" ","", $contactUs->phone1)}}">
                                          <h4 class="phone">{{$contactUs->phone1}}</h4>
                                 </a>

                                    </div>
                              </li> 
                              <li>
                                    <div class="icon">
                                          <div class="con">
                                             <img src="{{asset('img/icon/wlike.png')}}" alt="">
                                          </div>
                                    </div>
                                    <div class="text">
                                        <span>{{text('socialMedia')}}</span>
                                        <div class="social">
                                            <ul>
                                                @if($contactUs->youtube)<li><a target="_blank" href="{{$contactUs->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>@endif
                                                @if($contactUs->twitter)<li><a target="_blank" href="{{$contactUs->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>@endif
                                                @if($contactUs->facebook)<li><a target="_blank" href="{{$contactUs->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
                                                @if($contactUs->instagram)<li><a target="_blank" href="{{$contactUs->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
                                                @if($contactUs->linkedin)<li><a target="_blank" href="{{$contactUs->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>@endif
                                            </ul>
                                        </div>
                                    </div>
                              </li> 
                           </ul> 
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="ifram-box">
                        <div class="form-box">
                        <form action="{{ localeRoute('ContactOrder.store') }}" method="POST" class="formWithPhone"> 

                           @csrf

                              <div class="row">
                                 <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                    <label class="form-label">{{ text('name') }}  <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="{{ text('name') }}" name="first_name" required> 
                                 </div>
                                 <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                    <label class="form-label">{{ text('Lastname') }} <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="{{ text('Lastname') }}" name="last_name" required> 
                                 </div>
                                 <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                    <label class="form-label">{{ text('email') }} <span>*</span></label>
                                    <input type="email" class="form-control" placeholder="{{ text('email') }}" name="email"> 
                                 </div>

                                 <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                 <label class="form-label">{{ text('Telephone') }} <span>*</span></label>
                                <input class="form-control phone-code" list="datalistOptions" type="text" placeholder="">
                                <input type="hidden" name="telephone" class="phone-field">
                                 </div>  

                                 <div class="mb-3 ">
                                <label class="form-label">{{ text('Coverletter') }}</label>
                                <textarea id="" cols="30" rows="3" class="form-control" placeholder="{{text('enterMessage')}}" name="cover_letter" required></textarea>
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
                <div class="maps-sec">
                  <div class="row">
                    @foreach ($locations as $location)
                    <div class="col-md-12 col-lg-6 item">
                       <div class="map">
                       <iframe src="{{$location->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                       </div>
                       <div class="text">
                          <h5>{{$location->title}}</h5>
                          <ul class="contact">
                             <li>
                                <div class="icon"><img src="{{asset('img/icon/location-pin.png')}}" alt=""></div>
                                <h4>{{$location->address}}</h4>
                             </li>
                             <li>
                                <div class="icon"><img src="{{asset('img/icon/mail.png')}}" alt=""></div>
                                <a href="mailto:{{$location->email}}"><h4>{{$location->email}}</h4></a>
                             </li>
                          </ul>
                          <div class="help">
                             <div class="top">
                                <h6>{{text('helpAndSupport')}}</h6>
                             </div>
                             <div class="bottom">
                                <ul>
                                    @foreach (explode("|", $location->phones) as $phone)
                                    <li>
                                       @if($loop->first)<div class="icon"><img src="{{asset('img/icon/noun-phone.png')}}" alt=""></div> @endif
                                       <a href="Tel:{{str_replace(" ","", $phone)}}">
                                            <h4>{{$phone}}</h4>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layout.kvkkModal')
@endsection