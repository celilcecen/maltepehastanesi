@extends('layout.app')

@section('content')

<div class="main-section">
    <div class="sm-banner">
       <div class="content" >
       <div class="banner-image">
              <img src={{Voyager::image($checkup_type->cover_image)}} alt="{{ $checkup_type->title }}">
          </div>
          <div class="container">
             <div class="text">  
             </div>
          </div>
       </div>
    </div>
       <div class="container">
          <div class="page-tree">

            {{ Breadcrumbs::render('checkups.show',$checkup_type) }}

          </div>
          <div class="kurumsal-text pb-3">
              <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <h1>{{$checkup_type->title}}</h1> 
                    <p>{{ $checkup_type->brief }}</p>
                </div>

                <div class="col-md-12 col-lg-4 col-xl-3 text-end">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#check_form" class="btn btn-{{ $checkup_type->gender == 'Male' ? 'info' : 'secondary' }} mt-4"> {{ text('Appointment') }} <img class="ms-2" src="{{ asset('img/icon/date.png')}}" alt=""></a>
                </div>

                

              </div>               
          </div>
          
          
          <div class="lists-box">
            <div class="row">

            @foreach ($groups as $letter => $groupsbyletter)
                @foreach ($groupsbyletter as $group)
                    
                
                <div class="col-md-4 item">
                    <div class="top">
                        <h3>{{ $group->title }}</h3>
                        <span>{{ $letter }}</span>
                    </div>

                    <div class="bottom">
                        <ul>
                            @foreach ($group->items->translate(app()->getLocale()) as $item)
                            
                                <li>{{ $item->title }}</li>

                            @endforeach
                        </ul>
                    </div>
                </div> 

                @endforeach
              @endforeach
            </div>
          </div> 

       </div>
    </div>


    <div class="modal fade" id="check_form" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                         <label class="form-label">{{ text('name') }}<span>*</span></label>
                                         <input type="text" class="form-control" placeholder="{{text('name')}}" name="first_name" required> 
                                      </div>
                                      <div class="mb-3 col-md-6 col-lg-6 col-xl-6">
                                         <label class="form-label">{{ text('Lastname') }} <span>*</span></label>
                                         <input type="text" class="form-control" placeholder="{{text('Lastname')}}" name="last_name" required> 
                                      </div>
                                      

                                      <div class="mb-3 col-md-6 col-lg-6 col-xl-6" hidden>
                                        <label class="form-label">{{ text('checkup') }} <span>*</span></label>

                                        <select  class="nice-select" name="checkuptype_id">
                                                 <option value="{{ $checkup_type->id }}">{{ $checkup_type->title }}</option>
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

@endsection