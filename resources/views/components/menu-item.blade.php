{{-- <div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    @if ($sub == false)
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
        </li>
    @else
        <!--header-bottom-->
        <div class="container">
            <a class="active" href="{{ $menu->link }}" data-toggle="dropdown">{{ $menu->name }}</a>
            <div class="mainmenu pull-left">
                @foreach ($list_menu_sub as $menu_sub)
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a class="active" href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a></li>
                    </ul>
                @endforeach
            </div>
        </div>
    @endif
</div> --}}
