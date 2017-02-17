@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\SubdescriptionController@create', 'New Subdescription', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Description\Subdescription, ['action' => ['Admin\Description\SubdescriptionController@store', $tenantId, $descriptionId]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection