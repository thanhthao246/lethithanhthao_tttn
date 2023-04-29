<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @foreach ($list_menu as $rowmenu)
                <x-menu-item :menu="$rowmenu" />
            @endforeach
        </ul>
        {{-- <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Tải ứng dụng</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <img src="" alt="Hinh">
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">English</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Russian</a>
                </div>
            </li>
        </ul> --}}
    </div>
    <! {{-- <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            @foreach ($list_menu as $row_menu)
                            <li class="nav-item">
                                <a class="nav-link" href="{{$row_menu->link}}">{{$row_menu->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Tìm kiếm"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom--> --}} 
</div>
