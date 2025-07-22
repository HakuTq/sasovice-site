<div class="navbar">
    <div class="navbar-left">
        <a href="{{ route('hunting.association') }}" class="navbar-title">
            {{ __('Honební společenstvo Šašovice') }}
        </a>
    </div>

    <!-- Hamburger button -->
    <button class="hamburger" id="hamburger-btn" aria-label="Toggle menu">
        ☰
    </button>

    <!-- Toggleable menu -->
    <div class="navbar-right" id="navbar-menu">
        @if(request()->routeIs('contact'))
            <span class="navbar-link active">{{__('Kontakty')}}</span>
        @else
            <a href="{{ route('contact') }}" class="navbar-link">{{__('Kontakty')}}</a>
        @endif

        @if(request()->routeIs('gallery'))
            <span class="navbar-link active">{{__('Galerie')}}</span>
        @else
            <a href="{{ route('gallery') }}" class="navbar-link">{{__('Galerie')}}</a>
        @endif

        @if(request()->routeIs('calendar'))
            <span class="navbar-link active">{{__('Kalendář')}}</span>
        @else
            <a href="{{ route('calendar') }}" class="navbar-link">{{__('Kalendář')}}</a>
        @endif

        @if(request()->routeIs('land'))
            <span class="navbar-link active">{{__('Honitba')}}</span>
        @else
            <a href="{{ route('land') }}" class="navbar-link">{{__('Honitba')}}</a>
        @endif

        <div class="language-switcher">
            <a href="{{ route('language.switch', 'cs') }}" 
               class="language-link {{ app()->getLocale() == 'cs' ? 'active' : '' }}"
               title="@lang('czech')">CZ</a>
            <a href="{{ route('language.switch', 'de') }}" 
               class="language-link {{ app()->getLocale() == 'de' ? 'active' : '' }}"
               title="@lang('german')">DE</a>
        </div>
    </div>

<script>
    document.getElementById('hamburger-btn').addEventListener('click', function () {
        document.getElementById('navbar-menu').classList.toggle('active');
    });
</script>

</div>
