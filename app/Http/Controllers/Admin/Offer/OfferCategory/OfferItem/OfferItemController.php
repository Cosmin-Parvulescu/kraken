<?php

namespace App\Http\Controllers\Admin\Offer\OfferCategory\OfferItem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Offer\OfferCategory;
use App\Kraken\Offer\OfferItemType;
use App\Kraken\Offer\OfferItem;

use App\Kraken\Core\Helpers\PictogramManager;

class OfferItemController extends Controller
{
    private $pictogramManager;

    public function __construct(PictogramManager $pictogramManager)
    {
        $this->pictogramManager = $pictogramManager;
    }

    public function create($tenantId, $offerId, $offerCategoryId)
    {
        $offerItemTypes = array_reduce(OfferItemType::all()->toArray(), function (&$result, $offerItemType) {
            $result[$offerItemType['id']] = $offerItemType['name'];

            return $result;
        }, array());

        return view('admin.offer.offercategory.offeritem.create', ['tenantId' => $tenantId, 'offerId' => $offerId, 'offerCategoryId' => $offerCategoryId, 'offerItemTypes' => $offerItemTypes]);
    }

    public function store(Request $request, $tenantId, $offerId, $offerCategoryId)
    {
        $offerCategory = OfferCategory::findOrFail($offerCategoryId);

        $offerItem = new OfferItem;
        $offerItem->fill($request->all());

        $offerCategory->offerItems()->save($offerItem);

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerItem, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@show', [$tenantId, $offerId, $offerCategoryId, $offerItem->id]);
    }

    public function show($tenantId, $offerId, $offerCategoryId, $id)
    {
        return $this->edit($tenantId, $offerId, $offerCategoryId, $id);
    }

    public function edit($tenantId, $offerId, $offerCategoryId, $id)
    {
        $offerItemTypes = array_reduce(OfferItemType::all()->toArray(), function (&$result, $offerItemType) {
            $result[$offerItemType['id']] = $offerItemType['name'];

            return $result;
        }, array());

        $offerItem = OfferItem::findOrFail($id);

        return view('admin.offer.offercategory.offeritem.edit', ['offerItem' => $offerItem, 'tenantId' => $tenantId, 'offerId' => $offerId, 'offerCategoryId' => $offerCategoryId, 'offerItemTypes' => $offerItemTypes]);
    }

    public function update(Request $request, $tenantId, $offerId, $offerCategoryId, $id)
    {
        $offerItem = OfferItem::findOrFail($id);
        $offerItem->fill($request->all());
        $offerItem->save();

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerItem, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@show', [$tenantId, $offerId, $offerCategoryId, $id]);
    }

    public function destroy($tenantId, $offerId, $offerCategoryId, $id)
    {
        $offerItem = OfferItem::findOrFail($id);
        $offerItem->delete();

        return redirect()->action('Admin\Offer\OfferCategory\OfferCategoryController@show', [$tenantId, $offerId, $offerCategoryId]);
    }
}
