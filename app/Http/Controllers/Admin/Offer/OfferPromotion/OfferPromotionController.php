<?php

namespace App\Http\Controllers\Admin\Offer\OfferPromotion;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Offer\Offer;
use App\Kraken\Offer\OfferPromotion;

use App\Kraken\Core\Helpers\PictogramManager;

class OfferPromotionController extends Controller
{
    private $pictogramManager;

    public function __construct(PictogramManager $pictogramManager)
    {
        $this->pictogramManager = $pictogramManager;
    }

    public function create($tenantId, $offerId)
    {
        return view('admin.offer.offerpromotion.create', ['tenantId' => $tenantId, 'offerId' => $offerId]);
    }

    public function store(Request $request, $tenantId, $offerId)
    {
        $offer = Offer::findOrFail($offerId);

        $offerPromotion = new OfferPromotion;
        $offerPromotion->fill($request->all());

        $offer->offerPromotions()->save($offerPromotion);

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerPromotion, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferPromotion\OfferPromotionController@show', [$tenantId, $offerId, $offerPromotion->id]);
    }

    public function show($tenantId, $offerId, $id)
    {
        return $this->edit($tenantId, $offerId, $id);
    }

    public function edit($tenantId, $offerId, $id)
    {
        $offerPromotion = OfferPromotion::findOrFail($id);

        return view('admin.offer.offerpromotion.edit', ['offerPromotion' => $offerPromotion, 'tenantId' => $tenantId, 'offerId' => $offerId]);
    }

    public function update(Request $request, $tenantId, $offerId, $id)
    {
        $offerPromotion = OfferPromotion::findOrFail($id);
        $offerPromotion->fill($request->all());

        $offerPromotion->save();

        if ($request->hasFile('pictogram')) {
            $this->pictogramManager->addOrUpdatePictogram($tenantId, $offerPromotion, $request->file('pictogram'));
        }

        return redirect()->action('Admin\Offer\OfferPromotion\OfferPromotionController@show', [$tenantId, $offerId, $id]);
    }

    public function destroy($tenantId, $offerId, $id)
    {
        $offerPromotion = OfferPromotion::findOrFail($id);
        $offerPromotion->delete();

        return redirect()->action('Admin\Offer\OfferController@show', [$tenantId, $offerId]);
    }
}
