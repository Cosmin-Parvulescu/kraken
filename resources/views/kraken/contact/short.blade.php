@if($contact != null)
    <div class="row">
        <div class="col-lg-12">
            @include('kraken.contact.map')
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <address>
                        <p><abbr title="Telefon">TEL</abbr> {{ $contact->telephone }}</p>

                        <p><abbr title="E-Mail">MAIL</abbr> <a
                                    href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </address>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @if(!empty($contact->short))
                {!! $contact->short !!}
            @endif
        </div>
    </div>
@endif