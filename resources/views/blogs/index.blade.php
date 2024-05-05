@extends('layout.app')

@section('content')

    <style>
        .alphabet-navigation {
            background-color: white;
            padding: 10px 5px;
            display: flex;
            justify-content: space-around;
            -webkit-box-shadow: -6px 9px 19px 0px rgba(179, 179, 179, 0.7);
            -moz-box-shadow: -6px 9px 19px 0px rgba(179, 179, 179, 0.7);
            box-shadow: -6px 9px 19px 0px rgba(179, 179, 179, 0.7);
            text-align: justify;
            overflow: hidden;
            margin: 10px 0px 30px 0px;

        }

        .single-letter {
            font-size: 30px;
            color: #6a6a6a;
            transition: all 100ms;
            display: inline-block;
        }


        .single-letter:hover {
            transform: scale(1.2);
        }

        .blog-post-letters a {
            color: #6a6a6a;
        }

        .blog-post-letters {
            position: relative;
        }

        .blog-post-letters ul {
            margin-top: 40px;
        }

        .blog-post-letters li {
            margin-bottom: 10px;
        }

        .blog-post-letters span {
            font-size: 30px;
            display: block;
            position: absolute;
            left: -22px;
            top: 17px;
            color: #ada6b4;
            text-transform: lowercase;
        }

        .text-wrapper {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 54px;
            line-height: 18px;
        }


        @media only screen and (max-width: 900px) {

            .alphabet-navigation {
                flex-wrap: wrap;
                padding: 20px;
            }

            .single-letter {
                letter-spacing: 20px;
                font-size: 20px;
            }


            .blog-post-letters span {
                left: 10px;
                top: -5px;

            }

        }


    </style>

    <div class="main-section">
        <section class="blogpage-section">
            <div class="container">

                {{ Breadcrumbs::render('blogs.index') }}

                <div class="boxes">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="main-box col-md-12 col-xl-12">
                                <div class="row container">
                                    <div class="text col-md-6 col-xl-9">
                                        <h1>{{ text('blogs') }}</h1>
                                    </div>
                                </div>

                                <div class="small-box">
                                    <div class="row">
                                        @foreach($allBlogs->translate(app()->getLocale()) as $blog)
                                                <div class="item col-md-4">
                                                    <div class="content">
                                                        <div class="image">
                                                            <img src="{{Voyager::image($blog->thumbnail_image)}}"
                                                                 alt="{{$blog->title}}">
                                                        </div>
                                                        <div class="text">
                                                            <div class="head">
                                                                @foreach ($blog->categories->translate(app()->getLocale()) as $category)

                                                                    <a href="{{ localeRoute('blogs.index', ['slug' => $category->slug]) }}"
                                                                       class="btn-{{$category->color}}">{{$category->title}}</a>

                                                                @endforeach
                                                            </div>

                                                            <h4>
                                                                <a href="{{ localeRoute('blogs.show', $blog->slug) }}"> {{$blog->title}} </a>
                                                            </h4>

                                                            <p class="text-wrapper">
                                                                {{$blog->brief}}
                                                            </p>
                                                            <div class="more">
                                                                <a href="{{ localeRoute('blogs.show', $blog->slug) }}"> {{text('read_more')}} </a>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <img src="{{asset('img/icon/bclock.png')}}" alt="">
                                                                    <span>{{ formatDate($blog->date) }}</span>
                                                                </li>
                                                                <li>
                                                                    <img src="{{asset('img/icon/edit.png')}}" alt="">
                                                                    <a href="{{ localeRoute('author.show',$blog->author->translate(app()->getLocale())->slug) }}"><span>{{ $blog->author->name }}</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                    </div>


                                    {{-- {{$blogs->withQueryString()->onEachSide(2)->links()}} --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
