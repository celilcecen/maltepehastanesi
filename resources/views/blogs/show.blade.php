@extends('layout.app')
@section('content')
<div class="main-section">
    <section class="blog-detay tup-bebek-section" >
        <div class="container">
            <div class="row"> 
                {{ Breadcrumbs::render('blogs.show', $blog) }} 
                
                <div class="col-md-12 col-xl-8 text-content">
                    
                    

                    <div class="page-content">
                        <div class="blog-content1 text">
                            <h1>{{$blog->title}}</h1>
                            <div class="details">
                            <ul>
                            <li>
                                <img src="{{asset('img/icon/clock.png')}}" alt="date">
                                <span>{{formatDate($blog->date, true)}}</span>
                            </li>
                            <li>
                                <img src="{{asset('img/icon/edit.png')}}" alt="author">
                                <a href="{{ localeRoute('author.show',$blog->author->translate(app()->getLocale())->slug) }}"><span>{{ $blog->author->translate(app()->getLocale())->name }}</span></a>
                            </li>
                            <li>
                                @foreach ($blog->categories->translate(app()->getLocale()) as $category)
                                
                                    <a href="{{ localeRoute('blogs.index', ['slug' => $category->slug]) }}" class="btn btn-{{$category->color}}">{{$category->title}}</a>
                                @endforeach
                            </li>
                        </ul>
                            </div>
                            <div class="main-image">
                                <img src="{{Voyager::image($blog->cover_image)}}" alt="{{$blog->title}}">
                            </div>
                            {!! $blog->content !!}
                        </div>
                        <div class="haber-pagenation">
                            <div class="left btn-sec">
                                    
                                @if($prevBlog)
                                     
                                        <a href="{{ localeRoute('blogs.show', $prevBlog->translate(app()->getLocale())->slug) }}"><i class='fa-solid chevron-icon-revers'></i></a>
                                     
                                @endif
                                
                            </div>
                            <div class="center">
                                <ul>
                                    @if($contactUs->youtube)<li><a target="_blank" href="{{$contactUs->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>@endif
                                    @if($contactUs->twitter)<li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ localeRoute( 'blogs.show' , $blog->slug ) }}"><i class="fa-brands fa-twitter"></i></a></li>@endif
                                    @if($contactUs->facebook)<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ localeRoute( 'blogs.show' , $blog->slug ) }}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
                                    @if($contactUs->instagram)<li><a target="_blank" href="{{$contactUs->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
                                    @if($contactUs->linkedin)<li><a target="_blank" href="{{$contactUs->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>@endif
                                </ul>
                            </div>
                            <div class="right btn-sec">

                                @if($nextBlog)
                                     
                                        <a href="{{ localeRoute('blogs.show', $nextBlog->translate(app()->getLocale())->slug) }}"><i class='fa-solid chevron-icon'></i></a>
                                     
                                @endif

                            </div>
                        </div> 

                    </div>
                    
                </div>

                <div class="col-md-12 col-xl-4 tup-bebek-section birim-doktorlari doktora-sorun content">
                    @include('layout.doctorQuestionForm')
                    <div class="blogpage-section">
                        <div class="sidebar-search">

                            @include('layout.latestBlogs')
                        </div>
                    </div> 
               </div>
            </div>
            
        </div>
    </section>
  
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    var tocContainer = document.createElement('div');
    tocContainer.className = 'table-of-contents';

    var tocTitle = document.createElement('button');
    tocTitle.className = 'toc-title';
    tocTitle.textContent = 'İçerik Tablosu';
    tocContainer.appendChild(tocTitle);

    var tocList = document.createElement('ul');
    tocList.className = 'toc-list';
    tocContainer.appendChild(tocList);

    document.querySelectorAll('.blog-content1 h2, .blog-content1 h3, .blog-content1 h4').forEach(function(header, index) {
        var anchor = document.createElement('a');
        var id = 'toc-heading-' + index;
        header.id = id;
        anchor.href = '#' + id;
        anchor.textContent = header.textContent;

        var listItem = document.createElement('li');
        listItem.appendChild(anchor);
        tocList.appendChild(listItem);
    });

    var mainImage = document.querySelector('.main-image');
    if (mainImage) {
        mainImage.parentNode.insertBefore(tocContainer, mainImage.nextSibling);
    }

    tocTitle.addEventListener('click', function() {
        tocList.classList.toggle('active');
    });
});

</script>


<style>
    .table-of-contents {
        margin: 20px 0;
    }
    .toc-title {
        background: #f8f8f8;
        border: none;
        padding: 10px;
        width: 100%;
        text-align: left;
        font-size: 18px;
        cursor: pointer;
    }
    .toc-list {
        list-style: none;
        padding: 0;

        margin-top: 10px;
    }
    .toc-list.active {
        display: none;
    }
    .toc-list li a {
        color: #007bff;
        text-decoration: none;
        padding: 5px 0;

    }
    @media (max-width: 768px) {
        .table-of-contents {
            padding: 0 15px;
        }
    }
</style>

 
</div>
@endsection




@section('schema')

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "{{$blog->title}}",
      "description": "{{$blog->brief}}",
      "image": "{{Voyager::image($blog->thumbnail_image)}}",  
      "author": {
        "@type": "Person",
        "name": "{{$blog->author->translate(app()->getLocale())->name}}",
        "url": "AuthorURL"
      },  
      "publisher": {
        "@type": "Organization",
        "name": "{{$seo->meta_title}}",
        "logo": {
          "@type": "ImageObject",
          "url": "https://maltepehastanesi.com.tr/storage/contact-us/April2023/ypmicZCnhW4bsxXreJa8.png"
        }
      },
      "datePublished": "{{formatDate($blog->date, true)}}",
      "dateModified": "{{formatDate($blog->date, true)}}"
    }
</script>

@endsection
