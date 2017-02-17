@extends('master')

@section('sidebar')
    @if(!empty($tenant->facebook))
        <div class="row">
            @foreach($facebookEmbedLinks as $facebookEmbedLink)
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="fb-post" data-href="{{ $facebookEmbedLink }}"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    @include('tenant.short', ['tenant' => $tenant])
                </div>
            </div>
            <div style="margin-top: 10px; margin-bottom: 10px">
                <div class="panel">
                    <div class="panel-body">
                        @include('kraken.description.short', ['description' => $tenant->description])
                    </div>
                </div>
            </div>
            <div style="margin-top: 10px; margin-bottom: 10px">
                <div class="panel">
                    <div class="panel-body">
                        @include('kraken.offer.short', ['offer' => $tenant->offer])
                    </div>
                </div>
            </div>
            <div style="margin-top: 10px; margin-bottom: 10px">
                <div class="panel">
                    <div class="panel-body">
                        @include('kraken.contact.short', ['contact' => $tenant->contact])
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
