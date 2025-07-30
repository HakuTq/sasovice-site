@extends('layouts.guest')

@section('content')
<!-- Downloads Section -->
<section class="downloads-section" id="downloads-section" style="padding-top: 4rem;">
    <div class="section-container">
        <h2 class="hs-heading hs-heading--downloads">{{__('Ke stažení')}}</h2>

        <!-- Downloads Categories -->
        <div class="downloads-categories">
            <div class="download-category">
                <h3 class="category-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="category-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    {{__('Dokumenty')}}
                </h3>

                <div class="downloads-grid">
                    @forelse ($files as $file)
                        <div class="download-item">
                            <div class="download-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="download-content">
                                <h4 class="download-title">{{ $file['name'] }}</h4>
                                <p class="download-description">{{ __('Soubor ke stažení') }}</p>
                                <div class="download-meta">
                                    <span class="file-type">{{ strtoupper($file['type']) }}</span>
                                    <span class="file-size">{{ number_format($file['size'] / 1024 / 1024, 2) }} MB</span>
                                    <span class="file-date">{{ __('Aktualizováno') }} {{ $file['last_modified'] }}</span>
                                </div>
                            </div>
                            <a href="{{ $file['path'] }}" class="download-btn" title="{{ __('Stáhnout soubor') }}" download>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    @empty
                        <p>{{ __('Žádné soubory k dispozici.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const downloadBtns = document.querySelectorAll('.download-btn');

    downloadBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            const title = btn.closest('.download-item').querySelector('.download-title').textContent;
            console.log('Stahování souboru: ' + title);
        });
    });

    const downloadItems = document.querySelectorAll('.download-item');

    downloadItems.forEach(item => {
        item.addEventListener('mouseenter', function () {
            const icon = item.querySelector('.download-icon svg');
            if (icon) {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
            }
        });

        item.addEventListener('mouseleave', function () {
            const icon = item.querySelector('.download-icon svg');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0deg)';
            }
        });
    });
});
</script>
@endsection
