    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
    
          <!-- SidebarSearch Form -->
          <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
    
          @if (Auth::id())
        <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item {{ Request::segment(1)== 'Categories' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-layer-group pl-1 pr-2"></i>
                  <p>
                    Danh mục phim
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('Categories.create') }}" class="nav-link">
                      <i class="fa-solid fa-pen-to-square pl-1 pr-2"></i>
                      <p>Thêm mới</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('Categories.index') }}" class="nav-link">
                        <i class="fa-solid fa-bars-staggered pl-1 pr-2"></i>
                        <p>Danh sách</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item {{ Request::segment(1)== 'Genre' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-table-columns pl-1 pr-2"></i>
                  <p>
                    Thể loại
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('Genre.create') }}" class="nav-link">
                        <i class="fa-solid fa-pen-to-square pl-1 pr-2"></i>
                        <p>Thêm mới</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('Genre.index') }}" class="nav-link">
                          <i class="fa-solid fa-bars-staggered pl-1 pr-2"></i>
                          <p>Danh sách</p>
                        </a>
                      </li>
                    </ul>
              </li>
              <li class="nav-item {{ Request::segment(1)== 'Country' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-earth-americas pl-1 pr-2"></i>
                  <p>
                    Quốc gia
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('Country.create') }}" class="nav-link">
                        <i class="fa-solid fa-pen-to-square pl-1 pr-2"></i>
                        <p>Thêm mới</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('Country.index') }}" class="nav-link">
                          <i class="fa-solid fa-bars-staggered pl-1 pr-2"></i>
                          <p>Danh sách</p>
                        </a>
                      </li>
                    </ul>
              </li>
              <li class="nav-item {{ Request::segment(1)== 'Episode' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-table-list pl-1 pr-2"></i>
                  <p>
                    Tập phim
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('Episode.create') }}" class="nav-link">
                        <i class="fa-solid fa-pen-to-square pl-1 pr-2"></i>
                        <p>Thêm mới</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('Episode.index') }}" class="nav-link">
                          <i class="fa-solid fa-bars-staggered pl-1 pr-2"></i>
                          <p>Danh sách</p>
                        </a>
                      </li>
                    </ul>
              </li>
              <li class="nav-item {{ Request::segment(1)== 'Movie' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-clapperboard pl-1 pr-2"></i>
                  <p>
                    Phim
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('Movie.create') }}" class="nav-link">
                        <i class="fa-solid fa-pen-to-square pl-1 pr-2"></i>
                        <p>Thêm mới</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('Movie.index') }}" class="nav-link">
                          <i class="fa-solid fa-bars-staggered pl-1 pr-2"></i>
                          <p>Danh sách</p>
                        </a>
                      </li>
                    </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu --> 
          @endif

        </div>
        <!-- /.sidebar -->
      </aside>