@extends('layout.app')


@section('content')

   @include('homepage.slider')

   @include('homepage.aboutUs')

   @include('homepage.linksBanner')

   @include('homepage.blog')

   @include('homepage.package')

   @if($campaigns->count() > 0)
     @include('homepage.campaign')
   @endif

   @if($popup)
      <a href="{{Voyager::image($popup->image)}}" class="d-none" data-fancybox id="popup"></a>
   @endif
@endsection
@push('js')
@if($popup)
     <script>
          function getCookie(cname) {
          let name = cname + "=";
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for (let i = 0; i < ca.length; i++) {
               let c = ca[i];
               while (c.charAt(0) == ' ') {
                    c = c.substring(1);
               }
               if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
               }
          }
          return "";
          }
          function setCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
          }
          $(document).ready(function(){
               if({{$popup->type == "always" ? 'true' : 'false'}} || getCookie('popup{{$popup->id}}') != "true"){
                    setTimeout(() => {
                         $("#popup").click();
                         setCookie('popup{{$popup->id}}', 'true', 360);
                    }, 3000);
               }
          });
     </script>
     @endif
@endpush
