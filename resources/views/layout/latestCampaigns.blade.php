<div class="box en-son-yazilar desktop">
    <div class="title">
       <h3>{{text('Latest_Posts')}}</h3>
    </div>
    <div class="content">

      @foreach ($latest_campaigns as $campaign)
         

       <div class="item">
          <div class="content">
             <div class="box-head">

                

                <h3>{{ $campaign->title }}</h3>
                <div class="share">
                   <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                </div>
             </div>
             <div class="box-content">
                <p>
                   {{$campaign->brief}}
                </p>
             </div>
             <div class="box-footer">
                <ul>
                   <li>
                      <img src="{{ asset('img/icon/clock.png') }}" alt="">
                      <span>{{formatDate($campaign->date,true)}}</span>
                   </li>

                </ul>
                <div class="action">
                   <a href="{{ localeRoute('campaigns.show', $campaign->slug) }}"><i class="fa-solid arrow-icon"></i></a>
                </div>
             </div>
          </div>
       </div>

       @endforeach

    </div>
 </div> 

 <div class="box en-son-yazilar mobile">
    <div class="title">
       <h3>{{ text('Latest_Posts') }}</h3>
    </div>
    <div class="content">
       <div class="owl-carousel owl-theme" id="blog-sm-slider">

         @foreach ($latest_campaigns as $campaign)

            <div class="item">
               <div class="content">
                  <div class="box-head">


                     <h3>{{ $campaign->title }}</h3>

                     <div class="share">
                        <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                     </div>
                  </div>

                  <div class="box-content">
                     <p>
                        {{$campaign->brief}}
                     </p>
                  </div>
                  <div class="box-footer">
                     <ul>
                        <li>
                           <img src="{{ asset('img/icon/clock.png') }}" alt="">
                           <span>{{formatDate($campaign->date,true)}}</span>
                        </li>
                        <li>

                        </li>
                     </ul>
                     <div class="action">
                        <a href=""><i class="fa-solid arrow-icon"></i></a>
                     </div>
                  </div>
               </div>
            </div> 

         @endforeach

          
      
       </div> 
    </div>