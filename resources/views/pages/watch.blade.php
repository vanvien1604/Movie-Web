@extends('index')
@section('content')
<div class="container">
   <div class="row fullwith-slider"></div>
</div>
<div class="container">
<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div class="panel-heading">
         <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{ route('category',[$Movie->Category->slug]) }}">{{ $Movie->Category->title }}</a> » <span><a href="{{ route('country',[$Movie->Country->slug]) }}">{{ $Movie->Country->title }}</a> » <span class="breadcrumb_last" aria-current="page">{{ $Movie->title }}</span></span></span></span></div>
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
            <style type="text/css">
               .iframe_phim iframe{
               width: 100%;
               height: 500px;
               }
            </style>
            <div class="iframe_phim">
               {!! $Episode->linkphim !!}
            </div>
            <div class="button-watch">
               <ul class="halim-social-plugin col-xs-4 hidden-xs">
                  <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
               </ul>
               <ul class="col-xs-12 col-md-8">
                  <div id="autonext" class="btn-cs autonext">
                     <span><i class="fas fa-forward"></i> Autonext: <span id="autonext-status">On</span></span>
                  </div>
                  <div id="explayer" class="hidden-xs"><i class="fas fa-expand"></i>
                     Expand 
                  </div>
                  <div id="toggle-light"><i class="fas fa-adjust"></i>
                     Light Off 
                  </div>
                  <div id="report" class="halim-switch"><i class="fas fa-exclamation-triangle"></i> Report</div>
                  <div class="luotxem"><i class="fas fa-eye"></i>
                     <span>1K</span> lượt xem 
                  </div>
                  <div class="luotxem">
                     <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="fas fa-share-alt"></i> Share</a>
                  </div>
               </ul>
            </div>
            <div class="collapse" id="moretool">
               <ul class="nav nav-pills x-nav-justified">
                  <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                  <div class="fb-save" data-uri="" data-size="small"></div>
               </ul>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="title-block">
               <div class="title-wrapper-xem full">
                  <h1 class="entry-title" style="width: 700px; "><a href="" title="{{ $Movie->title }}" class="tl">{{ $Movie->title }}</a></h1>
               </div>
            </div>
            <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
               <article id="post-37976" class="item-content post-37976"></article>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
               <div id="halim-ajax-list-server"></div>
            </div>
            <div id="halim-list-server">
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="fas fa-server"></i>
                     @if($Movie->ngon_ngu==0)
                     Vietsub
                     @elseif($Movie->ngon_ngu == 1)
                     Thuyết minh
                     @else
                     Tiếng việt
                     @endif
                     </a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                     <div class="halim-server">
                        <ul class="halim-list-eps">
                           @foreach ($Movie->episode as $key => $sotap) 
                           <a href="{{ url('xem-phim/'.$Movie->slug.'/tap-'.$sotap->episode) }}">
                              <li class="halim-episode"><span class="halim-btn halim-btn-2 {{ $tapphim==$sotap->episode ? 'active' : '' }} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="{{ $Movie->title }} - Tập {{ $sotap->episode }} - Be Together - vietsub + Thuyết Minh" data-h1="{{ $Movie->title }} - tập {{ $sotap->episode }}">{{ $sotap->episode }}</span></li>
                           </a>
                           @endforeach
                        </ul>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-bar clearfix">
               <h3 class="section-title"><span>Bình Luận</span></h3>
            </div>
            <div class="htmlwrap clearfix" style="background-color: white">
               {{-- @php
               $Request = Request::url();
               @endphp --}}
               <div class="fb-comments" data-href="http://localhost:8000/" data-width="100%" data-numposts="3" data-colorscheme="light"></div>
            </div>
      </section>
      <section class="related-movies">
      <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
      <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
      @foreach ($Movielq as $key => $Movie_lq)
      <article class="thumb grid-item post-38494">
      <div class="halim-item">
      <a class="halim-thumb" href="{{ route('movie',$Movie_lq->slug) }}" title="Câu Chuyện Kinh Dị Cổ Điển">
      <figure><img class="lazy img-responsive" src="{{ asset('backend/uploads/Movies/'.$Movie_lq->image) }}" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
      <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
      <div class="halim-post-title-box">
      <div class="halim-post-title ">
      <p class="entry-title">{{ $Movie_lq->title }}</p><p class="original_title">A Classic Horror Story</p>
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
         owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600:
         
         
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