@props(['work', 'grid' => 'lg:col-span-6'])

@php
    // 🚨 HARD STOP: agar work null hai toh kuch render hi mat karo
    if (!$work) {
        return;
    }

    use Illuminate\Support\Str;

    // MEDIA URL (external OR storage)
    $mediaUrl = $work->hero_media
        ? (Str::startsWith($work->hero_media, ['http://', 'https://'])
            ? $work->hero_media
            : asset($work->hero_media))
        : null;

    // Rotating text → always array
    $rotatingItems = is_array($work->rotating_text)
        ? $work->rotating_text
        : json_decode($work->rotating_text ?? '[]', true);
@endphp

<a href="{{ url('/work/'.$work->slug) }}"
   class="relative block w-full group {{ $grid }}">

    <!-- ================= MEDIA ================= -->
    <div class="relative overflow-hidden bg-gray-100">

        @if($work->hero_media_type === 'video' && $mediaUrl)
            <video autoplay muted loop playsinline
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <source src="{{ $mediaUrl }}" type="video/mp4">
            </video>
        @elseif($mediaUrl)
            <img src="{{ $mediaUrl }}"
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                 alt="{{ $work->title }}">
        @endif

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300"></div>
    </div>

    <!-- ================= CONTENT ================= -->
    <div
        x-data="{
            i: 0,
            items: {{ Js::from($rotatingItems) }},
            start() {
                if (this.items.length <= 1) return;
                setTimeout(() => {
                    setInterval(() => {
                        this.i = (this.i + 1) % this.items.length
                    }, 2200)
                }, 700)
            }
        }"
        x-init="start()"
        class="mt-6 max-w-[90%]">

        {{-- CLIENT --}}
        @if($work->client_name)
            <p class="text-[12px] uppercase font-bold tracking-[0.08em] text-black/80 mb-2">
                {{ $work->client_name }}
            </p>
        @endif

        {{-- TITLE --}}
        <h3 class="text-[20px] sm:text-[22px] font-bold leading-snug inline-flex items-center gap-2">
            {{ $work->title }}
            <span class="opacity-0 -translate-x-2 transition-all duration-300
                         group-hover:opacity-100 group-hover:translate-x-0">→</span>
        </h3>

        {{-- ROTATING TEXT --}}
        @if(!empty($rotatingItems))
            <div class="relative h-5 overflow-hidden mt-2">
                <template x-for="(item,index) in items" :key="index">
                    <span
                        x-show="i === index"
                        x-cloak
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-500"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-3"
                        class="absolute left-0 top-0 text-[13px] sm:text-sm text-black/80">
                        <span x-text="item"></span>
                    </span>
                </template>
            </div>
        @endif

    </div>
</a>
