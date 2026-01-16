<div>


    <!-- HERO -->
    <section class="bg-white w-full relative overflow-hidden">
        <div class="mx-auto px-6 lg:px-20 pt-16 pb-12">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-20">
                <div class="xl:col-span-6">
                    <h1
                        class="font-extrabold uppercase text-black
                    text-[46px] sm:text-[64px] lg:text-[72px] xl:text-[80px]
                    leading-[0.98]">
                        Built on<br>Insight.<br>Proven by<br>Impact.
                    </h1>
                </div>
                <div class="xl:col-span-6">
                    <p class="text-black/75 text-[16px] lg:text-[17px] leading-[1.85] max-w-xl">
                        Our work blends deep consumer understanding with sharp strategy
                        and fearless creativity to solve real business challenges.
                    </p>
                </div>
            </div>
        </div>
    </section>
<section class="bg-white mx-auto px-6 lg:px-20 py-16 text-black">

    <!-- ================= FILTER BAR ================= -->
    <div class="relative border-b border-black/10 pb-4">

        <div class="flex items-center gap-8 text-sm">
            <span class="font-semibold text-black/70">Sort by:</span>

            <div class="flex gap-8">
                <button wire:click="setFilter('recommended')"
                    class="relative pb-1 font-semibold
                    {{ $activeFilter === 'recommended' ? 'text-black' : 'text-black/40 hover:text-black' }}">
                    Recommended
                    @if ($activeFilter === 'recommended')
                        <span class="absolute -bottom-[5px] left-0 w-full h-[2px] bg-black"></span>
                    @endif
                </button>

                <button wire:click="setFilter('latest')"
                    class="relative pb-1 font-semibold
                    {{ $activeFilter === 'latest' ? 'text-black' : 'text-black/40 hover:text-black' }}">
                    Latest
                    @if ($activeFilter === 'latest')
                        <span class="absolute -bottom-[5px] left-0 w-full h-[2px] bg-black"></span>
                    @endif
                </button>
            </div>
        </div>

        <!-- ================= CENTER MESSAGE ================= -->
        @if (
            ($activeFilter === 'recommended' && $recommended->isEmpty()) ||
            ($activeFilter === 'latest' && (!$latest || $latest->isEmpty()))
        )
            <div class="flex justify-center items-center py-16">
                <div class="text-center">
                    <p class="text-[18px] font-semibold text-black">No Message</p>
                    <p class="mt-1 text-sm text-black/50">Nothing to show for this filter</p>
                </div>
            </div>
        @endif

    </div>

    {{-- ================= RECOMMENDED ================= --}}
    @if ($activeFilter === 'recommended')

        @php
            $patterns = ['6-4-2', '5-7', '2-4-6', '7-5'];
            $i = 0;
            $p = 0;
            $total = $recommended->count();
        @endphp

        @while ($i < $total)

            @php $pattern = $patterns[$p % count($patterns)]; @endphp

            {{-- 6 / 4 / 2 --}}
            @if ($pattern === '6-4-2' && $i + 1 < $total)
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-16 lg:gap-x-10 mt-16">
                    <x-work-card :work="$recommended[$i]" grid="lg:col-span-6" />
                    <x-work-card :work="$recommended[$i + 1]" grid="lg:col-span-4" />
                    <div class="hidden lg:block lg:col-span-2"></div>
                </div>
                @php $i += 2; $p++; @endphp
                @continue
            @endif

            {{-- 5 / 7 --}}
            @if ($pattern === '5-7')
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
                    <div class="hidden lg:block lg:col-span-5"></div>
                    <x-work-card :work="$recommended[$i]" grid="lg:col-span-7" />
                </div>
                @php $i++; $p++; @endphp
                @continue
            @endif

            {{-- 2 / 4 / 6 --}}
            @if ($pattern === '2-4-6' && $i + 1 < $total)
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-16 mt-16">
                    <div class="hidden lg:block lg:col-span-2"></div>
                    <x-work-card :work="$recommended[$i]" grid="lg:col-span-4" />
                    <x-work-card :work="$recommended[$i + 1]" grid="lg:col-span-6" />
                </div>
                @php $i += 2; $p++; @endphp
                @continue
            @endif

            {{-- 7 / 5 --}}
            @if ($pattern === '7-5')
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
                    <x-work-card :work="$recommended[$i]" grid="lg:col-span-7" />
                    <div class="hidden lg:block lg:col-span-5"></div>
                </div>
                @php $i++; $p++; @endphp
                @continue
            @endif

        @endwhile
    @endif

    {{-- ================= LATEST ================= --}}
    {{-- ================= LATEST ================= --}}
@if ($activeFilter === 'latest')

    @php
        // latest collection ko recommended jaisa treat karo
        $latestWorks = $latest; 

        $patterns = ['6-4-2', '5-7', '2-4-6', '7-5'];
        $i = 0;
        $p = 0;
        $total = $latestWorks->count();
    @endphp

    @while ($i < $total)

        @php $pattern = $patterns[$p % count($patterns)]; @endphp

        {{-- 6 / 4 / 2 --}}
        @if ($pattern === '6-4-2' && $i + 1 < $total)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-16 lg:gap-x-10 mt-16">
                <x-work-card :work="$latestWorks[$i]" grid="lg:col-span-6" />
                <x-work-card :work="$latestWorks[$i + 1]" grid="lg:col-span-4" />
                <div class="hidden lg:block lg:col-span-2"></div>
            </div>
            @php $i += 2; $p++; @endphp
            @continue
        @endif

        {{-- 5 / 7 --}}
        @if ($pattern === '5-7')
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
                <div class="hidden lg:block lg:col-span-5"></div>
                <x-work-card :work="$latestWorks[$i]" grid="lg:col-span-7" />
            </div>
            @php $i++; $p++; @endphp
            @continue
        @endif

        {{-- 2 / 4 / 6 --}}
        @if ($pattern === '2-4-6' && $i + 1 < $total)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-16 mt-16">
                <div class="hidden lg:block lg:col-span-2"></div>
                <x-work-card :work="$latestWorks[$i]" grid="lg:col-span-4" />
                <x-work-card :work="$latestWorks[$i + 1]" grid="lg:col-span-6" />
            </div>
            @php $i += 2; $p++; @endphp
            @continue
        @endif

        {{-- 7 / 5 --}}
        @if ($pattern === '7-5')
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
                <x-work-card :work="$latestWorks[$i]" grid="lg:col-span-7" />
                <div class="hidden lg:block lg:col-span-5"></div>
            </div>
            @php $i++; $p++; @endphp
            @continue
        @endif

    @endwhile
@endif


</section>




</div>
