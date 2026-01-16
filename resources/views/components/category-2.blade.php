<section class="bg-white mx-auto px-6 lg:px-20 py-16 text-black">

    <!-- ================= HEADER ================= -->
    <div class="flex justify-between items-start mb-16">
        <h2 class="text-[32px] sm:text-[36px] lg:text-[40px] leading-[1.05] font-bold">
            Bharat at the core.<br>
            Impact at scale.<br>
        </h2>

        <a href="/work" class="hidden lg:inline-flex group items-center gap-2 text-[18px] font-bold">
            See All Work
            <span class="transition-transform duration-300 group-hover:translate-x-2">→</span>
        </a>
    </div>

    <!-- ================= ROW 1 (6 / 4 / 2) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-16 lg:gap-x-10 items-start">

        <x-work-card :work="$works[0]" grid="lg:col-span-6" />
        <x-work-card :work="$works[1]" grid="lg:col-span-4" />
        <div class="hidden lg:block lg:col-span-2"></div>

    </div>

    <!-- ================= ICON STEEL (5 / 7) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16 items-start">

        <div class="hidden lg:block lg:col-span-5"></div>
        <x-work-card :work="$works[2]" grid="lg:col-span-7" />

    </div>

    <!-- ================= VIM + REID (2 / 4 / 6) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-16 mt-16">

        <div class="hidden lg:block lg:col-span-2"></div>
        <x-work-card :work="$works[3]" grid="lg:col-span-4" />
        <x-work-card :work="$works[4]" grid="lg:col-span-6" />

    </div>

    <!-- ================= BAYER (7 / 5) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">

        <x-work-card :work="$works[5]" grid="lg:col-span-7" />
        <div class="hidden lg:block lg:col-span-5"></div>

    </div>

    <!-- ================= MCHI + HARI (6 / 4 / 2) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-16 lg:gap-x-10 mt-16">

        <x-work-card :work="$works[6]" grid="lg:col-span-6" />
        <x-work-card :work="$works[7]" grid="lg:col-span-4" />
        <div class="hidden lg:block lg:col-span-2"></div>

    </div>

    <!-- ================= DEHAAT (5 / 7) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">

        <div class="hidden lg:block lg:col-span-5"></div>
        <x-work-card :work="$works[8]" grid="lg:col-span-7" />

    </div>

    <!-- ================= VIM + SIEMENS (2 / 4 / 6) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-16 mt-16">

        <div class="hidden lg:block lg:col-span-2"></div>
        <x-work-card :work="$works[9]" grid="lg:col-span-4" />
        <x-work-card :work="$works[10]" grid="lg:col-span-6" />

    </div>

    <!-- ================= VASANT (7 / 5) ================= -->

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-16">
        <x-work-card :work="$works[11]" grid="lg:col-span-7" />
        <div class="hidden lg:block lg:col-span-5"></div>
    </div>



    <!-- MOBILE CTA -->
    <a href="/work" class="block lg:hidden mt-10 text-[18px] font-semibold border-b border-black w-fit">
        See All Work →
    </a>

</section>
