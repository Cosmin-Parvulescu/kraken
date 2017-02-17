@extends('master')

@section('sidebar')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <h2><a href="/offer">{{ $offer->name }}</a></h2>

                    {!! $offer->short !!}
                    {!! $offer->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach($offer->offerCategories as $offerCategory)
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        @include('kraken.offer.offercategory.short', ['offerCategory' => $offerCategory, 'tenant' => $offer->tenant])

                        <div class="row">
                            @foreach($offerCategory->offerItems as $offerItem)
                                <div class="col-lg-6">
                                    @include('kraken.offer.offercategory.offeritem.short', ['offerItem' => $offerItem, 'tenant' => $offer->tenant, 'offerCategory' => $offerCategory])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection