@if($description != null)
    <div class="row">
        <div class="col-lg-12">
            <h2><a href="/description">{{ $description->name }}</a></h2>

            {!! $description->short !!}
        </div>

        <div class="col-lg-12">
            <div class="row">
                @foreach($description->subdescriptions as $subdescription)
                    <div class="col-lg-6">
                        @include('kraken.description.subdescription.short', ['subdescription' => $subdescription])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif