@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferPromotion\OfferPromotionController@create', 'New Offer Promotion', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Offer\OfferPromotion, ['files' => true, 'action' => ['Admin\Offer\OfferPromotion\OfferPromotionController@store', $tenantId, $offerId]]) !!}

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
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection