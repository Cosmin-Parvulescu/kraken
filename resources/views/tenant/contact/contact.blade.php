@extends('master')

@section('sidebar')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <h2>{{ $contact->name }}</h2>

                    {!! $contact->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <address>
                                <p><abbr title="Telefon">TEL</abbr> {{ $contact->telephone }}</p>

                                <p><abbr title="E-Mail">MAIL</abbr> <a
                                            href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                            </address>
                        </div>

                        <div class="col-lg-12">
                            <iframe width="100%" height="500" frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJv-R3aDv_sUARBj21DdkfUnY&key=AIzaSyB2XnqHEysLQ_RnO5WWui9UU3BSWXJSKms"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection