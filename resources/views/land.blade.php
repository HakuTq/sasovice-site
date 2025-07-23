@extends('layouts.guest')

@section('content')
<section class="hs-section land" id="calendar-section" style="padding-top: 4rem;">
    <div class="section-container">
        <h2 class="hs-heading">Katastr</h2>
        <div class="panzoom-container">
            <img src="{{ asset('storage/images/hranice.png') }}" alt="Katastr" class="hs-land-image" id="zoomable-image">
        </div>
        <div class="zoom-controls">
            <button class="zoom-in">+</button>
            <button class="zoom-out">-</button>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const elem = document.getElementById('zoomable-image');
    if (elem) {
        const calculateInitialScale = () => {
            const container = elem.parentElement;
            const containerWidth = container.clientWidth;
            const containerHeight = container.clientHeight;
            const imgWidth = elem.naturalWidth;
            const imgHeight = elem.naturalHeight;
            
            const widthRatio = containerWidth / imgWidth;
            const heightRatio = containerHeight / imgHeight;
            
            return Math.min(widthRatio, heightRatio, 1);
        };

        if (elem.complete) {
            initPanzoom();
        } else {
            elem.addEventListener('load', initPanzoom);
        }

        function initPanzoom() {
            const initialScale = calculateInitialScale();
            
            const panzoom = Panzoom(elem, {
                maxScale: 5,
                minScale: initialScale,
                startScale: initialScale,
                step: 0.5,
                contain: 'outside',
                panOnlyWhenZoomed: true
            });

            document.querySelector('.zoom-in')?.addEventListener('click', () => panzoom.zoomIn());
            document.querySelector('.zoom-out')?.addEventListener('click', () => panzoom.zoomOut());

            elem.parentElement.addEventListener('wheel', function(e) {
                e.preventDefault();
                panzoom.zoomWithWheel(e, {
                    smooth: true,
                    force: false
                });
            });

            window.addEventListener('resize', () => {
                const newScale = calculateInitialScale();
                panzoom.setOptions({ minScale: newScale });
                if (panzoom.getScale() < newScale) {
                    panzoom.zoom(newScale, { animate: false });
                }
            });
        }
    }
});
</script>
@endsection
