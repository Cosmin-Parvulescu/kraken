@extends('master')

@section('sidebar')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <h2>{{ $offerCategory->name }}</h2>

                    {!! $offerCategory->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(!empty($products))
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <h3>Produse</h3>

                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4">
                                    @include('kraken.offer.offercategory.offeritem.short', ['offerItem' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($services))
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <h3>Servicii</h3>

                        <div class="row">
                            @foreach($services as $service)
                                <div class="col-lg-4">
                                    @include('kraken.offer.offercategory.offeritem.short', ['offerItem' => $service])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection