@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offer->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($offer, ['method' => 'PUT', 'action' => ['Admin\Offer\OfferController@update', $tenantId, $offer->id]]) !!}

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

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Categorii</div>

        <div class="panel-body">
            {!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@create', 'Add new', [$tenantId, $offer->id], ['class' => 'btn btn-primary']) !!}
        </div>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <td>Name</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
            @foreach ($offer->offerCategories as $offerCategory)
                <tr>
                    <td>{{ $offerCategory->name }}</td>
                    <td>
                        {!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@edit', 'Edit', [$tenantId, $offer->id, $offerCategory->id], ['class' => 'btn btn-link']) !!}
                        {!! Form::open(['action' => ['Admin\Offer\OfferCategory\OfferCategoryController@destroy', $tenantId, $offer->id, $offerCategory->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Promotii</div>

        <div class="panel-body">
            {!! link_to_action('Admin\Offer\OfferPromotion\OfferPromotionController@create', 'Add new', [$tenantId, $offer->id], ['class' => 'btn btn-primary']) !!}
        </div>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <td>Name</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
            @foreach ($offer->offerPromotions as $offerPromotion)
                <tr>
                    <td>{{ $offerPromotion->name }}</td>
                    <td>{{ $offerPromotion->startDate }}</td>
                    <td>{{ $offerPromotion->endDate }}</td>
                    <td>
                        {!! link_to_action('Admin\Offer\OfferPromotion\OfferPromotionController@edit', 'Edit', [$tenantId, $offer->id, $offerPromotion->id], ['class' => 'btn btn-link']) !!}
                        {!! Form::open(['action' => ['Admin\Offer\OfferPromotion\OfferPromotionController@destroy', $tenantId, $offer->id, $offerPromotion->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection