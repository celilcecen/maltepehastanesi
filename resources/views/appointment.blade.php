@extends('layout.app')

@section('content')

<div class="main-section">
    <!-- haberler-detay ==---------------------------- -->
    <section class="randevu-section">
        <div class="container">
            <div class="page-tree">

                {{ Breadcrumbs::render('appointment') }}

            </div>  
            <div class="randevu-content no-reversed">
                <div class="row">
                    <div class="col-md-12 col-lg-6 text">
                        <h1>{!! text('OnlineRandevu') !!}</h1>
                        <p>
                        {!! text('OnlineRandevuBrief') !!}
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
                                    <a href="tel:{{str_replace(" ","", $contactUs->phone1)}}"><h4 class="phone">{{ $contactUs->phone1 }}</h4></a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ifram-content">
                        <div class="ifram-box" id="pusula-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- haberler-detay ==---------------------------- -->
    </div>


@endsection
@push('js')
<script>
    var strScriptSrc = "//onlinerandevu.maltepehastanesi.com.tr/widget?tek=1&hid=MaltepeUni&hadi=Maltepe Hastanesi&randevu=1&altbtn=0&customcontainerid=pusula-container";

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        // tek : tek hastane mi, şubeli hastane mi
        // hid: hastane id
        // hadi: hasyane adı
        // randevu: 1 veya 0 : randevu işlevi olacak mı olmayacak mı
        // altbtn: alternating buton : resimden oluşan buton için alternatif buton ( resim ) kullan kullanma: 1 veya 0
        // customcontainerid: verilen id deki divin içinde render eder kendini, kulakçık olarak çıkmaz, verilmezse default olarak kulakçık şeklinde çıkar
        js.src = strScriptSrc;
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'pusula-randevu-widget-sdk'));
</script>
@endpush