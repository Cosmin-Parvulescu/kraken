<?php

namespace App\Http\ViewComposers;

use App\Kraken\Core\Menu\MenuBuilder;
use Illuminate\Contracts\View\View;

class NavbarComposer
{
    private $menuBuilder;

    public function __construct(MenuBuilder $menuBuilder)
    {
        $this->menuBuilder = $menuBuilder;
    }

    public function compose(View $view)
    {
        $tenant = session('tenant');
        $menu = $this->menuBuilder->buildMenu($tenant);

        $view->with('menu', $menu);
    }
}