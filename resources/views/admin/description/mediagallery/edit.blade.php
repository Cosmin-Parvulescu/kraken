@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\MediaGallery\MediaGalleryController@show', 'Media Gallery', [$tenantId, $descriptionId, $mediaGallery->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($mediaGallery, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Description\MediaGallery\MediaGalleryController@update', $tenantId, $descriptionId, $mediaGallery->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Imagini') !!}

        {!! Form::file('images[]', ['multiple' => true]) !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <h2>Galerie</h2>

    <div class="row">
        @if($mediaGallery->mediaItems != null)
            @foreach($mediaGallery->mediaItems as $mediaItem)
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-8">
                            {!! HTML::image('storage/' . $tenantId . '/mediaitems/' . $mediaItem->path, $mediaItem->name, ['class' => 'img-thumbnail', 'width' => '100%']) !!}
                        </div>

                        @if(isset($mediaItem->name) && !empty($mediaItem->name))
                            <div class="col-lg-4">
                                <p>Name: <b>{{ $mediaItem->name }}</b></p>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            {!! Form::open(['action' => ['Admin\Description\MediaGallery\MediaItemController@edit', $tenantId, $descriptionId, $mediaGallery->id, $mediaItem->id], 'method' => 'get']) !!} {!! Form::submit('Edit', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                            {!! Form::open(['action' => ['Admin\Description\MediaGallery\MediaItemController@destroy', $tenantId, $descriptionId, $mediaGallery->id, $mediaItem->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection