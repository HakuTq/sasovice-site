@extends('layouts.guest')

@section('content')

<div class="news-section" style="margin-top: 5rem; min-height: 100vh;">	
    @if (app()->getLocale() === 'de')
        <h1 class="news-heading">{{ $newsItem['title.de'] ?? $newsItem['title'] }}</h1>
    @else
        <h1 class="news-heading">{{ $newsItem['title'] }}</h1>
    @endif

    <div class="news-show-container">
        <p class="news-show-date">{{ $newsItem['date'] }}</p>
        @if (app()->getLocale() === 'de')
            <div class="news-show-text">{!! $newsItem['text.de'] ?? $newsItem['text'] !!}</div>
        @else
            <div class="news-show-text">{!! $newsItem['text'] !!}</div>
        @endif
    </div>
</div>
@endsection