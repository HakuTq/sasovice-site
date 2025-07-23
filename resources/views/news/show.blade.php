@extends('layouts.guest')

@section('content')

<div class="news-section" style="margin-top: 5rem; min-height: 100vh;">	
    <h1 class="news-heading">{{$newsItem['title']}}</h1>

    <div class="news-show-container">
        <p class="news-show-date">{{ $newsItem['date'] }}</p>
        <div class="news-show-text">{!! $newsItem['text'] !!}</div>
    </div>
</div>
@endsection