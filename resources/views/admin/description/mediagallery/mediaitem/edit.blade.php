@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\MediaGallery\MediaGalleryController@show', 'Media Gallery', [$tenantId, $descriptionId, $mediaGalleryId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\MediaGallery\MediaItemController@show', 'Media Item', [$tenantId, $descriptionId, $mediaGalleryId, $mediaItem->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($mediaItem, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Description\MediaGallery\MediaItemController@update', $tenantId, $descriptionId, $mediaGalleryId, $mediaItem->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Imagine') !!}

        {!! HTML::image('storage/' . $tenantId . '/mediaitems/' . $mediaItem->path, $mediaItem->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}

        {!! Form::file('image') !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection