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
                   <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $cate_slug->title }}</a> » <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                </div>
             </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
          <section>
             <div class="section-bar clearfix">
                <h1 class="section-title"><span>{{ $cate_slug->title }}</span></h1>
             </div>
             <div class="halim_box">
               @foreach ($Movie as $key => $Mov)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{ route('movie',$Mov->slug) }}">
                        <figure><img class="lazy img-responsive" src="{{ asset('backend/uploads/Movies/'.$Mov->image) }}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                        <span class="status">TẬP
                           @if ($Mov->thuocphim == 'phimbo')
                              {{ $Mov->episode->first()->episode }}/{{ $Mov->sotap }} 
                           @else
                              {{ $Mov->episode->first()->episode }}
                           @endif   
                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                           @if($Mov->ngon_ngu==0)
                           <span class="text">Vietsub</span>
                           @elseif($Mov->ngon_ngu == 1)
                           <span class="text">Thuyết Minh</span>
                           @else
                           <span class="text">Tiếng Việt</span>
                           @endif
                        </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{ $Mov->title }}</p>
                              <p class="original_title">{{ $Mov->description }}</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
             
             </div>
             <div class="clearfix"></div>
             <div class="text-center">
                {{-- <ul class='page-numbers'>
                   <li><span aria-current="page" class="page-numbers current">1</span></li>
                   <li><a class="page-numbers" href="">2</a></li>
                   <li><a class="page-numbers" href="">3</a></li>
                   <li><span class="page-numbers dots">&hellip;</span></li>
                   <li><a class="page-numbers" href="">55</a></li>
                   <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
                </ul> --}}
                {!! $Movie->links("pagination::bootstrap-4") !!}
             </div>
          </section>
       </main>
       @include('pages.include.sidebar')
    </div>
 </div>
 <div class="clearfix"></div>
 @endsection