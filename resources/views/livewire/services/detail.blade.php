<div>
    <!-- ================= HERO (TEXT ONLY) ================= -->
    <h1
        class="px-5 pt-20 pb-10 md:px-10 lg:px-20 lg:py-30
               text-6xl md:text-7xl/[0.8]
               lg:text-[120px]/[0.78]
               xl:text-9xl/[0.78]
               font-black uppercase leading-[0]">
        {{ $service->title }}
    </h1>

    <!-- ================= VIDEO (SCROLL TO VIEW) ================= -->
    @if ($service->hero_video)
        <section class="px-5 md:px-10 lg:px-20 pt-24 pb-10">
            <video src="{{ $service->hero_video }}" playsinline autoplay loop muted
                class="w-full aspect-video object-cover object-top">
            </video>
        </section>
    @endif

    <!-- ================= SERVICES + INTRO ================= -->
    <section class="lg:flex lg:justify-end
               px-5 md:px-10 lg:px-20
               pt-0 lg:pt-0">

        <!-- DESCRIPTION (RIGHT SIDE) -->
        <div
            class="lg:w-1/2
                   text-[20px] lg:text-xl
                   leading-relaxed
                   text-left">

            {!! nl2br(e($service->description)) !!}

        </div>

    </section>


@if($service->works->count())

<section class="px-5 md:px-10 lg:px-20 py-20">

    <!-- SECTION HEADER -->
    <div class="flex justify-between items-start mb-16">
        <h2 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold leading-tight">
            Real Work.<br>
            Real Bharat.<br>
            Real Impact.
        </h2>

        <a href="/work"
           class="hidden lg:inline-flex group items-center gap-2 text-sm font-semibold">
            See All Work
            <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
        </a>
    </div>

    @php
        $works = $service->works;
        $patterns = ['6-4-2', '5-7', '2-4-6', '7-5'];
        $i = 0;
        $p = 0;
        $total = $works->count();
    @endphp

    @while($i < $total)

    @php $pattern = $patterns[$p % count($patterns)]; @endphp

    {{-- 6 / 4 / 2 --}}
    @if($pattern === '6-4-2' && $i + 1 < $total)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-16 lg:gap-x-10 mt-16">
            <x-work-card :work="$works[$i]" grid="lg:col-span-6"/>
            <x-work-card :work="$works[$i+1]" grid="lg:col-span-4"/>
            <div class="hidden lg:block lg:col-span-2"></div>
        </div>
        @php $i += 2; $p++; @endphp
        @continue
    @endif

    {{-- 5 / 7 --}}
    @if($pattern === '5-7')
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
            <div class="hidden lg:block lg:col-span-5"></div>
            <x-work-card :work="$works[$i]" grid="lg:col-span-7"/>
        </div>
        @php $i++; $p++; @endphp
        @continue
    @endif

    {{-- 2 / 4 / 6 --}}
    @if($pattern === '2-4-6' && $i + 1 < $total)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-16 mt-16">
            <div class="hidden lg:block lg:col-span-2"></div>
            <x-work-card :work="$works[$i]" grid="lg:col-span-4"/>
            <x-work-card :work="$works[$i+1]" grid="lg:col-span-6"/>
        </div>
        @php $i += 2; $p++; @endphp
        @continue
    @endif

    {{-- 7 / 5 --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
        <x-work-card :work="$works[$i]" grid="lg:col-span-7"/>
        <div class="hidden lg:block lg:col-span-5"></div>
    </div>

    @php
        $i++;
        $p++;
    @endphp

@endwhile


</section>
@endif



 
</div>

