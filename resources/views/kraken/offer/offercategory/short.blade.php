<div class="row">
    <div class="col-lg-12">
        @if(!empty($offerCategory->details))
            <h3>
                @if($offerCategory->pictogram != null)
                    {!! HTML::image('storage/' . $tenant->id . '/pictograms/' . $offerCategory->pictogram->path, $offerCategory->name, ['class' => 'img-thumbnail', 'width' => '32']) !!}
                @endif

                {!! link_to_action('HomeController@offercategory', $offerCategory->name, [$tenant->subdomain, $offerCategory->slug], ['name' => $offerCategory->name]) !!}
            </h3>
        @else
            <h3>
                @if($offerCategory->pictogram != null)
                    {!! HTML::image('storage/' . $tenant->id . '/pictograms/' . $offerCategory->pictogram->path, $offerCategory->name, ['class' => 'img-thumbnail', 'width' => '32']) !!}
                @endif

                <a name="{{ $offerCategory->name }}"></a>{{ $offerCategory->name }}
            </h3>
        @endif

        @if(!empty($offerCategory->short))
            <p>{!! $offerCategory->short !!}</p>
        @endif
    </div>
</div>