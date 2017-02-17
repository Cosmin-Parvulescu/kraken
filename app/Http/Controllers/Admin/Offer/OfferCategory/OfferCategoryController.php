<?php

namespace App\Http\Controllers\Admin\Offer\OfferCategory;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Offer\Offer;
use App\Kraken\Offer\OfferCategory;

use App\Kraken\Core\Helpers\PictogramManager;

class OfferCategoryController extends Controller
{
    private $pictogramManager;

    public function __construct(PictogramManager $pictogramManager)
    {
        $this->pictogramManager = $pictogramManager;
    }

    public function create($tenantId, $offerId)
    {
        return view('admin.offer.offercategory.create', ['tenantId' => $tenantId, 'offerId' => $offerId]);
    }

    public function store(Request $request, $tenantId, $offerId)
    {
        $offer = Offer::findOrFail($offerId);

        $offerCategory = new OfferCategory;
        $offerCategory->fill($request->all());

        $offer->offerCategories()->save($offerCategory);

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerCategory, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferCategory\OfferCategoryController@show', [$tenantId, $offerId, $offerCategory->id]);
    }

    public function show($tenantId, $offerId, $id)
    {
        return $this->edit($tenantId, $offerId, $id);
    }

    public function edit($tenantId, $offerId, $id)
    {
        $offerCategory = OfferCategory::findOrFail($id);

        return view('admin.offer.offercategory.edit', ['offerCategory' => $offerCategory, 'tenantId' => $tenantId, 'offerId' => $offerId]);
    }

    public function update(Request $request, $tenantId, $offerId, $id)
    {
        $offerCategory = OfferCategory::findOrFail($id);
        $offerCategory->fill($request->all());

        $offerCategory->save();

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerCategory, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferCategory\OfferCategoryController@show', [$tenantId, $offerId, $id]);
    }

    public function destroy($tenantId, $offerId, $id)
    {
        $offerCategory = OfferCategory::findOrFail($id);
        $offerCategory->delete();

        return redirect()->action('Admin\Offer\OfferController@show', [$tenantId, $offerId]);
    }
}
