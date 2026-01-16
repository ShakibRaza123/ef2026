import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    /* =====================================================
       HERO VIDEO CONTROLS
    ===================================================== */
    const video = document.getElementById('heroVideo');
    const playBtn = document.getElementById('playPauseBtn');
    const playIcon = document.getElementById('playIcon');
    const pauseIcon = document.getElementById('pauseIcon');
    const muteBtn = document.getElementById('muteBtn');
    const muteIcon = document.getElementById('muteIcon');
    const soundIcon = document.getElementById('soundIcon');

    if (video && playBtn && muteBtn) {
        playBtn.addEventListener('click', () => {
            const isPaused = video.paused;
            isPaused ? video.play() : video.pause();
            playIcon.classList.toggle('hidden', !isPaused);
            pauseIcon.classList.toggle('hidden', isPaused);
        });

        muteBtn.addEventListener('click', () => {
            video.muted = !video.muted;
            muteIcon.classList.toggle('hidden', !video.muted);
            soundIcon.classList.toggle('hidden', video.muted);
        });
    }

    /* =====================================================
       LOGO CONTINUOUS SLIDER (SAFE)
    ===================================================== */
    const track = document.getElementById('logoTrack');
    const viewport = document.getElementById('logoViewport');

    if (track && viewport) {
        const original = track.innerHTML;

        while (track.scrollWidth < viewport.offsetWidth * 2) {
            track.innerHTML += original;
        }

        let x = 0;
        let paused = false;
        const speed = 0.8;
        const resetAt = track.scrollWidth / 2;

        track.addEventListener('mouseenter', () => paused = true);
        track.addEventListener('mouseleave', () => paused = false);

        const animate = () => {
            if (!paused) {
                x -= speed;
                if (Math.abs(x) >= resetAt) x = 0;
                track.style.transform = `translate3d(${x}px,0,0)`;
            }
            requestAnimationFrame(animate);
        };

        animate();
    }

    /* =====================================================
       HEADER SCROLL ANIMATION
    ===================================================== */
    const header = document.querySelector('.site-header');
    if (!header) return;

    let lastY = window.scrollY;
    let hidden = false;
    let ticking = false;

    header.style.willChange = 'transform';
    header.style.transition = 'transform 0.45s ease';

    const onScroll = () => {
        if (document.documentElement.classList.contains('overflow-hidden')) {
            header.style.transform = 'translateY(0)';
            hidden = false;
            lastY = window.scrollY;
            ticking = false;
            return;
        }

        const currentY = window.scrollY;

        if (currentY > lastY + 10 && currentY > 80) {
            if (!hidden) {
                header.style.transform = 'translateY(-100%)';
                hidden = true;
            }
        } else if (currentY < lastY - 10) {
            if (hidden) {
                header.style.transform = 'translateY(0)';
                hidden = false;
            }
        }

        lastY = currentY;
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(onScroll);
            ticking = true;
        }
    }, { passive: true });
});
