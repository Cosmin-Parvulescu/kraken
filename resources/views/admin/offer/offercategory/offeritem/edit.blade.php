@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@show', 'Category', [$tenantId, $offerId, $offerCategoryId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@show', 'Offer Item', [$tenantId, $offerId, $offerCategoryId, $offerItem->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')

    {!! Form::model($offerItem, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Offer\OfferCategory\OfferItem\OfferItemController@update', $tenantId, $offerId, $offerCategoryId, $offerItem->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Pret') !!}
        <input id="price" name="price" class="form-control" type="number" step="0.01" value="{{ $offerItem->price }}">
    </div>

    <div class="form-group">
        {!! Form::label('offer_item_type_id', 'Tip de ofertă') !!}
        {!! Form::select('offer_item_type_id', $offerItemTypes, $offerItem->offerItemType->id, ['class' => 'form-control']) !!}
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
        @if($offerItem->pictogram != null)
            {!! HTML::image('storage/' . $tenantId . '/pictograms/' . $offerItem->pictogram->path, $offerItem->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
        @endif
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection