// ULTRA SIMPLE BANNER SLIDER - GUARANTEED TO WORK

console.log('Starting banner slider...');

let slideIndex = 0;
let autoTimer;

window.addEventListener('load', function() {
    console.log('Page loaded, starting slider...');
    setTimeout(setupSlider, 100);
});

function setupSlider() {
    const slides = document.querySelectorAll('.slider .img');
    const dots = document.querySelectorAll('.slider-dot');
    
    console.log('Found', slides.length, 'slides');
    
    if (slides.length === 0) return;
    
    // Dot clicks
    dots.forEach((dot, i) => {
        dot.onclick = () => {
            console.log('Dot', i, 'clicked');
            slideIndex = i;
            updateSlider();
            resetTimer();
        };
    });
    
    // Arrow clicks  
    const prev = document.querySelector('.slider-arrow.prev');
    const next = document.querySelector('.slider-arrow.next');
    
    if (prev) {
        prev.onclick = () => {
            console.log('Previous clicked');
            slideIndex = (slideIndex - 1 + slides.length) % slides.length;
            updateSlider();
            resetTimer();
        };
    }
    
    if (next) {
        next.onclick = () => {
            console.log('Next clicked');
            slideIndex = (slideIndex + 1) % slides.length;
            updateSlider();
            resetTimer();
        };
    }
    
    // Mouse hover
    const wrapper = document.querySelector('.banner-slider-wrapper');
    if (wrapper) {
        wrapper.onmouseenter = () => {
            console.log('Mouse in - pause');
            if (autoTimer) clearInterval(autoTimer);
        };
        
        wrapper.onmouseleave = () => {
            console.log('Mouse out - resume');
            resetTimer();
        };
    }
    
    // Initial display
    updateSlider();
    
    // Start auto
    resetTimer();
    
    console.log('Slider setup complete');
}

function updateSlider() {
    const slides = document.querySelectorAll('.slider .img');
    const dots = document.querySelectorAll('.slider-dot');
    
    console.log('Updating to slide', slideIndex);
    
    // Update slides
    slides.forEach((slide, i) => {
        if (i === slideIndex) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });
    
    // Update dots
    dots.forEach((dot, i) => {
        if (i === slideIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
    
    // Update progress
    const progress = document.querySelector('.banner-progress-bar');
    if (progress) {
        progress.style.width = '0%';
        let width = 0;
        const interval = setInterval(() => {
            width += 2;
            progress.style.width = width + '%';
            if (width >= 100) clearInterval(interval);
        }, 100);
    }
}

function resetTimer() {
    console.log('Resetting auto timer...');
    
    if (autoTimer) {
        clearInterval(autoTimer);
    }
    
    autoTimer = setInterval(() => {
        console.log('AUTO ADVANCE from', slideIndex);
        const slides = document.querySelectorAll('.slider .img');
        slideIndex = (slideIndex + 1) % slides.length;
        updateSlider();
        console.log('AUTO ADVANCE to', slideIndex);
    }, 5000);
    
    console.log('Auto timer set, ID:', autoTimer);
}

// Compatibility
window.changeSlide = function(dir) {
    console.log('changeSlide', dir);
    const slides = document.querySelectorAll('.slider .img');
    if (dir > 0) {
        slideIndex = (slideIndex + 1) % slides.length;
    } else {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
    }
    updateSlider();
    resetTimer();
};

console.log('Script loaded'); 