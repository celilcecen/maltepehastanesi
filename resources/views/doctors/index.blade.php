@extends('layout.app')
@section('content')
<div class="main-section">
    <section class="doktor-section" style="background-image: url('{{asset('img/png/banner.png')}}');">
       <div class="content">
          <div class="container">
             <div class="row">
                <div class="col-md-12 col-lg-6 text">
                   <div class="text-content">
                      <h1>{{text('ourDoctors')}}</h1>
                      <p>{{ text('Medical_units_brief') }}</p>
                      <div class="lists">
                         <div class="item col-6 col-sm-6 col-md-6">
                            <div class="image">
                               <img src="{{asset('img/icon/tibbibirim.png')}}" alt="">
                            </div>
                            <div class="textb">
                                <h3>{{$unitsCount}}</h3>
                                <h4>{{text('medicalUnit')}}</h4>
                            </div>
                         </div>
                         <div class="item col-6 col-sm-6 col-md-6">
                            <div class="image">
                               <img src="{{asset('img/icon/kadro.png')}}" alt="">
                            </div>
                            <div class="textb">
                                <h3>163</h3>
                                <h4>{{text('teachingStaff')}}</h4>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="randevu">
                      <h3>{{text('Find_Your_Doctor')}}<a href="{{localeRoute('appointment')}}"> {{text('Create_an_Appointment')}}</a></h3>
                   </div>
                </div>
                <div class="col-md-12 col-lg-6 image">
                   <img src="{{asset('img/png/doktor.png')}}" alt="">
                </div>
             </div>
             <div class="row">
                <div class="filter-bar">
                   <div class="content">
                    <form action="{{localeRoute('doctors.index')}}" method="get" id="doctorsFilterForm">
                        <div class="row">
                           <div class="col-md-5 col-lg-6 item">
                              <label for="">{{text('doctor')}}</label>
                              <div class="search">
                                 <div class="icon">
                                    <img src="{{asset('img/icon/sm-search')}}.png" alt="">
                                 </div>
                                 <div class="type">
                                    <div class="input-group">
                                       <input type="text" class="form-control" name="search" placeholder="{{text('userName')}}" value="{{request()->search}}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-7 col-lg-6 item">
                              <div class="row">
                                 <div class="col-md-8">
                                    <label for="">{{text('medicalUnits')}}</label>
                                    <div class="filter-select">
                                       <div class="icon">
                                          <h6>{{text('A-Z')}}</h6>
                                       </div>
                                       <div class="select-box">
                                          <select class="nice-select" name="unit" id="unitSelect">
                                              <option value="">{{text('all')}}</option>
                                              @foreach ($units as $unit)
                                              <option value="{{$unit->id}}" @if(request()->unit == $unit->id) selected @endif>{{$unit->title}}</option>
                                              @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 filtrele-btn">
                                    <button class="btn btn-primary" type="submit">{{text('filter')}} <span class="icon"><i class="fa-solid fa-arrow-down"></i></span></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>

    <section class="doktor-boxes-section">
      <div class="container">
        <div class="row">
            @foreach ($doctors->translate(app()->getLocale()) as $doctor)
            <div class="col-md-6 col-lg-4 col-xxl-3 item {{$doctor->video ? 'video' : ''}}">
                <div class="content">
                  <div>
                     <div class="image">
                         @if($doctor->video)
                         <div class="video">
                             <a data-fancybox="gallery" href="{{$doctor->video}}">
                             <i class="fa-solid fa-play"></i>
                             </a>
                         </div>
                         @endif
                         <div class="img-content">
                             <img class="rounded-circle" src="{{$doctor->image ? Voyager::image($doctor->image) : asset('img/logo_symbol.png')}}" alt="{{$doctor->name}}">
                         </div>
                     </div>
                     <div class="text">
                         <h3>{{$doctor->title}} {{$doctor->name}}</h3>
                         <p>{!! $doctor->units->translate(app()->getLocale())->sortBy('title')->implode('title', '<br>') !!}</p>
                     </div>
                  </div>
                    <div class="actions">
                        <ul>
                            <li>
                                <a href="{{localeRoute('appointment')}}" class="btn btn-info"><img src="{{asset('img/icon/date.png')}}" alt=""> {{text('takeAppointment')}}</a>
                            </li>
                            <li>
                                <a href="{{localeRoute('doctors.show', ["slug" => $doctor->slug])}}" class="btn btn-secondary">{{text('Detail')}} <span class="icon"><i class="fa-solid arrow-icon"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-container">
            {{$doctors->withQueryString()->onEachSide(2)->links()}}
        </div>

      </div>
    </section>
</div>
@endsection
