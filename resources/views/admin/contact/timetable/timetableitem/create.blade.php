@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\ContactController@show', 'Contact', [$tenantId, $contactId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\Timetable\TimetableController@show', 'Timetable', [$tenantId, $contactId, $timetableId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\Timetable\TimetableItemController@create', 'New Timetable Member', [$tenantId, $contactId, $timetableId], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model(new App\Kraken\Contact\TimetableItem, ['files' => true, 'action' => ['Admin\Contact\Timetable\TimetableItemController@store', $tenantId, $contactId, $timetableId]]) !!}

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

    {!! Form::submit('Adaugă', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection