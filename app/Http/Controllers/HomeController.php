<?php

namespace App\Http\Controllers;

use App\Kraken\Core\Helpers\ThirdParty\FacebookDataProvider;
use App\Kraken\Offer\OfferCategory;
use App\Kraken\Offer\OfferItem;

class HomeController extends Controller
{
    private $facebookDataProvider;

    public function __construct(FacebookDataProvider $facebookDataProvider)
    {
        $this->facebookDataProvider = $facebookDataProvider;
    }

    public function index()
    {
        $tenant = session('tenant');

        $facebookEmbedLinks = array();
        if (!empty($tenant->facebook)) {
            $facebookPosts = $this->facebookDataProvider->getProfilePosts($tenant->facebook);
            $facebookEmbedLinks = $this->generateFacebookEmbedLinks($tenant->facebook, $facebookPosts);
        }

        return view('tenant.index', ['tenant' => $tenant, 'facebookEmbedLinks' => $facebookEmbedLinks]);
    }

    private function generateFacebookEmbedLinks($profileName, $facebookPosts)
    {
        $facebookEmbedLinks = array();
        foreach ($facebookPosts as $facebookPost) {
            array_push($facebookEmbedLinks, 'https://www.facebook.com/' . $profileName . '/posts/' . explode('_', $facebookPost['id'])[1]);
        }

        return $facebookEmbedLinks;
    }

    public function description()
    {
        $tenant = session('tenant');

        return view('tenant.description.description', ['description' => $tenant->description]);
    }

    public function staff()
    {
        $tenant = session('tenant');

        return view('tenant.description.staff', ['staff' => $tenant->description->staff]);
    }

    public function gallery()
    {
        $tenant = session('tenant');

        return view('tenant.description.gallery', ['gallery' => $tenant->description->gallery]);
    }

    public function offer()
    {
        $tenant = session('tenant');

        return view('tenant.offer.offer', ['offer' => $tenant->offer]);
    }

    public function offercategory($subdomain, $slug)
    {
        $tenant = session('tenant');
        $offerCategory = null;

        foreach ($tenant->offer->offercategories as $category) {
            if ($category->slug == $slug) {
                $offerCategory = $category;
                break;
            }
        }

        $products = $services = array();

        foreach ($offerCategory->offerItems as $offerItem) {
            switch ($offerItem->offerItemType->id) {
                case 1:
                    array_push($products, $offerItem);

                    break;
                case 2:
                    array_push($services, $offerItem);

                    break;
            }
        }

        return view('tenant.offer.offercategory', ['tenant' => $tenant, 'offerCategory' => $offerCategory, 'products' => $products, 'services' => $services]);
    }

    public function offeritem($subdomain, $categorySlug, $slug)
    {
        $tenant = session('tenant');
        $offerCategory = null;

        foreach ($tenant->offer->offerCategories as $category) {
            if ($category->slug == $categorySlug) {
                $offerCategory = $category;
                break;
            }
        }

        $offerItem = null;

        foreach ($offerCategory->offerItems as $offerItem) {
            if ($offerItem->slug == $slug) {
                $offerItem = $offerItem;
                break;
            }
        }

        return view('tenant.offer.offeritem', ['tenant' => $tenant, 'offerItem' => $offerItem]);
    }

    public function contact()
    {
        $tenant = session('tenant');

        return view('tenant.contact.contact', ['contact' => $tenant->contact]);
    }
}