@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\MediaGallery\MediaGalleryController@create', 'New Media Gallery', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Description\MediaGallery, ['action' => ['Admin\Description\MediaGallery\MediaGalleryController@store', $tenantId, $descriptionId], 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Imagini') !!} {!! Form::file('images[]', ['multiple' => true]) !!}
    </div>

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection