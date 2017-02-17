@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenant->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($tenant, ['method' => 'PUT', 'action' => ['Admin\TenantController@update', $tenant->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subdomain', 'Subdomeniu') !!} {!! Form::text('subdomain', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('facebook', 'Facebook') !!}
        {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

    <h2>Modules</h2>
    @if($tenant->description != null)
        {!! link_to_action('Admin\Description\DescriptionController@edit', 'Description', [$tenant->id, $tenant->description->id], ['class' => 'btn btn-link']) !!}
    @else
        {!! link_to_action('Admin\Description\DescriptionController@create', 'Add Description', [$tenant->id], ['class' => 'btn btn-link']) !!}
    @endif

    @if($tenant->offer != null)
        {!! link_to_action('Admin\Offer\OfferController@edit', 'Offer', [$tenant->id, $tenant->offer->id], ['class' => 'btn btn-link']) !!}
    @else
        {!! link_to_action('Admin\Offer\OfferController@create', 'Add Offer', [$tenant->id], ['class' => 'btn btn-link']) !!}
    @endif

    @if($tenant->contact != null)
        {!! link_to_action('Admin\Contact\ContactController@edit', 'Contact', [$tenant->id, $tenant->contact->id], ['class' => 'btn btn-link']) !!}
    @else
        {!! link_to_action('Admin\Contact\ContactController@create', 'Add Contact', [$tenant->id], ['class' => 'btn btn-link']) !!}
    @endif
@endsection