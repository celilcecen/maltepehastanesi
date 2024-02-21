@extends('layout.app')

@section('content')

          <style>
.alphabet-navigation {background-color: white;
    padding: 10px 5px;
    display: flex;
    justify-content: space-around;
  -webkit-box-shadow: -6px 9px 19px 0px rgba(179,179,179,0.7);
-moz-box-shadow: -6px 9px 19px 0px rgba(179,179,179,0.7);
box-shadow: -6px 9px 19px 0px rgba(179,179,179,0.7);
      text-align: justify;
    overflow: hidden;
      margin: 10px 0px 30px 0px;

  }
           
.single-letter {font-size:30px; color: #6a6a6a;   transition: all 100ms; display: inline-block;}
           
    
    
.single-letter:hover {
 transform: scale(1.2);
}
            
.blog-post-letters  a{color: #6a6a6a; }
            
.blog-post-letters {position:relative;}

.blog-post-letters ul {margin-top:40px;}
.blog-post-letters li {margin-bottom:10px;}
            
.blog-post-letters span {     font-size: 30px;
    display: block;
    position: absolute;
    left: -22px;
    top: 17px;
    color: #ada6b4;
    text-transform: lowercase; }
            
  
            @media only screen and (max-width: 900px) {
              
              .alphabet-navigation {flex-wrap: wrap;    padding: 20px;}
    
             .single-letter { letter-spacing:20px;
               font-size:20px;}
              
              
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
         
                 <div class="row">
           

                              <div class="title">
                         <h1>{{ text('blogs') }} </h1>
                      </div>
                   
                       <div class="alphabet-navigation">
            @foreach($blogs as $letter => $items)
                <a  class="single-letter" href="#{{ $letter }}">{{ mb_strtoupper($letter, 'UTF-8') }}</a>
            @endforeach
        </div>

        
              
         
         
        {{-- Alfabetik Navigasyon --}}
     
        {{-- Blog Gönderileri --}}
        @foreach($blogs as $letter => $items)
            <section class="blog-post-letters" id="{{ $letter }}">
                <span class="letter-big">{{ $letter }}</span>
                <ul>
                    @foreach($items as $blog)
                        <li>
                         <a href="{{ localeRoute('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                           
                        </li>
                    @endforeach
                </ul>
            </section>
        @endforeach
        </div>
         </div>
    </section>
</div>

@endsection
