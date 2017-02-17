@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\ContactController@show', 'Contact', [$tenantId, $contactId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\Timetable\TimetableController@show', 'Timetable', [$tenantId, $contactId, $timetableId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\Timetable\TimetableItemController@show', 'Timetable Member', [$tenantId, $contactId, $timetableId, $timetableItem->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($timetableItem, ['method' => 'PUT', 'files' => true, 'action' => ['Admin\Contact\Timetable\TimetableItemController@update', $tenantId, $contactId, $timetableId, $timetableItem->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nume') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start_time', 'Data inceput') !!}
        {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end_time', 'Data sfarsit') !!}
        {!! Form::text('end_time', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection