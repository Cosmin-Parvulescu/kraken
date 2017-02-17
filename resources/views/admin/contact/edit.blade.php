@extends('admin.master')

@section('breadcrumbs')
    <li>{!! link_to_action('Admin\TenantController@index', 'Tenants', [], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\TenantController@show', 'Tenant', [$tenantId], ['class' => 'btn btn-link']) !!}</li>
    <li>{!! link_to_action('Admin\Contact\ContactController@show', 'Contact', [$tenantId, $contact->id], ['class' => 'btn btn-link']) !!}</li>
@endsection

@section('content')
    {!! Form::model($contact, ['method' => 'PUT', 'action' => ['Admin\Contact\ContactController@update', $tenantId, $contact->id]]) !!}

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

    <div class="form-group">
        {!! Form::label('telephone', 'Telefon') !!}
        {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Modifică', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    @if($contact->timetable != null)
        {!! Form::open(['action' => ['Admin\Contact\Timetable\TimetableController@edit', $tenantId, $contact->id, $contact->timetable->id], 'method' => 'get']) !!} {!! Form::submit('Timetable', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @else
        {!! Form::open(['action' => ['Admin\Contact\Timetable\TimetableController@create', $tenantId, $contact->id], 'method' => 'get']) !!} {!! Form::submit('Add Timetable', ['class' => 'btn btn-link']) !!} {!! Form::close() !!}
    @endif
@endsection