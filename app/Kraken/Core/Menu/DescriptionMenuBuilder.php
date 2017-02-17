<?php
namespace App\Kraken\Core\Menu;

class DescriptionMenuBuilder
{
    public function buildMenu($description)
    {
        $descriptionMenu = new Submenu;
        $descriptionMenu->name = $description->name;
        $descriptionMenu->route = '/description';

        foreach ($description->subdescriptions as $subdescription) {


            $menuResource = new MenuResource;
            $menuResource->name = $subdescription->name;
            $menuResource->route = '/description#' . $subdescription->slug;

            array_push($descriptionMenu->resources, $menuResource);
        }

        if ($description->staff != null) {
            $menuResource = new MenuResource;
            $menuResource->name = $description->staff->name;
            $menuResource->route = '/description#staff';

            array_push($descriptionMenu->resources, $menuResource);
        }

        if ($description->mediaGallery != null) {
            $menuResource = new MenuResource;
            $menuResource->name = $description->mediaGallery->name;
            $menuResource->route = '/description#gallery';

            array_push($descriptionMenu->resources, $menuResource);
        }

        return $descriptionMenu;
    }
}