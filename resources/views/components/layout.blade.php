<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EggFirst || 2026</title>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <!-- ALPINE JS -->
   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- VITE -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>


<body>

    {{-- HEADER --}}
   @include('partials.header')


    <main class="{{ request()->is('/') ? '' : 'pt-16' }}">
    {{ $slot }}
</main>



    {{-- FOOTER --}}
 @include('partials.footer')

    @livewireScripts


{{-- <script>
    function applyAOS() {
        if (!window.AOS) return;

        const elements = document.querySelectorAll(
            'section, section > div, section article, section h2, section p, section a, ul li, ol li'
        );

        elements.forEach((el, index) => {


            if (el.closest('[data-no-aos]')) return;

            el.removeAttribute('data-aos');
            el.removeAttribute('data-aos-once');

            el.setAttribute('data-aos', 'fade-up');
            el.setAttribute('data-aos-duration', '800');
            el.setAttribute('data-aos-easing', 'ease-out-cubic');
            el.setAttribute('data-aos-delay', Math.min(index * 40, 200));
        });

        AOS.refreshHard();
    }

    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({
            once: false,
            mirror: true,
            offset: 120,
        });

        applyAOS();
    });

    document.addEventListener('livewire:navigated', () => {
        applyAOS();
    });
</script> --}}

</body>

</html>
