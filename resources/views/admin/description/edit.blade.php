@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $description->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($description, ['method' => 'PUT', 'action' => ['Admin\Description\DescriptionController@update', $tenantId, $description->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
        <div class="panel-heading">Subdescrieri</div>

        <div class="panel-body">
            {!! Form::open(['action' => ['Admin\Description\SubdescriptionController@create', $tenantId, $description->id], 'method' => 'get']) !!} {!! Form::submit('Add new', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
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
            @foreach ($description->subdescriptions as $subdescription)
                <tr>
                    <td>{{ $subdescription->name }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\Description\SubdescriptionController@edit', $tenantId, $description->id, $subdescription->id], 'method' => 'get']) !!} {!! Form::submit('Edit', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                        {!! Form::open(['action' => ['Admin\Description\SubdescriptionController@destroy', $tenantId, $description->id, $subdescription->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h2>Modules</h2>
    @if($description->staff != null)
        {!! Form::open(['action' => ['Admin\Description\Staff\StaffController@edit', $tenantId, $description->id, $description->staff->id], 'method' => 'get']) !!} {!! Form::submit('Staff', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @else
        {!! Form::open(['action' => ['Admin\Description\Staff\StaffController@create', $tenantId, $description->id], 'method' => 'get']) !!} {!! Form::submit('Add Staff', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @endif

    @if($description->mediaGallery != null)
        {!! Form::open(['action' => ['Admin\Description\MediaGallery\MediaGalleryController@edit', $tenantId, $description->id, $description->mediaGallery->id], 'method' => 'get']) !!} {!! Form::submit('Media Gallery', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @else
        {!! Form::open(['action' => ['Admin\Description\MediaGallery\MediaGalleryController@create', $tenantId, $description->id], 'method' => 'get']) !!} {!! Form::submit('Add Media Gallery', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @endif
@endsection