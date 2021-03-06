@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\Staff\StaffController@show', 'Staff', [$tenantId, $descriptionId, $staffId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\Staff\StaffMemberController@show', 'Staff Member', [$tenantId, $descriptionId, $staffId, $staffMember->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($staffMember, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Description\Staff\StaffMemberController@update', $tenantId, $descriptionId, $staffId, $staffMember->id]]) !!}

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
        @if($staffMember->pictogram != null)
            {!! HTML::image('storage/' . $tenantId . '/pictograms/' . $staffMember->pictogram->path, $staffMember->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
        @endif
        {!! Form::file('pictogram') !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection