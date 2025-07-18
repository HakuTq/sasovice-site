@extends('layouts.guest')

@section('content')
<!-- Hunting Calendar -->
<section class="hs-section" id="calendar-section" style="padding-top: 4rem;">
    <div class="section-container">
        <h2 class="hs-heading">Myslivecký kalendář</h2>
        <div class="hs-calendar">
            <div class="calendar-controls">
                <div class="current-week">
                    {{ $currentWeekStart->format('d.m.Y') }} - {{ $currentWeekStart->copy()->addDays(6)->format('d.m.Y') }}
                </div>
                <div class="nav-buttons">
                    <button id="prev-week">&lt; Předchozí</button>
                    <button id="next-week">Další &gt;</button>
                </div>
            </div>
            
            <div class="calendar-grid">
                @foreach (['Po', 'Út', 'St', 'Čt', 'Pá', 'So', 'Ne'] as $day)
                <div class="day-header">{{ $day }}</div>
                @endforeach
                
                @foreach ($days as $day)
                <div class="calendar-day {{ $day['date']->isToday() ? 'today current-day' : '' }}">
                    <div class="day-number">
                        {{ $day['date']->day }}. {{ $day['date']->translatedFormat('M') }}
                    </div>
                    
                    <!-- Game list -->
                    <div class="game-list">
                        @foreach ($day['game'] as $species)
                        <div class="game-item" 
                             data-category="{{ $species->category() }}"
                             title="{{ $species->displayName() }} ({{ $species->category() }})">
                            {{ $species->displayName() }}
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Astronomical information -->
                    <div class="astro-info">
                        <div class="sun-info" title="Východ slunce: {{ $day['astro']['sunrise'] }}, Západ slunce: {{ $day['astro']['sunset'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="astro-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="astro-time">{{ $day['astro']['sunrise'] }}</span>
                            <span class="astro-time">{{ $day['astro']['sunset'] }}</span>
                        </div>
                        <div class="moon-info" title="Východ měsíce: {{ $day['astro']['moonrise'] }}, Západ měsíce: {{ $day['astro']['moonset'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="astro-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <span class="astro-time">{{ $day['astro']['moonrise'] }}</span>
                            <span class="astro-time">{{ $day['astro']['moonset'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="calendar-events">
                <h3>Nadcházející akce</h3>
                @foreach ($calendarEvents as $event)
                <div class="event-item">
                    <div class="event-date">{{ $event['date'] }}</div>
                    <div class="event-desc">{{ $event['title'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('prev-week').addEventListener('click', function() {
        const currentMonday = '{{ $currentWeekStart->format("Y-m-d") }}';
        const prevMonday = new Date(currentMonday);
        prevMonday.setDate(prevMonday.getDate() - 7);
        const formatted = prevMonday.toISOString().split('T')[0];
        window.location.href = '{{ route("hunting.association") }}?week=' + formatted + '#calendar-section';
    });

    document.getElementById('next-week').addEventListener('click', function() {
        const currentMonday = '{{ $currentWeekStart->format("Y-m-d") }}';
        const nextMonday = new Date(currentMonday);
        nextMonday.setDate(nextMonday.getDate() + 7);
        const formatted = nextMonday.toISOString().split('T')[0];
        window.location.href = '{{ route("hunting.association") }}?week=' + formatted + '#calendar-section';
    });
</script>
@endsection
