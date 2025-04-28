@extends('layouts.guest')

@section('content')
<div>
    <!-- Galerie -->
    <div class="welcome-img-wrapper">
        <img class="welcome-img" src="{{ asset('storage/images/sasovice.jpeg') }}" alt="Welcome Image">
        <div class="welcome-img-overlay"></div>
    </div>

    <!-- Sekce O obci -->
    <div class="village-info">
        <div class="village-header">
            <h2 class="village-title">Obec Šašovice</h2>
            <p class="village-subtitle">Malebná vesnice v srdci Vysočiny</p>
        </div>

        <div class="village-stats">
            <div class="stat-card">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div class="stat-content">
                    <h3 class="stat-number">142</h3>
                    <p class="stat-label">Obyvatel</p>
                </div>
            </div>

            <div class="stat-card">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <div class="stat-content">
                    <h3 class="stat-number">68</h3>
                    <p class="stat-label">Domů</p>
                </div>
            </div>

            <div class="stat-card">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="stat-content">
                    <h3 class="stat-number">552</h3>
                    <p class="stat-label">m n. m.</p>
                </div>
            </div>
        </div>

        <div class="village-history">
            <div class="history-content">
                <h3 class="history-title">Historie obce</h3>
                <p class="history-text">
                    První písemná zmínka o obci pochází z roku 1350. (víc informací)
                </p>
                <div class="history-highlights">
                    <div class="highlight-item">
                        <span class="highlight-year">1350</span>
                        <span class="highlight-text">První písemná zmínka</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-year">1869</span>
                        <span class="highlight-text">Vznik samosprávy</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-year">2017</span>
                        <span class="highlight-text">Moderní rozvoj</span>
                    </div>
                </div>
            </div>
            <div class="history-image">
                <img src="{{ asset('storage/images/historie.jpg') }}" alt="Historická fotografie">
            </div>
        </div>
    </div>

    <!-- Aktuality -->
    <div class="news-section">
        <h1 class="news-heading">Aktuality</h1>
        
        <div class="news-container">
            <!-- Aktualita 1 -->
            <a href="" class="news-article">
                <svg class="article-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
                <div class="news-meta">
                    <span class="news-category">Kategorie</span>
                    <span class="news-date">Říjen 2023</span>
                </div>
                <h2 class="news-title">Název aktuality</h2>
                <p class="news-excerpt">Zkrácený text aktuality</p>
            </a>
    
            <div class="news-divider"></div>
    
            <!-- Aktualita 2 -->
            <a href="" class="news-article">
                <svg class="article-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
                <div class="news-meta">
                    <span class="news-category">Kategorie</span>
                    <span class="news-date">Říjen 2023</span>
                </div>
                <h2 class="news-title">Lorem ipsum dolor sit amet</h2>
                <p class="news-excerpt">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...</p>
            </a>
        </div>
    
        <a href="#" class="view-all">Zobrazit vše</a>
    </div>
</div>
@endsection