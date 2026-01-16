@extends('layouts.app')

@section('content')
    <section class="bg-white w-full relative overflow-hidden">

        <div class="relative max-w-[1400px] mx-auto px-6 lg:px-20 pt-24 lg:pt-32 pb-6">

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-20 items-start">

                <!-- LEFT -->
                <div class="xl:col-span-6">
                    <p class="uppercase text-[11px] tracking-[0.35em] text-black/50 mb-6">
                        Contact
                    </p>

                    <h1
                        class="font-extrabold uppercase text-black
                           text-[46px] sm:text-[64px] lg:text-[72px] xl:text-[80px]
                           leading-[0.98] tracking-tight">
                        We’re Ready<br>
                        When You<br>
                        Are.
                    </h1>

                    <div class="mt-10 w-20 h-px bg-black"></div>
                </div>

                <!-- RIGHT -->
                <div class="xl:col-span-6 pt-0 xl:pt-16">


                    <p class="text-black/75 text-[16px] lg:text-[17px] leading-[1.85] max-w-full xl:max-w-xl">
                        From Bharat to the digital world, meaningful brands are built
                        when strategy meets sincerity. At Eggfirst, we listen first,
                        think deeply, and create work that’s rooted in insight and
                        delivered with accountability.
                    </p>

                    <p class="mt-8 text-black text-[16px] lg:text-[17px] leading-[1.85] max-w-full xl:max-w-xl font-medium">
                        If you’re ready to build a brand that connects, scales,
                        and stands by its word, reach out to us.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <x-contact-us />
    <x-footer />
@endsection
