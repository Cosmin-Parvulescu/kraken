@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferPromotion\OfferPromotionController@show', 'OfferPromotion', [$tenantId, $offerId, $offerPromotion->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($offerPromotion, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Offer\OfferPromotion\OfferPromotionController@update', $tenantId, $offerId, $offerPromotion->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start_date', 'Data inceput') !!}
        {!! Form::input('date', 'start_date', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end_date', 'Data sfarsit') !!}
        {!! Form::input('date', 'end_date', \Carbon\Carbon::now()->addDays(3)->toDateString(), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Pictogramă') !!}
        @if($offerPromotion->pictogram != null)
            {!! HTML::image('storage/' . $tenantId . '/pictograms/' . $offerPromotion->pictogram->path, $offerPromotion->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
        @endif
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection