@if($subdescription != null)
    <div class="row">
        <div class="col-lg-12">
            <h3><a href="/description#{{ $subdescription->slug }}">{{ $subdescription->name }}</a></h3>

            {!! $subdescription->short !!}
        </div>
    </div>
@endif