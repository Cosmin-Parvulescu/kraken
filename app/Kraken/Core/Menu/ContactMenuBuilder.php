<?php
namespace App\Kraken\Core\Menu;

class ContactMenuBuilder
{
    public function buildMenu($contact)
    {
        $contactMenu = new Submenu;
        $contactMenu->name = $contact->name;
        $contactMenu->route = '/contact';

        return $contactMenu;
    }
}