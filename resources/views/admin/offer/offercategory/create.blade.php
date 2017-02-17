@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@create', 'New Offer Category', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Offer\OfferCategory, ['files' => true, 'action' => ['Admin\Offer\OfferCategory\OfferCategoryController@store', $tenantId, $offerId]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
        {!! Form::label('details', 'Pictogramă') !!}
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection