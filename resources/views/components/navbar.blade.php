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

        @if(request()->routeIs('gallery'))
            <span class="navbar-link active">Galerie</span>
        @else
            <a href="{{ route('gallery') }}" class="navbar-link">Galerie</a>
        @endif
    </div>
</div>