@extends('layout.app')
@section('content')
<div class="main-section">
    <section class="haberler-detay-section">
        <div class="container">
            
            {{ Breadcrumbs::render('news.show', $item) }} 

            <div class="text-content">
                <div class="image-text">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 left-text">
                            <div class="row">
                                <div class="go-back">
                                    <a href="{{url()->previous()}}"><i class="fa-solid chevron-icon-revers"></i></a>
                                    <h3>{{$item->title}}</h3>
                                </div>
                                <h5>{{formatDate($item->date, true)}}</h5>
                            </div>

                            <div class="actions">
                                <ul>
                                    <li>
                                        <img src="{{asset('img/icon/sm-time.png')}}" alt="">
                                        <span>{{$item->time}}</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('img/icon/sm-location.png')}}" alt="">
                                        <span>{{$item->location}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="text">
                                {!! $item->content1 !!}
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 image">
                            <div class="go-back">
                                <a href="{{url()->previous()}}"><i class="fa-solid chevron-icon-revers"></i></a>
                            </div>
                            <img src="{{Voyager::image($item->image)}}" alt="{{$item->title}}">
                        </div>
                    </div>
                </div>
                <div class="text">
                    {!! $item->content2 !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('schema')

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{$item->title}}",
      "description": "{{$item->brief}}",
      "image": "{{Voyager::image($item->image)}}",  
      "author": {
        "@type": "Organization",
        "name": "{{$seo->meta_title}}",
        "url": "https://maltepehastanesi.com.tr"
      },  
      "publisher": {
        "@type": "Organization",
        "name": "{{$seo->meta_title}}",
        "logo": {
          "@type": "ImageObject",
          "url": "https://maltepehastanesi.com.tr/storage/contact-us/April2023/ypmicZCnhW4bsxXreJa8.png"
        }
      },
      "datePublished": "{{formatDate($item->date, true)}}",
      "dateModified": "{{formatDate($item->date, true)}}"
    }
</script>

@endsection
