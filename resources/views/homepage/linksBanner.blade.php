<section class="links-banner-section">
    <div class="container">
       <div class="row">
          <div class="owl-carousel owl-theme" id="linksbanner">
             <div class="item">
                <div class="content">
                   <a href="#" data-bs-toggle="modal" data-bs-target="#getWellModal">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b1.png')}}" alt="">
                         </div>
                         <h3>{{ text('getwellsoon') }}</h3>
                      </div>
                   </a>
                </div>
             </div>
             <div class="item">
                <div class="content">
                   <a href="{{localeRoute('kurumsal.show', ["slug" => text('routeContractedInstititions')])}}">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b2.png')}}" alt="">
                         </div>
                         <h3>{{ text('ContractedInstitutions') }}</h3>
                      </div>
                   </a>
                </div>
             </div>
             <div class="item">
                <div class="content">
                   <a href="{{localeRoute('kurumsal.show', ["slug" => text('routePrivateHealthInsurance')])}}">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b3.png')}}" alt="">
                         </div>
                         <h3>{{text('Privatehealthinsurance')}}</h3>
                      </div>
                   </a>
                </div>
             </div>
             <div class="item">
                <div class="content">
                   <a href="{{localeRoute('askForPrice')}}">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b4.png')}}" alt="">
                         </div>
                         <h3>{{text('askForPrice')}}</h3>
                      </div>
                   </a>
                </div>
             </div>
             <div class="item">
                <div class="content">
                   <a href="{{localeRoute('patients.guide')}}">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b5.png')}}" alt="">
                         </div>
                         <h3>{{text('patientGuide')}}</h3>
                      </div>
                   </a>
                </div>
             </div>
             <div class="item">
                <div class="content">
                   <a href="{{localeRoute('checkups.index')}}">
                      <div class="sm-content">
                         <div class="icon">
                            <img class="owl-lazy" data-src="{{asset('img/icon/b6.png')}}" alt="">
                         </div>
                         <h3>{{ text('Appointment') }}</h3>
                      </div>
                   </a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>