@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferController@show', 'Offer', [$tenantId, $offerId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Offer\OfferCategory\OfferCategoryController@show', 'OfferCategory', [$tenantId, $offerId, $offerCategory->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($offerCategory, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Offer\OfferCategory\OfferCategoryController@update', $tenantId, $offerId, $offerCategory->id]]) !!}

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
        @if($offerCategory->pictogram != null)
            {!! HTML::image('storage/' . $tenantId . '/pictograms/' . $offerCategory->pictogram->path, $offerCategory->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
        @endif
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Offer Category Items</div>

        <div class="panel-body">
            {!! link_to_action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@create', 'Add new', [$tenantId, $offerId, $offerCategory->id], ['class' => 'btn btn-primary']) !!}
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
            @foreach ($offerCategory->offerItems as $offerItem)
                <tr>
                    <td>{{ $offerItem->name }}</td>
                    <td>
                        {!! link_to_action('Admin\Offer\OfferCategory\OfferItem\OfferItemController@edit', 'Edit', [$tenantId, $offerId, $offerCategory->id, $offerItem->id], ['class' => 'btn btn-link']) !!}
                        {!! Form::open(['action' => ['Admin\Offer\OfferCategory\OfferItem\OfferItemController@destroy', $tenantId, $offerId, $offerCategory->id, $offerItem->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection