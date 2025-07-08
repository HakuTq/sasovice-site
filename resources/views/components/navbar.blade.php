<div class="navbar">
    <div class="navbar-left">

        <a href="{{ route('hunting.association') }}">Honební společenstvo Šašovice</a>
    </div>
    <div class="navbar-right">
        @if(request()->routeIs('contact'))
            <span class="navbar-link active">Kontakt</span>
        @else
            <a href="{{ route('contact') }}" class="navbar-link">Kontakt</a>
        @endif
    </div>
</div>