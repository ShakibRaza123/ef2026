<section class="bg-white max-w-[1400px] mx-auto px-6 lg:px-16 py-24">

    <!-- ================= HEADER ================= -->
    <div class="flex justify-between items-start mb-16">
        <h2 class="text-[40px] leading-[1.1] font-bold text-black">
            Real Work.<br>
            Real Bharat.<br>
            Real <span class="text-[#f38121]">Impact.</span>
        </h2>

        <!-- SEE ALL WORK (DESKTOP ONLY) -->
        <a href="/work"
            class="hidden lg:inline-flex
          group items-center gap-2 text-[22px] font-bold
          border-b border-black pb-1
          transition-all duration-300 text-black">
            See All Work
            <span class="transition-transform duration-300 group-hover:translate-x-2">→</span>
        </a>

    </div>

    <!-- ================= ROW 1 ================= -->
    <div class="grid lg:grid-cols-12 gap-12 items-start">

        <!-- LEFT VIDEO -->
        <article class="lg:col-span-7 group">
            <a href="/work/zen-lyfe" class="block">
                <div class="relative overflow-hidden aspect-[16/10] bg-black">
                    <video
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        autoplay muted loop playsinline>
                        <source src="https://www.eggfirst.com/neweggfirst/assets/images/Comp%201_2.mp4"
                            type="video/mp4">
                    </video>
                </div>

                <div x-data="{
                    i: 0,
                    items: ['AI-generated TVC Production', 'Experiential Marketing', 'App Launch Campaign'],
                    start() { setInterval(() => { this.i = (this.i + 1) % this.items.length }, 2200) }
                }" x-init="start()" class="mt-6 max-w-[88%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Bank of Maharashtra · Zen Lyfe
                    </p>

                    <h3 class="text-[22px] font-bold inline-flex items-center gap-2 text-black">
                        AI empowering everyday needs.
                        <span
                            class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                    </h3>

                    <!-- AUTO ROTATING META (UNCHANGED) -->
                    <div class="relative mt-3 h-5 overflow-hidden">
                        <template x-for="(item,index) in items" :key="index">
                            <span x-show="i===index" x-transition:enter="transition transform duration-500 ease-out"
                                x-transition:enter-start="translate-y-5 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition transform duration-500 ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-5 opacity-0"
                                class="absolute left-0 top-0 text-sm text-black">
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>
                </div>
            </a>
        </article>

        <!-- RIGHT IMAGE -->
        <article class="lg:col-span-5 group">
            <a href="/work/fino-matlab-fikar-not" class="block">
                <div class="overflow-hidden bg-gray-100 aspect-[3/2]">
                    <img src="https://www.eggfirst.com/neweggfirst/assets/images/iconsteel.png"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>

                <div x-data="{
                    i: 0,
                    items: ['Brand Film', 'Production', 'Integrated Communication'],
                    start() { setInterval(() => { this.i = (this.i + 1) % this.items.length }, 2200) }
                }" x-init="start()" class="mt-6">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Fino · Fino Matlab Fikar Not
                    </p>

                    <h3 class="text-[22px] font-bold inline-flex items-center gap-2 text-black mb-1">
                        Making the bank’s name its strongest asset.
                        <span
                            class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                    </h3>

                    <!-- AUTO ROTATING META (UNCHANGED) -->
                    <div class="relative h-5 overflow-hidden">
                        <template x-for="(item,index) in items" :key="index">
                            <span x-show="i===index" x-transition:enter="transition transform duration-500 ease-out"
                                x-transition:enter-start="translate-y-5 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition transform duration-500 ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-5 opacity-0" class="absolute text-sm text-black">
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>
                </div>
            </a>
        </article>
    </div>

    <!-- Icon Steel -->
    <div
        class="grid lg:grid-cols-12 gap-8 items-start mt-16 lg:mt-5 overflow-hidden
            lg:flex lg:justify-end">

        <article class="lg:col-span-7 group">

            <a href="/work/reid-and-taylor" class="block">

                <!-- IMAGE -->
                <div class="overflow-hidden bg-[#fde3d2]">
                    <img src="{{ asset('assets/categories/Icon-Steel.jpg') }}" alt="Reid & Taylor"
                        class="w-full h-auto object-contain
                                transition-transform duration-700
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[90%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Reid & Taylor · Man On A Mission
                    </p>

                    <h3
                        class="text-[22px] font-bold text-black leading-snug
                            inline-flex items-center gap-2">
                        Turning fashion into a power statement.
                        <span
                            class="opacity-0 -translate-x-2
                                    transition-all duration-300
                                    group-hover:opacity-100
                                    group-hover:translate-x-0">→</span>
                    </h3>

                    <p class="text-sm text-black mt-2">
                        Brand Positioning · DVC
                    </p>

                </div>

            </a>
        </article>

    </div>



    <!-- Madhavbaug + Reid & Taylor -->
    <div class="grid lg:grid-cols-12 gap-x-12 gap-y-16 mt-16 lg:mt-24 items-start">

        <!-- LEFT SMALL CARD -->
        <article class="lg:col-span-5 group">

            <a href="/work/madhavbaug" class="block">

                <!-- IMAGE -->
                <div class="overflow-hidden bg-gray-100">
                    <img src="https://www.eggfirst.com/neweggfirst/assets/images/madhavbaug.png" alt="Madhavbaug"
                        class="w-full h-auto object-contain
                                transition-transform duration-700
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[85%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Madhavbaug
                    </p>

                    <h3
                        class="text-[22px] font-bold text-black leading-snug
                            inline-flex items-center gap-2">
                        Health Ki Ghar Wapsi
                        <span
                            class="opacity-0 -translate-x-2
                                    transition-all duration-300
                                    group-hover:opacity-100
                                    group-hover:translate-x-0">→</span>
                    </h3>

                    <p class="text-sm text-black mt-2">
                        TVC Production
                    </p>

                </div>

            </a>
        </article>

        <!-- RIGHT LARGE CARD -->
        <article class="lg:col-span-7 group">

            <a href="/work/reid-and-taylor" class="block">

                <!-- IMAGE -->
                <div class="overflow-hidden bg-[#fde3d2]">
                    <img src="https://www.eggfirst.com/neweggfirst/assets/images/reid-and-taylor.png"
                        alt="Reid & Taylor"
                        class="w-full h-auto object-contain
                                transition-transform duration-700
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[90%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Reid & Taylor · Man On A Mission
                    </p>

                    <h3
                        class="text-[22px] font-bold text-black leading-snug
                            inline-flex items-center gap-2">
                        Turning fashion into a power statement.
                        <span
                            class="opacity-0 -translate-x-2
                                    transition-all duration-300
                                    group-hover:opacity-100
                                    group-hover:translate-x-0">→</span>
                    </h3>

                    <p class="text-sm text-black mt-2">
                        Brand Positioning · DVC
                    </p>

                </div>

            </a>
        </article>

    </div>



    <!-- Bayer -->
    <div class="grid lg:grid-cols-12 gap-8 items-start mt-16 lg:mt-24 overflow-hidden">

        <!-- LEFT-ALIGNED FEATURE CARD -->
        <article class="lg:col-span-7 lg:col-start-1 group">

            <a href="/work/vasant-masala" class="block relative">

                <!-- IMAGE : LEFT ALIGNED + SMALLER -->
                <div class="w-full overflow-hidden">
                    <img src="{{ asset('assets/categories/Bayer.jpg') }}" alt="Vasant Masala"
                        class="w-full
                                max-w-[920px]
                                h-auto
                                object-contain
                                transition-transform duration-700 ease-out
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div x-data="{
                    i: 0,
                    items: [
                        'Brand Film Production',
                        'Communications',
                        'Branding',
                        'Events'
                    ],
                    start() {
                        setInterval(() => {
                            this.i = (this.i + 1) % this.items.length
                        }, 2200)
                    }
                }" x-init="start()" class="mt-6 max-w-[640px]">

                    <!-- CLIENT -->
                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Vasant Masala
                    </p>

                    <!-- TITLE -->
                    <h3
                        class="w-full
                            text-[24px] sm:text-[26px]
                            font-bold text-black
                            leading-tight
                            flex items-center gap-2">

                        <span class="whitespace-nowrap">
                            Pyar to hona hi tha.
                        </span>

                        <!-- ARROW -->
                        <span
                            class="opacity-0 -translate-x-2
                                transition-all duration-300 ease-out
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                shrink-0">
                            →
                        </span>
                    </h3>

                    <!-- AUTO ROTATING META -->
                    <div class="relative mt-2 h-5 overflow-hidden">
                        <template x-for="(item, index) in items" :key="index">
                            <span x-show="i === index" x-transition:enter="transition transform duration-500 ease-out"
                                x-transition:enter-start="translate-y-5 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition transform duration-500 ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-5 opacity-0"
                                class="absolute left-0 top-0 text-sm text-black">
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>

                </div>

            </a>
        </article>

    </div>

    <!-- MCHI + Hari Darshan -->
    <div class="grid lg:grid-cols-12 gap-12 items-start mt-16 lg:mt-24">

        <!-- ================= LEFT IMAGE CARD ================= -->
        <article class="lg:col-span-7 group">

            <a href="/work/zen-lyfe" class="block">

                <!-- IMAGE -->
                <div class="relative overflow-hidden aspect-[16/10] bg-black">
                    <img src="{{ asset('assets/categories/MCHI.jpg') }}" alt="Zen Lyfe Campaign"
                        class="absolute inset-0 w-full h-full object-cover
                        transition-transform duration-700
                        group-hover:scale-105">
                </div>

                <!-- CONTENT -->
                <div x-data="{
                    i: 0,
                    items: [
                        'AI-generated TVC Production',
                        'Experiential Marketing',
                        'App Launch Campaign'
                    ],
                    start() {
                        setInterval(() => {
                            this.i = (this.i + 1) % this.items.length
                        }, 2200)
                    }
                }" x-init="start()" class="mt-6 max-w-[88%]">

                    <!-- CLIENT META -->
                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        MCHI · Waah Sarvaah!
                    </p>

                    <!-- TITLE -->
                    <h3
                        class="text-[22px] leading-[1.25] tracking-tight font-bold text-black
                        inline-flex items-center gap-2">
                        Giving health insurance a personality.
                        <span
                            class="opacity-0 -translate-x-2
                            transition-all duration-300
                            group-hover:opacity-100
                            group-hover:translate-x-0">
                            →
                        </span>
                    </h3>

                    <!-- AUTO ROTATING META (UNCHANGED) -->
                    <div class="relative mt-3 h-5 overflow-hidden">
                        <template x-for="(item, index) in items" :key="index">
                            <span x-show="i === index" x-transition:enter="transition transform duration-500 ease-out"
                                x-transition:enter-start="translate-y-5 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition transform duration-500 ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-5 opacity-0"
                                class="absolute left-0 top-0 block text-sm text-black">
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>

                </div>

            </a>

        </article>


        <!-- ================= IMAGE CARD ================= -->
        <article class="lg:col-span-5 group">

            <a href="/work/hari-darshan" class="block">

                <!-- IMAGE -->
                <div class="relative overflow-hidden aspect-[16/10] bg-[#f7efe9]">
                    <img src="{{ asset('assets/categories/Hari-Darshan.jpg') }}" alt="Hari Darshan Campaign"
                        class="absolute inset-0 w-full h-full object-cover
                        transition-transform duration-700
                        group-hover:scale-105">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[90%]">

                    <!-- BRAND META -->
                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Hari Darshan · Mehke Mann, Hoke Prasann
                    </p>

                    <!-- TITLE -->
                    <h3
                        class="text-[22px] leading-[1.25] tracking-tight font-bold text-black
                        inline-flex items-center gap-2">
                        Turning devotion into peace of mind.
                        <span
                            class="opacity-0 -translate-x-2
                            transition-all duration-300
                            group-hover:opacity-100
                            group-hover:translate-x-0">
                            →
                        </span>
                    </h3>

                    <!-- META -->
                    <p class="mt-3 text-sm text-black/70">
                        Experiential Marketing
                    </p>

                </div>

            </a>

        </article>


    </div>





    <!-- VIM + Siemens -->
    <div class="grid lg:grid-cols-12 gap-x-12 gap-y-16 mt-16 lg:mt-24 items-start">

        <!-- LEFT SMALL CARD -->
        <article class="lg:col-span-5 group">

            <a href="/work/vim" class="block">

                <!-- IMAGE -->
                <div class="overflow-hidden bg-gray-100">
                    <img src="{{ asset('assets/categories/Vim.jpg') }}" alt="VIM"
                        class="w-full h-auto object-contain
                                transition-transform duration-700
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[85%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        VIM
                    </p>

                    <h3
                        class="text-[22px] font-bold text-black leading-snug
                            inline-flex items-center gap-2">
                        Making brand recall irresistible.
                        <span
                            class="opacity-0 -translate-x-2
                                transition-all duration-300
                                group-hover:opacity-100
                                group-hover:translate-x-0">→</span>
                    </h3>

                    <p class="text-sm text-black mt-2">
                        Trade Activation + Brand Engagement
                    </p>

                </div>

            </a>
        </article>

        <!-- RIGHT LARGE CARD -->
        <article class="lg:col-span-7 group">

            <a href="/work/siemens" class="block">

                <!-- IMAGE -->
                <div class="overflow-hidden bg-[#fde3d2]">
                    <img src="{{ asset('assets/categories/Siemens.jpg') }}" alt="Siemens"
                        class="w-full h-auto object-contain
                                transition-transform duration-700
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div class="mt-6 max-w-[90%]">

                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Siemens
                    </p>

                    <h3
                        class="text-[22px] font-bold text-black leading-snug
                            inline-flex items-center gap-2">
                        Taking adoption from mandis to markets.
                        <span
                            class="opacity-0 -translate-x-2
                                transition-all duration-300
                                group-hover:opacity-100
                                group-hover:translate-x-0">→</span>
                    </h3>

                    <p class="text-sm text-black mt-2">
                        B2B / Experiential + On-Ground Activation
                    </p>

                </div>

            </a>
        </article>

    </div>



    <!-- Vasant Masala -->
    <div class="grid lg:grid-cols-12 gap-8 items-start mt-16 lg:mt-24 overflow-hidden">

        <!-- LEFT-ALIGNED FEATURE CARD -->
        <article class="lg:col-span-7 lg:col-start-1 group">

            <a href="/work/vasant-masala" class="block relative">

                <!-- IMAGE : LEFT ALIGNED + SMALLER -->
                <div class="w-full overflow-hidden">
                    <img src="https://www.eggfirst.com/neweggfirst/assets/images/vasant.png" alt="Vasant Masala"
                        class="w-full
                                max-w-[920px]
                                h-auto
                                object-contain
                                transition-transform duration-700 ease-out
                                group-hover:scale-[1.02]">
                </div>

                <!-- CONTENT -->
                <div x-data="{
                    i: 0,
                    items: [
                        'Brand Film Production',
                        'Communications',
                        'Branding',
                        'Events'
                    ],
                    start() {
                        setInterval(() => {
                            this.i = (this.i + 1) % this.items.length
                        }, 2200)
                    }
                }" x-init="start()" class="mt-6 max-w-[640px]">

                    <!-- CLIENT -->
                    <p class="text-xs uppercase tracking-widest text-black mb-2">
                        Vasant Masala
                    </p>

                    <!-- TITLE -->
                    <h3
                        class="w-full
                            text-[24px] sm:text-[26px]
                            font-bold text-black
                            leading-tight
                            flex items-center gap-2">

                        <span class="whitespace-nowrap">
                            Pyar to hona hi tha.
                        </span>

                        <!-- ARROW -->
                        <span
                            class="opacity-0 -translate-x-2
                                transition-all duration-300 ease-out
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                shrink-0">
                            →
                        </span>
                    </h3>

                    <!-- AUTO ROTATING META -->
                    <div class="relative mt-2 h-5 overflow-hidden">
                        <template x-for="(item, index) in items" :key="index">
                            <span x-show="i === index" x-transition:enter="transition transform duration-500 ease-out"
                                x-transition:enter-start="translate-y-5 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition transform duration-500 ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-5 opacity-0"
                                class="absolute left-0 top-0 text-sm text-black">
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>

                </div>

            </a>
        </article>

    </div>

    <!-- SEE ALL WORK (MOBILE ONLY – BOTTOM) -->
    <a href="/work"
        class="block lg:hidden
          group inline-flex items-center mt-10 gap-2
          text-[18px] font-semibold
          border-b border-black pb-1
          transition-all duration-300 text-black">
        See All Work
        <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
    </a>


</section>
