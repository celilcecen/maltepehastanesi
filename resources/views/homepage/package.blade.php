<section class="package-section">
    <div class="container">
       <div class="row">
          <div class="col-md-12 col-lg-6 item">
             <div class="image col-6 col-md-6">
                <img class="lazyload" data-src="{{asset('img/packege2.png')}}" alt="">
             </div>
             <div class="links col-6 col-md-6">
                <div class="top">
                   <h3>{{ text('FEMALE_CHECKUP_PACKAGES') }}</h3>
                   <div class="img">
                      <img class="lazyload" data-src="{{asset('img/icon/neww.png')}}" alt="">
                   </div>
                </div>

                <div class="list">
                   <ul>

                     @foreach ($checkup_types->where('gender', 'Female') as $checkup_type)
                        <li>
                           <a href="{{ localeRoute('checkups.show',$checkup_type->slug) }}">{{ $checkup_type->title }}<i class="fa-solid chevron-icon"></i></a>
                        </li>
                     @endforeach

                   </ul>
                </div>

             </div>
          </div>
          <div class="col-md-12 col-lg-6 item">
             <div class="image col-6 col-md-6">
                <img class="lazyload" data-src="{{asset('img/packege1.png')}}" alt="">
             </div>
             <div class="links col-6 col-md-6">
                <div class="top">
                   <h3>{{ text('MENS_CHECKUP_PACKAGES') }}</h3>
                   <div class="img">
                      <img class="lazyload" data-src="{{asset('img/icon/neww2.png')}}" alt="">
                   </div>
                </div>
                <div class="list">
                   <ul>

                     @foreach ($checkup_types->where('gender', 'Male') as $checkup_type)
                        <li>
                           <a href="{{ localeRoute('checkups.show',$checkup_type->slug) }}">{{ $checkup_type->title }}<i class="fa-solid chevron-icon"></i></a>
                        </li>
                     @endforeach

                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>