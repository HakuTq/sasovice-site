@extends('layouts.guest')

@section('content')
<div class="hs-wrapper">
    <!-- Image -->
    <div class="welcome-img-wrapper">
        <img class="welcome-img" 
            src="{{ asset('storage/images/forest.jpg') }}" 
            alt="Welcome Image"
            loading="lazy"
            decoding="async">
        <div class="welcome-img-overlay"></div>
        <div>
            <h1 class="welcome-title">Vítejte v honitbě Šašovice</h1>
            <p class="welcome-subtitle">Spolek myslivců a přátel přírody</p>
        </div>
    </div>

    <!-- Info Section -->
    <section class="hs-section">
        <div class="section-container">
            <h1 class="hs-heading">Honební společenstvo Šašovice</h1>
            <div class="hs-info">
                <div class="hs-description">
                    <p>Spolek myslivců působící v katastru obce Šašovice se zaměřením na udržení rovnováhy mezi přírodou a zemědělským využitím krajiny.</p>
                    
                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <strong>Katastrální území:</strong> Šašovice a okolí
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <strong>Založení:</strong> 1952
                        </div>
                    </div>
                </div>
                
                <div class="hs-image-placeholder">
                    <img src="{{ asset('storage/images/main-photo.jpg') }}" 
                         alt="Hunting Image" 
                         class="hs-image"
                         loading="lazy"
                         decoding="async">
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="hs-section">
        <div class="section-container">
            <h2 class="hs-heading">Aktuality</h2>
            <div class="hs-news">
                @foreach ($news as $item)
                    <div class="news-item">
                        <h3 class="news-title">{{ $item['title'] }}</h3>
                        <span class="news-date">{{ $item['date'] }}</span>
                        <p>{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="hs-news-more">
                <a href="{{ route('news') }}" class="hs-link">Zobrazit všechny aktuality</a>
            </div>
        </div>
    </section>

<!-- Hunting Calendar -->
<section class="hs-section" id="calendar-section">
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
    document.addEventListener('DOMContentLoaded', function() {
        const iframe = document.getElementById('map-iframe');
        
        // Fix scrolling issue
        iframe.addEventListener('mouseover', function() {
            document.body.style.overflow = 'hidden';
        });
        
        iframe.addEventListener('mouseout', function() {
            document.body.style.overflow = '';
        });
        
        // Fix iframe height on mobile
        function resizeIframe() {
            if (window.innerWidth < 768) {
                iframe.style.height = '300px';
            } else {
                iframe.style.height = '500px';
            }
        }
        
        // Initial resize
        resizeIframe();
    });

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