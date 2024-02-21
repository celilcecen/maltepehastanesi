<div class="box en-son-yazilar desktop">
    <div class="title">
       <h3>{{text('Latest_Posts')}}</h3>
    </div>
    <div class="content">

      @foreach ($latest_blogs as $blog)
         

       <div class="item">
          <div class="content">
             <div class="box-head">

                  @foreach ($blog->categories->translate(app()->getLocale()) as $category)
                     <a href="{{ localeRoute('blogs.index', ['slug' => $category->slug]) }}" class="btn-{{$category->color}}">{{$category->title}}</a>
                  @endforeach
                

                <h3><a href="{{ localeRoute('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                <div class="share">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#{{ $blog->slug }}"><i class="fa-solid fa-share-nodes"></i></a>
                </div>
             </div>
             <div class="box-content">
                <p>
                   {{$blog->brief}}
                </p>
             </div>
             <div class="box-footer">
                <ul>
                   <li>
                      <img src="{{ asset('img/icon/clock.png') }}" alt="">
                      <span>{{formatDate($blog->date,true)}}</span>
                   </li>
                   <li>
                      <img src="{{ asset('img/icon/edit.png') }}" alt="">
                      <a href="{{ localeRoute('author.show',$blog->author->translate(app()->getLocale())->slug) }}"><span>{{ $blog->author->translate(app()->getLocale())->name }}</span></a>
                   </li>
                </ul>
                <div class="action">
                   <a href="{{ localeRoute('blogs.show', $blog->slug) }}"><i class="fa-solid arrow-icon"></i></a>
                </div>
             </div>
          </div>
       </div>

       @endforeach

    </div>
    @foreach ($latest_blogs as $blog)
         <div class="modal fade" id="{{ $blog->slug }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body pt-0">
                        <div class="form-box pb-0">
                           <div class="form-content">
                              <div class="form-mcontent no-bg">
                                    <div class="sec-title">
                                          <h3>{{ text('share_social') }} : </h3>
                                          <h4>{{ $blog->title }}</h4>
                                          {!! $shareBtns[$blog->id] !!}
                                    </div>
                                    
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
   @endforeach
 </div> 

 <div class="box en-son-yazilar mobile">
    <div class="title">
       <h3> <a href="{{ localeRoute('blogs.show', $blog->slug) }}">{{ text('Latest_Posts') }}</a></h3>
    </div>
    <div class="content">
       <div class="owl-carousel owl-theme" id="blog-sm-slider">

         @foreach ($latest_blogs as $blog)
         
            <div class="item">
               <div class="content">
                  <div class="box-head">

                     @foreach ($blog->categories->translate(app()->getLocale()) as $category)
                        <a href="" class="btn-{{$category->color}}">{{$category->title}}</a>
                     @endforeach

                     <h3> <a href="{{ localeRoute('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>

                     <div class="share">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#m-{{ $blog->slug }}"><i class="fa-solid fa-share-nodes"></i></a>
                     </div>
      

                  </div>

                  <div class="box-content">
                     <p>
                        {{$blog->brief}}
                     </p>
                  </div>
                  <div class="box-footer">
                     <ul>
                        <li>
                           <img src="{{ asset('img/icon/clock.png') }}" alt="">
                           <span>{{formatDate($blog->date,true)}}</span>
                        </li>
                        <li>
                           <img src="{{ asset('img/icon/edit.png') }}" alt="">
                           <span>{{$blog->author->translate(app()->getLocale())->name}}</span>
                        </li>
                     </ul>
                     <div class="action">
                        <a href="{{ localeRoute('blogs.show', $blog->slug) }}"><i class="fa-solid arrow-icon"></i></a>
                     </div>
                  </div>
               </div>
            </div> 

         @endforeach

         
      
       </div> 
       @foreach ($latest_blogs as $blog)
         <div class="modal fade" id="m-{{ $blog->slug }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body pt-0">
                        <div class="form-box pb-0">
                           <div class="form-content">
                              <div class="form-mcontent no-bg">
                                    <div class="sec-title">
                                          <h3>{{ text('share_social') }} : </h3>
                                          <h4>{{ $blog->title }}</h4>
                                          {!! $shareBtns[$blog->id] !!}
                                    </div>
                                    
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
   @endforeach
    </div>
 </div>