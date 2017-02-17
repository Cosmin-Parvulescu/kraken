<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                @if(!empty($offerItem->details))
                    <h4>{!! link_to_action('HomeController@offeritem', $offerItem->name, [$tenant->subdomain, $offerCategory->slug, $offerItem->slug]) !!}</h4>
                @else
                    <h4>{{ $offerItem->name }}</h4>
                @endif
            </div>

            <div class="col-lg-6">
                @if($offerItem->pictogram != null)
                    <div>
                        {!! HTML::image('storage/' . $tenant->id . '/pictograms/' . $offerItem->pictogram->path, $offerItem->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
                    </div>
                @endif
            </div>

            <div class="col-lg-6">

            </div>
            <div class="col-lg-12">
                @if($offerItem->price != 0)
                    <p>Pret: {{ $offerItem->price }}</p>
                @endif

                {!! $offerItem->short !!}
            </div>
        </div>
    </div>
</div>