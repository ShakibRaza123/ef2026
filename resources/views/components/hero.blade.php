<section
    class="
        relative
        w-full
        overflow-hidden
        bg-black

        /* Mobile & Tablet */
        h-[calc(100svh-64px)]
        mt-[64px]

        /* Desktop */
        lg:h-screen
        lg:mt-0
    ">

    <!-- VIDEO -->
    <video id="heroVideo" autoplay muted loop playsinline
        class="
            absolute inset-0
            w-full h-full
            object-cover
        ">
        <source src="https://pub-d0247e56e5b842aa9e58b7d4adb01047.r2.dev/video/ef-video.mp4" type="video/mp4">
    </video>

    <!-- OPTIONAL OVERLAY -->
    <div class="absolute inset-0 bg-black/20 pointer-events-none"></div>

    <!-- PLAY / PAUSE -->
    <button id="playPauseBtn" class="control-btn absolute bottom-6 left-6 z-20">
        <svg id="pauseIcon" viewBox="0 0 24 24">
            <rect x="6" y="4" width="4" height="16"></rect>
            <rect x="14" y="4" width="4" height="16"></rect>
        </svg>

        <svg id="playIcon" viewBox="0 0 24 24" class="hidden">
            <polygon points="6,4 20,12 6,20"></polygon>
        </svg>
    </button>

    <!-- MUTE -->
    <button id="muteBtn" class="control-btn absolute bottom-6 right-6 z-20">
        <svg id="muteIcon" viewBox="0 0 24 24">
            <path d="M5 9v6h4l5 5V4l-5 5H5z"></path>
            <line x1="19" y1="9" x2="23" y2="15"></line>
            <line x1="23" y1="9" x2="19" y2="15"></line>
        </svg>

        <svg id="soundIcon" viewBox="0 0 24 24" class="hidden">
            <path d="M5 9v6h4l5 5V4l-5 5H5z"></path>
            <path d="M16 8c1.5 1.5 1.5 6.5 0 8"></path>
        </svg>
    </button>

</section>
