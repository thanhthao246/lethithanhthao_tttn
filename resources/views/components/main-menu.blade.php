<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div>
        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                @foreach ($list_menu as $row_menu)
                                    @if ($row_menu->MainMenuSub->count())
                                        <li class="dropdown">
                                            <a href="{{ route('slug.home', ['slug' => $row_menu->link]) }}">
                                                {{ $row_menu->name }}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul role="menu" class="sub-menu">
                                                @foreach ($row_menu->MainMenuSub as $main_menu_sub)
                                                    <li>
                                                        <a
                                                            href="{{ route('slug.home', ['slug' => $main_menu_sub->link]) }}">
                                                            {{ $main_menu_sub->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('slug.home', ['slug' => $row_menu->link]) }}">
                                                {{ $row_menu->name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" id="keywords"
                                    placeholder="Tìm kiếm sản phẩm" />
                                <input type="submit" style="margin-top:0;color:#666" name="search_items"
                                    class="btn btn-primary btn-sm" value="Tìm kiếm">
                                <div id="search_ajax"></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </div>
</div>
