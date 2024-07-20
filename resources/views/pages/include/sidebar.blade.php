<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Top Views</span>
             <ul class="halim-popular-tab" role="tablist">
                <li role="presentation" class="active">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                </li>
             </ul>
          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach ($phimhot_sidebar as $key => $hotSidebar)
                <div class="item post-37176">
                   <a href="{{ route('movie',$hotSidebar->slug) }}" title="{{ $hotSidebar->title }}">
                      <div class="item-link">
                         <img src="{{ asset('backend/uploads/Movies/'.$hotSidebar->image) }}" class="lazy post-thumb" alt="{{ $hotSidebar->title }}" title="{{ $hotSidebar->title }}" />
                         <span class="is_trailer">
                            @if($hotSidebar->chatluong == 0)
                            <span class="text">HD</span>
                            @elseif($hotSidebar->chatluong == 1)
                            <span class="text">FullHD</span>
                            @elseif($hotSidebar->chatluong == 2)
                            <span class="text">HDCam</span>
                            @elseif($hotSidebar->chatluong == 3)
                            <span class="text">Cam</span>
                            @else
                            <span class="text">SD</span>
                            @endif
                         </span>
                      </div>
                      <p class="title">{{ $hotSidebar->title }}</p>
                   </a>
                   <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                   <div style="float: left;">
                      <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span>
                   </div>
                </div>
                @endforeach
             </div>
          </div>

       </section>
       <div class="clearfix"></div>
    </div>
 </aside>