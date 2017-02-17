<?php
namespace App\Kraken\Core\Menu;

class OfferMenuBuilder
{
    public function buildMenu($offer)
    {
        $offerMenu = new Submenu;
        $offerMenu->name = $offer->name;
        $offerMenu->route = '/offer';

        if (!empty($offer->offerCategories())) {
            foreach ($offer->offerCategories as $offerCategory) {
                $menuResource = new MenuResource;
                $menuResource->name = $offerCategory->name;
                $menuResource->route = '/offer/' . $offerCategory->slug;

                array_push($offerMenu->resources, $menuResource);
            }
        }

        return $offerMenu;
    }
}