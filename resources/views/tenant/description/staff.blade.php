@extends('master')

@section('content')
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-12">
            <h2>{{ $staff->name }}</h2>

            {!! $staff->details !!}
        </div>
    </div>
    <div class="row">
        @foreach($staff->staffMembers as $staffMember)
            <div class="col-lg-3">
                <h3 href="{{ $staffMember->name }}">{{ $staffMember->name }}</h3>

                @if($staffMember->pictogram != null)
                    <div>
                        {!! HTML::image('storage/' . $staff->description->tenant->id . '/pictograms/' . $staffMember->pictogram->path, $staffMember->name, ['class' => 'img-thumbnail', 'width' => '100%']) !!}
                    </div>
                @endif

                {!! $staffMember->short !!}
            </div>
        @endforeach
    </div>
@endsection