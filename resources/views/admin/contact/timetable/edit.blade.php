@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\ContactController@show', 'Contact', [$tenantId, $contactId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\Timetable\TimetableController@show', 'Timetable', [$tenantId, $contactId, $timetable->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($timetable, ['method' => 'PUT', 'action' => ['Admin\Contact\Timetable\TimetableController@update', $tenantId, $contactId, $timetable->id]]) !!}

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
        <div class="panel-heading">Timetable Items</div>

        <div class="panel-body">
            {!! Form::open(['action' => ['Admin\Contact\Timetable\TimetableItemController@create', $tenantId, $contactId, $timetable->id], 'method' => 'get']) !!} {!! Form::submit('Add new', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
        </div>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <td>Name</td>
                <td>Start time</td>
                <td>End time</td>
            </tr>
            </thead>

            <tbody>

            @foreach ($timetable->timetableItems as $timetableItem)
                <tr>
                    <td>{{ $timetableItem->name }}</td>
                    <td>{{ $timetableItem->start_time }}</td>
                    <td>{{ $timetableItem->end_time }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\Contact\Timetable\TimetableItemController@edit', $tenantId, $contactId, $timetable->id, $timetableItem->id], 'method' => 'get']) !!} {!! Form::submit('Edit', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                        {!! Form::open(['action' => ['Admin\Contact\Timetable\TimetableItemController@destroy', $tenantId, $contactId, $timetable->id, $timetableItem->id], 'method' => 'delete']) !!} {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection