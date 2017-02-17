@if($offer != null)
    <div class="row">
        <div class="col-lg-12">
            <h2><a href="/offer">{{ $offer->name }}</a></h2>
        </div>

        <div class="col-lg-12">
            <div class="row">
                @foreach($offer->offerCategories as $offerCategory)
                    <div class="col-lg-6">
                        @include('kraken.offer.offercategory.short', ['offerCategory' => $offerCategory])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif