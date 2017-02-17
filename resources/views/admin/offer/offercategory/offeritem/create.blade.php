@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@show', 'Category', [$tenantId, $offerId, $offerCategoryId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@create', 'New Offer Item', [$tenantId, $offerId, $offerCategoryId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Offer\OfferItem, ['files' => true, 'action' => ['Admin\Offer\OfferCategory\OfferItem\OfferItemController@store', $tenantId, $offerId, $offerCategoryId]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Pret') !!}
        <input id="price" name="price" class="form-control" type="number" step="0.01">
    </div>

    <div class="form-group">
        {!! Form::label('offer_item_type_id', 'Tip de ofertă') !!}
        {!! Form::select('offer_item_type_id', $offerItemTypes, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('short', 'Rezumat') !!}
        {!! Form::textarea('short', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tag-uri') !!}
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Pictogramă') !!}
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection