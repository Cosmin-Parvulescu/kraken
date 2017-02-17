@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\DescriptionController@show', 'Description', [$tenantId, $descriptionId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Description\Staff\StaffController@show', 'Staff', [$tenantId, $descriptionId, $staff->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($staff, ['method' => 'PUT', 'action' => ['Admin\Description\Staff\StaffController@update', $tenantId, $descriptionId, $staff->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details', 'Detalii') !!}
        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Staff Members</div>

        <div class="panel-body">
            {!! Form::open(['action' => ['Admin\Description\Staff\StaffMemberController@create', $tenantId, $descriptionId, $staff->id], 'method' => 'get']) !!} {!! Form::submit('Add new', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
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
            @foreach ($staff->staffMembers as $staffMember)
                <tr>
                    <td>{{ $staffMember->name }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\Description\Staff\StaffMemberController@edit', $tenantId, $descriptionId, $staff->id, $staffMember->id], 'method' => 'get']) !!} {!! Form::submit('Edit', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                        {!! Form::open(['action' => ['Admin\Description\Staff\StaffMemberController@destroy', $tenantId, $descriptionId, $staff->id, $staffMember->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection