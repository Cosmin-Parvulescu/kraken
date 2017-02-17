<?php
namespace App\Kraken\Core\Menu;

class MenuBuilder
{
    private $descriptionMenuBuilder;
    private $offerMenuBuilder;
    private $contactMenuBuilder;

    public function __construct(DescriptionMenuBuilder $descriptionMenuBuilder, OfferMenuBuilder $offerMenuBuilder, ContactMenuBuilder $contactMenuBuilder)
    {
        $this->descriptionMenuBuilder = $descriptionMenuBuilder;
        $this->offerMenuBuilder = $offerMenuBuilder;
        $this->contactMenuBuilder = $contactMenuBuilder;
    }

    public function buildMenu($tenant)
    {
        $brand = new MenuResource;
        $brand->name = $tenant->name;
        $brand->route = '/';

        $menu = new Menu;
        $menu->brand = $brand;

        if ($tenant->description != null) {
            $descriptionMenu = $this->descriptionMenuBuilder->buildMenu($tenant->description);
            array_push($menu->submenus, $descriptionMenu);
        }

        if ($tenant->offer != null) {
            $offerMenu = $this->offerMenuBuilder->buildMenu($tenant->offer);
            array_push($menu->submenus, $offerMenu);
        }

        if ($tenant->contact != null) {
            $contactMenu = $this->contactMenuBuilder->buildMenu($tenant->contact);
            array_push($menu->submenus, $contactMenu);
        }


        return $menu;
    }
}