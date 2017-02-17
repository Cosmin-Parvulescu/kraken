@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Tenants</div>

        <div class="panel-body">
            {!! Form::open(['action' => ['Admin\TenantController@create'], 'method' => 'get']) !!} {!! Form::submit('Add new', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
        </div>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <td>Name</td>
                <td>Subdomain</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->subdomain }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\TenantController@edit', $tenant->id], 'method' => 'get']) !!} {!! Form::submit('Edit', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                        {!! Form::open(['action' => ['Admin\TenantController@destroy', $tenant->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection