<?php

namespace App\Http\Controllers\Admin\Offer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tenant;
use App\Kraken\Offer\Offer;

class OfferController extends Controller
{
    public function create($tenantId)
    {
        return view('admin.offer.create', ['tenantId' => $tenantId]);
    }

    public function store(Request $request, $tenantId)
    {
        $tenant = Tenant::findOrFail($tenantId);

        $offer = new Offer;
        $offer->fill($request->all());

        $tenant->offer()->save($offer);
        $tenant->modules()->attach(2);

        return redirect()->action('Admin\Offer\OfferController@show', [$tenantId, $tenant->offer->id]);
    }

    public function show($tenantId, $id)
    {
        return $this->edit($tenantId, $id);
    }

    public function edit($tenantId, $id)
    {
        $offer = Offer::findOrFail($id);

        return view('admin.offer.edit', ['offer' => $offer, 'tenantId' => $tenantId]);
    }

    public function update(Request $request, $tenantId, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->fill($request->all());

        $offer->save();

        return redirect()->action('Admin\Offer\OfferController@show', [$tenantId, $id]);
    }

    public function destroy($tenantId, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->action('Admin\TenantController@index');
    }
}