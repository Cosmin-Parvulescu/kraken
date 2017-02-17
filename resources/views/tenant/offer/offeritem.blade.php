@extends('master')

@section('sidebar')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <h2>{{ $offerItem->offerCategory->name }}</h2>

                    {!! $offerItem->offerCategory->short !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @if($offerItem->pictogram != null)
            <div class="col-lg-12">
                {!! HTML::image('storage/' . $tenant->id . '/pictograms/' . $offerItem->pictogram->path, $offerItem->name, ['class' => 'img-thumbnail', 'width' => 250]) !!}
            </div>
        @endif

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <h2>{{ $offerItem->name }}</h2>

                        {!! $offerItem->details !!}
                    </div>
                </div>
            </div>
    </div>
@endsection