@extends('index')

@section('content')
<div class="container">
   <div class="row fullwith-slider"></div>
</div>

<div class="container">
   <div class="row container" id="wrapper">
      <!-- Bộ lọc AJAX -->
      <div class="halim-panel-filter">
         <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
         </div>
      </div>

      <!-- Phim Thịnh Hành -->
      <div id="halim_related_movies-2xx" class="wrap-slider">
         <div class="section-bar clearfix">
            <h3 class="section-title"><span>Phim Thịnh Hành</span></h3>
         </div>
         <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film" data-items="5">
            @foreach ($phimhot as $hot)
               <article class="thumb grid-item post-38498">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="{{ $hot->title }}">
                        <figure><img class="lazy img-responsive" src="{{ asset('backend/uploads/Movies/'.$hot->image) }}" alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                        <span class="status">TẬP
                           @if ($hot->thuocphim == 'phimbo')
                                 {{ $hot->episode->first()->episode }}/{{ $hot->sotap }} 
                              @else
                                 {{ $hot->episode->first()->episode }}
                              @endif
                        </span>
                        <span class="episode">
                           <i class="fa fa-play" aria-hidden="true"></i>
                           @if($hot->ngon_ngu == 0)
                              <span class="text">Vietsub</span>
                           @elseif($hot->ngon_ngu == 1)
                              <span class="text">Thuyết Minh</span>
                           @else
                              <span class="text">Tiếng Việt</span>
                           @endif
                        </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title">
                              <p class="entry-title">{{ $hot->title }}</p>
                              <p class="original_title">Monkey King: The One And Only</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
            @endforeach
         </div>
      </div>

      <!-- Kết quả tìm kiếm -->
      <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         @if(isset($Search))
            <section id="halim-advanced-widget-2">
               <div class="section-heading">
                  <span class="h-text">Tìm kiếm: {{ $tk }}</span>
               </div>
               <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                  @if($Search->isEmpty())
                     <p>Không tìm thấy kết quả!</p>
                  @else
                     @foreach($Search as $Mov)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{ route('movie', $Mov->slug) }}">
                              <figure><img class="lazy img-responsive" src="{{ asset('backend/uploads/Movies/'.$Mov->image) }}" alt="{{ $Mov->title }}" title="{{ $Mov->title }}"></figure>
                              @foreach ($Episodes->where('movie_id', $Mov->id) as $epi)
                                 <span class="status">TẬP 
                                    @if ($epi->Movie->thuocphim == 'phimbo')
                                       {{ $epi->episode }}/{{ $epi->Movie->sotap }} 
                                    @else
                                       {{ $epi->episode }}
                                    @endif
                                 </span>
                                 <span class="episode">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                    @if($epi->Movie->ngon_ngu == 0)
                                       <span class="text">Vietsub</span>
                                    @elseif($epi->Movie->ngon_ngu == 1)
                                       <span class="text">Thuyết Minh</span>
                                    @else
                                       <span class="text">Tiếng Việt</span>
                                    @endif
                                 </span>
                              @endforeach
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title">
                                    <p class="entry-title">{{ $Mov->title }}</p>
                                    <p class="original_title">{{ $Mov->description }}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                  @endif
               </div>
            </section>
         @endif
      </main>

      @include('pages.include.sidebar')
   </div>
</div>
<div class="clearfix"></div>
@endsection
