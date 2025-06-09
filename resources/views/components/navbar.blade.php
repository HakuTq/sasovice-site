<div class="navbar">
    <div class="navbar-left">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="navbar-logo">
        <a href="{{ route('welcome') }}"> Šašovice </a>
    </div>
    <div class="navbar-right">
        @if(request()->routeIs('welcome'))
            <span class="navbar-link active">Obec</span>
        @else
            <a href="{{ route('welcome') }}" class="navbar-link">Obec</a>
        @endif

        @if(request()->routeIs('hunting.association'))
            <span class="navbar-link active">Honební společenstvo</span>
        @else
            <a href="{{ route('hunting.association') }}" class="navbar-link">Honební společenstvo</a>
        @endif

        @if(request()->routeIs('ff'))
            <span class="navbar-link active">Hasiči</span>
        @else
            <a href="{{ route('ff') }}" class="navbar-link">Hasiči</a>
        @endif
    </div>
</div>