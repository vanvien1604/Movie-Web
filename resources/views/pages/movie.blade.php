@extends('index')
@section('content')
<body>
<div class="container">
   <div class="row fullwith-slider"></div>
</div>
<div class="container">
   <div class="row container" id="wrapper">
      <div class="halim-panel-filter">
         <div class="panel-heading">
            <div class="row">
               <div class="col-xs-6">
                  <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{ route('category',[$Movie->Category->slug]) }}">{{ $Movie->Category->title }}</a> » <span><a href="{{ route('country',[$Movie->Country->slug]) }}">{{ $Movie->Country->title }}</a> » <a href="{{ route('genre',[$Movie->Genre->slug]) }}">{{ $Movie->Genre->title }}</a> » <span class="breadcrumb_last" aria-current="page">{{ $Movie->title }}</span></span></span></span></div>
               </div>
            </div>
         </div>
         <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
         </div>
      </div>
      <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         <section id="content" class="test">
            <div class="clearfix wrap-content">
              
               <div class="halim-movie-wrapper">
                  <div class="title-block">
                     <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                        <i class="fa-solid fa-bookmark"></i>
                     </div>
                     <div class="title-wrapper" style="font-weight: bold; margin: 5px 0px 0px -5px;">
                        Bookmark
                     </div>
                  </div>
                  <div class="movie_info col-xs-12">
                     <div class="movie-poster col-md-3">
                        <img class="movie-thumb" src="{{ asset('backend/uploads/Movies/'.$Movie->image) }}" alt="{{ $Movie->title }}">
                        <div class="bwa-content">
                           <div class="loader"></div>
                           <a href="{{ url('xem-phim/'.$Movie->slug.'/tap-'.$episode_tapdau->episode) }}" class="bwac-btn">
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                     </div>
                     <div class="film-poster col-md-9">
                        <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{ $Movie->title }}</h1>
                        <h2 class="movie-title title-2" style="font-size: 12px;">Black Widow (2021)</h2>
                        <ul class="list-info-group">
                           <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                              @if($Movie->chatluong == 0)
                              <span class="text">HD</span>
                              @elseif($Movie->chatluong == 1)
                              <span class="text">FullHD</span>
                              @elseif($Movie->chatluong == 2)
                              <span class="text">HDCam</span>
                              @elseif($Movie->chatluong == 3)
                              <span class="text">Cam</span>
                              @else
                              <span class="text">SD</span>
                              @endif   
                           </span><span class="episode">
                              @if($Movie->ngon_ngu==0)
                              <span class="text">Vietsub</span>
                              @elseif($Movie->ngon_ngu == 1)
                              <span class="text">Thuyết minh</span>
                              @else
                              <span class="text">Tiếng việt</span>
                              @endif</span>    
                           </span></li>
                           <li class="list-info-group-item"><span>Thời lượng</span> : 133 Phút</li>
                           <li class="list-info-group-item"><span>Tập phim</span> : 
                           @if ($Movie->thoucphim == 'phimbo')
                              {{ $episode_current_list_count }}/{{ $Movie->sotap }} - 
                              @if ($episode_current_list_count == $Movie->sotap)
                                 Hoàn thành
                              @else
                                 Đang cập nhật
                              @endif
                           @else
                               FullHD HD
                           @endif   
                           
                           </li>
                           <li class="list-info-group-item"><span>Thể loại</span> : <a href="" rel="category tag">{{ $Movie->Genre->title }}</a></li>
                           <li class="list-info-group-item"><span>Quốc gia</span> : <a href="" rel="tag">{{ $Movie->Country->title }}</a></li>
                           <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li>
                        </ul>
                        <div class="movie-trailer hidden"></div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div id="halim_trailer"></div>
               <div class="clearfix"></div>
               <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="post-38424" class="item-content">
                        Phim <a href="https://phimhay.co/goa-phu-den-38424/">{{ $Movie->title }}</a> - 2021 - {{ $Movie->Country->title }}:
                        <p>{{ $Movie->description }}</p>
                        <h5>Từ Khoá Tìm Kiếm:</h5>
                        <ul>
                           <li>black widow vietsub</li>
                           <li>Black Widow 2021 Vietsub</li>
                           <li>phim black windows 2021</li>
                           <li>xem phim black windows</li>
                           <li>xem phim black widow</li>
                           <li>phim black windows</li>
                           <li>goa phu den</li>
                           <li>xem phim black window</li>
                           <li>phim black widow 2021</li>
                           <li>xem black widow</li>
                        </ul>
                     </article>
                  </div>
               </div>
            </div>
         </section>
         <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
               <div class="section-bar clearfix">
                  <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
               </div>
               <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                  @foreach ($Movielq as $key => $Movie_lq)
                     <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{ route('movie',$Movie_lq->slug) }}" title="Đại Thánh Vô Song">
                              <figure><img class="lazy img-responsive" src="{{ asset('backend/uploads/Movies/'.$Movie_lq->image) }}" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                              <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{ $Movie_lq->title }}</p>
                                    <p class="original_title">Monkey King: The One And Only</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                  @endforeach
                 
               </div>
               <script>
                  jQuery(document).ready(function($) {				
                  var owl = $('#halim_related_movies-2');
                  owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
               </script>
            </div>
         </section>
      </main>
      @include('pages.include.sidebar')
   </div>
</div>
<div class="clearfix"></div>
@endsection