document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const dotsNav = document.querySelector('.carousel-nav');
    const dots = Array.from(dotsNav.children);

    let slideWidth = slides[0].getBoundingClientRect().width;
    let currentIndex = 0;

    // 슬라이드 복제하여 무한 루프 구현
    const firstSlide = slides[0].cloneNode(true);
    const lastSlide = slides[slides.length - 1].cloneNode(true);
    track.appendChild(firstSlide);
    track.insertBefore(lastSlide, slides[0]);

    const setSlidePosition = (slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    };

    const updateSlidePositions = () => {
        const updatedSlides = Array.from(track.children);
        updatedSlides.forEach(setSlidePosition);
    };

    slides.forEach(setSlidePosition);
    updateSlidePositions();

    const moveToSlide = (track, currentSlide, targetSlide, instant = false) => {
        if (instant) {
            track.style.transition = 'none';
        } else {
            track.style.transition = 'transform 0.5s ease-in-out';
        }
        track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
        currentSlide.classList.remove('active');
        targetSlide.classList.add('active');
    };

    const updateDots = (currentDot, targetDot) => {
        currentDot.classList.remove('active');
        targetDot.classList.add('active');
    };

    const blurSlides = (currentSlide) => {
        slides.forEach(slide => {
            if (slide !== currentSlide) {
                slide.classList.add('inactive');
            } else {
                slide.classList.remove('inactive');
            }
        });
    };

    dotsNav.addEventListener('click', e => {
        const targetDot = e.target.closest('button');

        if (!targetDot) return;

        const currentSlide = track.querySelector('.active');
        const currentDot = dotsNav.querySelector('.active');
        const targetIndex = dots.findIndex(dot => dot === targetDot);
        const targetSlide = slides[targetIndex];

        moveToSlide(track, currentSlide, targetSlide);
        updateDots(currentDot, targetDot);
        blurSlides(targetSlide);

        currentIndex = targetIndex;
    });

    const moveToNextSlide = () => {
        const currentSlide = track.querySelector('.active');
        const currentDot = dotsNav.querySelector('.active');
        let targetIndex = (currentIndex + 1) % slides.length;
        const targetSlide = track.children[targetIndex];
        const targetDot = dots[targetIndex % dots.length];

        moveToSlide(track, currentSlide, targetSlide);

        if (targetIndex === slides.length) {
            setTimeout(() => {
                track.style.transition = 'none';
                track.style.transform = 'translateX(-' + slides[0].style.left + ')';
                currentSlide.classList.remove('active');
                slides[0].classList.add('active');
                currentIndex = 0;
            }, 500);
        } else {
            updateDots(currentDot, targetDot);
            blurSlides(targetSlide);
            currentIndex = targetIndex;
        }
    };

    setInterval(moveToNextSlide, 3000); // 3초마다 자동 슬라이드

    window.addEventListener('resize', () => {
        slideWidth = slides[0].getBoundingClientRect().width;
        updateSlidePositions();
    });
});
