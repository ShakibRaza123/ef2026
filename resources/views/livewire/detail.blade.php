<section class="bg-white text-black">

    <!-- ================= HERO ================= -->
    <section class="relative w-full h-[80vh] overflow-hidden bg-black">

        @if($service->hero_media_type === 'video')
            <video autoplay muted loop playsinline
                   class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('storage/'.$service->hero_media) }}" type="video/mp4">
            </video>
        @else
            <img src="{{ asset('storage/'.$service->hero_media) }}"
                 class="absolute inset-0 w-full h-full object-cover"
                 alt="{{ $service->name }}">
        @endif

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Title -->
        <div class="relative z-10 h-full flex items-end">
            <div class="px-6 lg:px-20 pb-16 max-w-4xl">
                <p class="text-xs uppercase tracking-widest text-white/70 mb-3">
                    Services
                </p>

                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight">
                    {{ $service->name }}
                </h1>

                @if($service->short_description)
                    <p class="mt-4 text-white/80 text-lg max-w-2xl">
                        {{ $service->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- ================= CONTENT ================= -->
    <section class="max-w-[1200px] mx-auto px-6 lg:px-20 py-20">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- LEFT -->
            <div class="lg:col-span-7 prose prose-lg max-w-none">
                {!! $service->description !!}
            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-5">
                <div class="sticky top-24 space-y-4">

                    <h3 class="text-lg font-bold">What we do</h3>

                    <ul class="space-y-2 text-sm">
                        @foreach(json_decode($service->points ?? '[]') as $point)
                            <li class="flex gap-2">
                                <span>→</span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>

    </section>

</section>
