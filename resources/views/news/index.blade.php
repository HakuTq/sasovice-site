@extends('layouts.guest')

@section('content')

<div class="news-section" style="margin-top: 5rem; min-height: 100vh;">	
    <h1 class="news-heading">Aktuality</h1>

    <div class="news-container">
        @forelse($news as $article)
            <a href="{{ route('news.show', $article->id) }}" class="news-article">
                <div class="news-meta">
                    <span class="news-category">{{ $article->category }}</span>
                    <span class="news-date">{{ $article->created_at->translatedFormat('F Y') }}</span>
                </div>
                <h2 class="news-title">{{ $article->title }}</h2>
                <p class="news-excerpt">{{ \Illuminate\Support\Str::limit($article->excerpt, 150) }}</p>
            </a>
            
            @if(!$loop->last)
                <div class="news-divider"></div>
            @endif
        @empty
            <div class="no-articles">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="no-articles-text">Žádné aktuality k dispozici</p>
            </div>
        @endforelse
    </div>

    <div class="pagination-container">
        {{ $news->links() }}
    </div>
</div>
@endsection