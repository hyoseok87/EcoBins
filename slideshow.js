document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const dotsNav = document.querySelector('.carousel-nav');
    const dots = Array.from(dotsNav.children);
    const modal = document.getElementById('modal');
    const modalName = document.getElementById('modal-name');
    const modalDescription = document.getElementById('modal-description');
    const closeModalButton = document.querySelector('.close');

    let slideWidth = slides[0].getBoundingClientRect().width;
    let currentIndex = 0;

    const setSlidePosition = (slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    };

    slides.forEach(setSlidePosition);

    const moveToSlide = (track, currentSlide, targetSlide) => {
        track.style.transition = 'transform 0.5s ease-in-out';
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
        const targetSlide = slides[targetIndex];
        const targetDot = dots[targetIndex];

        moveToSlide(track, currentSlide, targetSlide);
        updateDots(currentDot, targetDot);
        blurSlides(targetSlide);

        currentIndex = targetIndex;
    };

    setInterval(moveToNextSlide, 3000); // 3 Sekunden für automatische Slide

    const openModal = (name, description) => {
        modalName.innerText = name;
        modalDescription.innerText = description;
        modal.style.display = 'block';
    };

    const closeModal = () => {
        modal.style.display = 'none';
    };

    // JSON 파일을 불러와서 설명 데이터를 설정
    fetch('descriptions.json')
        .then(response => response.json())
        .then(descriptions => {
            slides.forEach(slide => {
                const button = slide.querySelector('.kontakt-button');
                if (button) {
                    button.addEventListener('click', () => {
                        const id = button.getAttribute('data-id');
                        const name = descriptions[id].name;
                        const description = descriptions[id].description;
                        openModal(name, description);
                    });
                }
            });
        });

    closeModalButton.addEventListener('click', closeModal);

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
