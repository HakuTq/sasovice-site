@extends('layouts.guest')

@section('content')
    <div class="gallery">
        <div class="gallery-container">
            @forelse ($categories as $category)
                <h2>{{ ucfirst($category['name']) }}</h2>
                <div class="image-grid">
                    @forelse ($category['images'] as $image)
                        <img src="{{ $image }}" loading="lazy">
                    @empty
                        <div class="no-images">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="no-images-text">No images available in this category</p>
                        </div>
                    @endforelse
                </div>
            @empty
                <div class="no-images">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="no-images-text">No gallery images available</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="gallery-modal" id="galleryModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeGalleryModal()">&times;</button>
            <img id="modalImage" src="" alt="Gallery image">
        </div>
    </div>

<script>
    let currentImageUrl = null;

    function closeGalleryModal() {
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('modalImage');

        modal.classList.remove('active');
        modalImage.src = '';
        currentImageUrl = null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.image-grid img');
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('modalImage');

        images.forEach(img => {
            img.addEventListener('click', function() {
                currentImageUrl = this.src;
                modalImage.src = this.src;
                modalImage.alt = this.alt;
                modal.classList.add('active');
            });
        });

        modalImage.addEventListener('click', function() {
            if (currentImageUrl) {
                window.open(currentImageUrl, '_blank');
                closeGalleryModal();
            }
        });

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeGalleryModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeGalleryModal();
            }
        });
    });
</script>


@endsection