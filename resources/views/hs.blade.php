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
            <h1 class="welcome-title">{{__('Vítejte v honitbě Šašovice')}}</h1>
            <p class="welcome-subtitle">{{__('Spolek myslivců a přátel přírody')}}</p>
        </div>
    </div>

    <!-- Info Section -->
    <section class="hs-section">
        <div class="section-container">
            <h1 class="hs-heading">Honební společenstvo Šašovice</h1>
            <div class="hs-info">
                <div class="hs-description">
                    <p>Honitba má převážně polní charakter, hlavními druhy zvěře jsou srnčí a černá zvěř, ze zvěře drobné se vyskytuje zejména zajíc polní.
                    Myslivci se věnují péči o zvěř a krajinu – pravidelně přikrmují zvěř v období nouze, udržují a budují myslivecká zařízení, zakládají krytová a klidová místa a zajišťují regulaci stavů zvěře, především spárkaté.
                    Společenstvo aktivně spolupracuje s místními obcemi, sbory dobrovolných hasičů i zemědělskými subjekty. Podílí se také na kulturním dění, např. pořádáním poslední leče nebo účastí na dětských dnech.</p>
                    
                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <strong>Katastrální území:</strong> Šašovice a Meziříčko
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <strong>Založení:</strong> 1993
                        </div>
                    </div>

                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM9 9h6m-6 4h6"/>
                        </svg>
                        <div>
                            <strong>Rozloha:</strong> 998 ha
                        </div>
                    </div>

                    <div class="info-item">
                        <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="7" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 21v-2a4 4 0 014-4h4a4 4 0 014 4v2"/>
                        </svg>
                        <div>
                            <strong>Počet členů:</strong> 19
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
            <h2 class="hs-heading hs-heading--news">Aktuality</h2>
            <div class="hs-news">
                @foreach ($news as $item)
                    <a href="{{ route('news.show', $item['id']) }}">
                        <div class="news-item">
                            <h3 class="news-title">{{ $item['title'] }}</h3>
                            <span class="news-date">{{ $item['date'] }}</span>
                            <p>{!! $item['text'] !!}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="hs-news-more">
                <a href="{{ route('news') }}" class="hs-link">Zobrazit všechny aktuality</a>
            </div>
        </div>
    </section>
@endsection