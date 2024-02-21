<section class="aboutus-section">
    <div class="container">
       <div class="top ">

          <h1>{!! text('institutionalTitle') !!}</h1>

          <p>
            {!! $institutional->homepage_brief !!}
          </p>
       </div>
       <div class="bottom">
          <div class="row">
             <div class="col-md-12 col-lg-6">
               <div class="image">
                  <img class="lazyload" data-src="{{Voyager::image($institutional->homepage_image)}}" alt="">

                  <div class="about-box">
                     <a href="{{ localeRoute('kurumsal.aboutUs') }}">
                        <div class="content">
                           <h3>{{ text('aboutUs') }}</h3>
                           <i class="fa-solid arrow-icon"></i>
                        </div>
                     </a>
                  </div>
               </div>
             </div>
             <div class="col-md-12 col-lg-6 text">
                <div class="row">
                   <div class="left col-sm-12 col-md-12 col-lg-6">
                      <div class="item">
                         <h3>1997</h3>
                         <h4>{{ text('foundedYear') }}</h4>
                         <p><strong>{{ $institutional->founded_year_title }}</strong> <br>{{ $institutional->founded_year_brife }}</p>
                      </div>
                      <div class="item">
                         <h3>{{ $institutional->experience_years	 }}<span>{{text('year')}}</span></h3>
                         <div class="">
                            <h5>{{ text('QualityinHealth') }}</h5>
                            <strong>{{ text('HISTORYANDEXPERIENCE') }}</strong>
                         </div>
                      </div>
                   </div>
                   <div class="right col-sm-12 col-md-12 col-lg-6">
                      <div class="item">
                         <p>{{ text('ExperiencedAcademicStaff') }}</p>
                         <h3>{{ $institutional->teaching_staff }}</h3>
                         <strong>{{ text('TEACHINGSTAFF') }}</strong>
                      </div>
                      <div class="item">
                         <strong>{{ text('EMPLOYEE') }}</strong>
                         <h3>{{ $institutional->employee_count }}</h3>
                      </div>
                   </div>
                </div>

             </div>
          </div>
       </div>
    </div>
 </section>