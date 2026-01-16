@extends('layouts.app')

@section('content')
    <!-- ================= HERO ================= -->
    <section class="bg-black text-white pt-24 sm:pt-28 pb-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <p class="text-[11px] tracking-[0.5em] uppercase text-[#d4af37] mb-6">
                Our Work
            </p>

            <h1 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-semibold leading-tight">
                Stories Crafted With Vision.
                <span class="block text-white/60 mt-2">
                    Experiences Created With Heart.
                </span>
            </h1>

            <p
                class="mt-6 sm:mt-8 max-w-3xl
          text-white/70
          text-sm sm:text-base lg:text-lg
          leading-relaxed sm:leading-loose text-justify">

                At <span class="text-white font-medium">Creative Horizon</span>, our work speaks louder than words.
                Every project we take on—big or small—is approached with the same passion for storytelling
                and an unwavering commitment to excellence.
                <br class="hidden sm:block"><br class="hidden sm:block">

                Over the years, we’ve partnered with brands, artists, agencies, and production banners
                to create content that not only engages but leaves a lasting impact.
                From powerful advertisement films and vibrant music videos to seamless event executions
                and large-scale line production assignments, our portfolio reflects our capability
                to deliver across formats and industries.
            </p>

        </div>
    </section>

    @php
        $ads = [
            ['title' => 'Brand Campaign', 'image' => 'ad1.jpg', 'youtube' => '#'],
            ['title' => 'Product Launch', 'image' => 'ad2.jpg', 'youtube' => '#'],
        ];

        $films = [
            ['title' => 'Naach Basanti Naach', 'image' => 'film1.jpg', 'youtube' => '#'],
            ['title' => 'Beehad Ka Baghi', 'image' => 'film2.jpg', 'youtube' => '#'],
        ];
    @endphp

    <!-- ================= WORK ================= -->
    <section class="bg-black text-white pb-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- ===== TABS ===== -->
            <div class="flex items-center gap-4 mb-14">

                <button data-tab="ads" class="tab-btn relative text-xl font-medium tracking-wide text-white">
                    Advertisement
                </button>

                <span class="text-white/40">|</span>

                <button data-tab="films" class="tab-btn relative text-xl font-medium tracking-wide text-white/50">
                    Films
                </button>

            </div>

            <!-- ===== ADS ===== -->
            <div id="ads" class="work-grid flex flex-wrap gap-10">

                @foreach ($ads as $ad)
                    <a href="{{ $ad['youtube'] }}" target="_blank"
                        class="group relative w-[235px] h-[315px] rounded-2xl overflow-hidden bg-neutral-900">

                        <img src="{{ asset('assets/work/ads/' . $ad['image']) }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition"></div>

                        <div class="absolute bottom-0 p-4">
                            <p class="text-[11px] tracking-[0.3em] uppercase text-white/60">
                                Advertisement
                            </p>
                            <h3 class="mt-1 text-sm font-medium">
                                {{ $ad['title'] }}
                            </h3>
                        </div>
                    </a>
                @endforeach

            </div>

            <!-- ===== FILMS ===== -->
            <div id="films" class="work-grid hidden flex flex-wrap gap-10">

                @foreach ($films as $film)
                    <a href="{{ $film['youtube'] }}" target="_blank"
                        class="group relative w-[235px] h-[315px] rounded-3xl overflow-hidden bg-neutral-900">

                        <img src="{{ asset('assets/work/films/' . $film['image']) }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        <div
                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <div
                                class="w-12 h-12 rounded-full border border-white/40 flex items-center justify-center text-sm">
                                ▶
                            </div>
                        </div>

                        <div class="absolute bottom-0 p-4">
                            <p class="text-[11px] tracking-[0.3em] uppercase text-white/60">
                                Film
                            </p>
                            <h3 class="mt-1 text-sm font-semibold">
                                {{ $film['title'] }}
                            </h3>
                        </div>
                    </a>
                @endforeach

            </div>

        </div>
    </section>

    <!-- ================= TAB SCRIPT (FINAL FIX) ================= -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const tabs = document.querySelectorAll('.tab-btn');
            const grids = document.querySelectorAll('.work-grid');

            function setActive(tab) {

                tabs.forEach(t => {
                    t.classList.remove('text-white');
                    t.classList.add('text-white/50');
                    t.style.borderBottom = 'none';
                });

                tab.classList.add('text-white');
                tab.classList.remove('text-white/50');
                tab.style.borderBottom = '1px solid white';

                grids.forEach(g => g.classList.add('hidden'));
                document.getElementById(tab.dataset.tab).classList.remove('hidden');
            }

            // default
            setActive(document.querySelector('[data-tab="ads"]'));

            tabs.forEach(tab => {
                tab.addEventListener('click', () => setActive(tab));
            });

        });
    </script>
@endsection
