<section class="footer-section">
    <div class="container">
       <div class="row">
          <div class="col-md-6 text">
             <a href="{{localeRoute('contactUs')}}"><h3>{{text('contact')}}</h3></a>
             <div class="info">
                <ul>
                   <li><img class="lazyload" data-src="{{asset('img/icon/location-pin.png')}}" alt="">
                      <p>{{$contactUs->address}}</p>
                   </li>
                   <li><a href="mailto:{{$contactUs->email}}"><img class="lazyload" data-src="{{asset('img/icon/mail.png')}}" alt="">{{$contactUs->email}}</a></li>
                </ul>
             </div>
             <div class="help">
                <h4>{{text('helpAndSupport')}}</h4>
                <ul>
                   <li><a href="tel:{{str_replace(" ","", $contactUs->phone1)}}"><img class="lazyload" data-src="{{asset('img/icon/noun-phone.png')}}" alt=""> <span class="phone">{{$contactUs->phone1}}</span></a></li>
                   <li><a href="tel:{{str_replace(" ","", $contactUs->phone2)}}" class="phone">{{$contactUs->phone2}}</a></li>
                </ul>
             </div>
             <div class="social-media">
                <ul>
                  @if($contactUs->youtube)<li><a target="_blank" href="{{$contactUs->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>@endif
                  @if($contactUs->twitter)<li><a target="_blank" href="{{$contactUs->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>@endif
                  @if($contactUs->facebook)<li><a target="_blank" href="{{$contactUs->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
                  @if($contactUs->instagram)<li><a target="_blank" href="{{$contactUs->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
                  @if($contactUs->linkedin)<li><a target="_blank" href="{{$contactUs->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>@endif
                </ul>
             </div>
             <div class="verigizlik">
                <h3>{{ text('DataPrivacy') }}</h3>
               <ul>
                  @foreach ($pages as $page)
         
                        <li><a href="{{ localeRoute('staticPage', $page->slug) }}">{{ $page->title }}</a></li>
                  @endforeach
               </ul>
             </div>
          </div>
          <div class="col-md-6 right">
             <div class="top">
                <h3>{{ text('MU_Hospital_BULLETIN') }}</h3>
                <p>{!! text('BultenBrief') !!}</p>
                <form action="{{ localeRoute('Bulten.store') }}" method="POST">
                  @csrf
                  <div class="mail-sec">
                     <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="{{ text('Enteryoure-mailaddress') }}">
                        <button>{{ text('Register') }}</button>
                     </div>
                  </div>
                  </form>
             </div>
             <div class="bottom">
               <ul>
               @foreach ($footer_logos as $footer_logo)
               @continue(!$footer_logo->{'white_logo_'.app()->getLocale()})
               <li>
                  <a href="{{ $footer_logo->link }}" target="_blank">
                     <img class="lazyload" data-src={{Voyager::image($footer_logo->{'white_logo_'.app()->getLocale()})}} alt="{{ $footer_logo->link }}">
                  </a>
               </li>
                @endforeach
               </ul>
                <p>{{text('copyright')}}</p>
             </div>

          </div>
       </div>
    </div>
 </section>
 
 @include('homepage.getWellModal')
 @include('homepage.opinionsSuggestions')

 <script src="//cdn.jsdelivr.net/npm/goodshare.js@6/goodshare.min.js"></script>
 <script src="{{asset('lib/jquery/jquery-3.6.0.min.js')}}"></script>
 <script src="{{asset('lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
 <script src="{{asset('lib/bootstrap-5.2.0/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('lib/fancybox/dist/jquery.fancybox.min.js')}}"></script>
 <script src="{{asset('lib/lazysizes/lazysizes.min.js')}}" async></script>
 {{-- <script src="{{asset('lib/select2-4.1.0-rc.0/dist/js/select2.min.js')}}"></script> --}}
 <script src="{{asset('lib/jquery-nice-select-1.1.0/js/jquery.nice-select.js')}}"></script>
 <script src="{{asset('js/toastr.min.js')}}"></script>
 {{-- <script src="{{asset('lib/aos-master/dist/aos.js')}}"></script> --}}
 <script src="{{asset('js/script.js')}}"></script>
 <script src="{{asset('lib/intl-tel-input-master/build/js/intlTelInput-jquery.min.js') }}"></script> 
@if($errors->any())
<script>
   toastr.options.progressBar = true;
   @foreach ($errors->all() as $error)
      toastr.error('{{$error}}');
   @endforeach
</script>
@endif
@if(Session::has('success'))
<script>
   toastr.options.progressBar = true;
   toastr.success('{{Session::get("success")}}');
</script>
@endif
@stack('js')
<script>
   document.addEventListener('DOMContentLoaded', function() {
       var dir = document.documentElement.getAttribute('dir'); 
       
       var chevronIcons = document.querySelectorAll('.chevron-icon');
       chevronIcons.forEach(function(icon) {
           icon.classList.remove('fa-chevron-right', 'fa-chevron-left'); 
           icon.classList.add('fa-solid', dir === 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right'); 
       });

       var chevronIcons = document.querySelectorAll('.chevron-icon-revers');
       chevronIcons.forEach(function(icon) {
           icon.classList.remove('fa-chevron-right', 'fa-chevron-left'); 
           icon.classList.add('fa-solid', dir === 'rtl' ? 'fa-chevron-right' : 'fa-chevron-left'); 
       });

       var chevronIcons = document.querySelectorAll('.arrow-icon');
       chevronIcons.forEach(function(icon) {
           icon.classList.remove('fa-arrow-right', 'fa-arrow-left'); 
           icon.classList.add('fa-arrow', dir === 'rtl' ? 'fa-arrow-left' : 'fa-arrow-right'); 
       });

       
   });
</script>
{!! $seo->body_bottom !!}
</body>

</html>