<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ $menu->brand->route }}">{{ $menu->brand->name }}</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @foreach($menu->submenus as $submenu)
                    @if(!empty($submenu->resources))
                        <li class="dropdown">
                            <a role="button"
                               href="{{ $submenu->route }}">{{ $submenu->name }} <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                @foreach($submenu->resources as $resource)
                                    <li>
                                        <a href="{{ $resource->route }}">{{ $resource->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ $submenu->route }}">{{ $submenu->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>