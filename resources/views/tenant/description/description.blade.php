@extends('master')

@section('sidebar')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <h2>{{ $description->name }}</h2>

                    {!! $description->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if($description->subdescriptions)
        <div class="row">
            @foreach($description->subdescriptions as $subdescription)
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">
                            <h2><a name="{{ $subdescription->slug }}"></a>{{ $subdescription->name }}</h2>

                            {!! $subdescription->details !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($description->staff != null)
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <h2><a name="staff"></a>{{ $description->staff->name }}</h2>

                        {!! $description->staff->short !!}

                        @foreach($description->staff->staffMembers as $staffMember)
                            <div class="col-lg-4">
                                <h3 href="{{ $staffMember->name }}">{{ $staffMember->name }}</h3>

                                @if($staffMember->pictogram != null)
                                    <div>
                                        {!! HTML::image('storage/' . $description->tenant->id . '/pictograms/' . $staffMember->pictogram->path, $staffMember->name, ['class' => 'img-thumbnail', 'width' => '100%']) !!}
                                    </div>
                                @endif

                                {!! $staffMember->short !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection