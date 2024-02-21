@if(isset($coverImage) && $coverImage)
<div class="sm-banner">
    <div class="content">
    <div class="banner-image">
        <img src={{Voyager::image($coverImage->image)}} alt="banner_img">
    </div>
        <div class="container">
            <div class="text">
                <h1>{{ $coverImage->text }}</h1>
                @if($coverImage->video)
                <div class="video">
                    <a data-fancybox="gallery" href="{{ $coverImage->video }}">
                    <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif