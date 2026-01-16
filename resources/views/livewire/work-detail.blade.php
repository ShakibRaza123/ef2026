<div>

    {{-- HERO --}}
    @if(optional($work->detail)->inner_hero_media)
        <img src="{{ asset('storage/'.$work->detail->inner_hero_media) }}"
             class="w-full h-auto object-cover"
             alt="{{ $work->title }}">
    @endif

    {{-- CONTENT --}}
    <section class="bg-[#f7f3dc] py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-5">
                <h1 class="text-4xl font-bold">
                    {{ $work->detail->intro_heading ?? $work->title }}
                </h1>
            </div>

            <div class="lg:col-span-7">
                @if(optional($work->detail)->intro_description)
                    <p class="text-lg mb-6">
                        {{ $work->detail->intro_description }}
                    </p>
                @endif
            </div>

        </div>
    </section>

</div>
