@extends('layouts.app')

@section('content')

<section class="relative bg-black text-white overflow-hidden">

    <!-- CINEMATIC BACKGROUND -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black"></div>
        <div class="absolute inset-0 opacity-[0.12]"
             style="background-image:url('{{ asset('assets/services/bg.jpg') }}');
                    background-size:cover; background-position:center;">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto
                px-5 sm:px-8 lg:px-20
                py-20 sm:py-28 lg:py-36">

        <!-- INTRO -->
        <div class="max-w-4xl mb-28">
            <p class="text-[11px] tracking-[0.55em] uppercase text-[#d4af37] mb-6">
                Services
            </p>

            <h1 class="text-[28px] sm:text-4xl lg:text-5xl
                       font-semibold leading-tight mb-8">
                Crafted experiences for brands<br>
                that refuse to blend in.
            </h1>

            <p class="text-base sm:text-lg text-white/70 max-w-3xl">
                A curated suite of cinematic, experiential and strategic services —
                designed with precision, imagination and execution excellence.
            </p>
        </div>

        @php
            $services = [
                [
                    'title' => 'Advertisement Shoots',
                    'desc' => 'Cinematic advertising films designed to communicate with clarity, emotion and impact.',
                    'list' => ['Concept Development','Script Writing','Production Management','Video Production','Post-Production']
                ],
                [
                    'title' => 'Event Management',
                    'desc' => 'Live brand experiences executed with scale, elegance and operational excellence.',
                    'list' => ['Event Planning','Venue Selection & Logistics','Concept & Theme Development','Program Coordination','On-Site Management']
                ],
                [
                    'title' => 'Music Video Production',
                    'desc' => 'Visually powerful music videos crafted through cinematic storytelling.',
                    'list' => ['Conceptualization','Storyboarding & Pre-Production','Direction & Cinematography','Post-Production','Distribution & Promotion']
                ],
                [
                    'title' => 'Line Production',
                    'desc' => 'End-to-end production services for films, OTT platforms and commercials.',
                    'list' => ['Location Scouting','Crew Hiring & Management','Budgeting & Cost Management','Equipment & Technical Support','Logistics & Coordination']
                ],
                [
                    'title' => 'Brand Promotion',
                    'desc' => 'Strategic brand communication designed to connect, engage and convert.',
                    'list' => ['Social Media Campaigns','Print Media Advertising','Influencer Collaborations','Content Creation']
                ],
                [
                    'title' => 'BTL Activations',
                    'desc' => 'On-ground activations that transform brand presence into conversations.',
                    'list' => ['On-Ground Activations','Experiential Marketing','Retail & Trade Activations','Promotional Campaigns','Execution & Logistics']
                ]
            ];
        @endphp

        <!-- SERVICES -->
        <div class="space-y-36">

            @foreach($services as $index => $service)
            <div class="group relative">

                <!-- GOLD SWEEP -->
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-700
                            bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.12),transparent_65%)]">
                </div>

                <div class="relative grid lg:grid-cols-12 gap-14 lg:gap-24 items-start">

                    <!-- TEXT -->
                    <div class="lg:col-span-5 {{ $index % 2 ? 'lg:order-2' : '' }}
                                transition-transform duration-700 group-hover:-translate-y-1">

                        <span class="block text-[12px] tracking-[0.4em]
                                     text-white/40 mb-4">
                            {{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h2 class="text-[24px] sm:text-3xl lg:text-4xl
                                   font-medium mb-6">
                            {{ $service['title'] }}
                        </h2>

                        <p class="text-sm sm:text-base text-white/70 leading-relaxed">
                            {{ $service['desc'] }}
                        </p>

                        <div class="mt-8 h-px w-24 bg-[#d4af37]/70"></div>
                    </div>

                    <!-- OFFER PANEL -->
                    <div class="lg:col-span-6 {{ $index % 2 ? 'lg:order-1' : '' }}">
                        <div class="relative rounded-3xl
                                    bg-white/5 backdrop-blur
                                    border border-white/10
                                    p-8 sm:p-10 lg:p-12">

                            <p class="text-[11px] tracking-[0.45em]
                                      uppercase text-[#d4af37] mb-6">
                                What We Offer
                            </p>

                            <ul class="space-y-4 text-sm sm:text-base text-white/75">
                                @foreach($service['list'] as $item)
                                <li class="flex gap-3">
                                    <span class="text-[#d4af37] mt-[2px]">—</span>
                                    <span>{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <!-- CTA -->
        <div class="mt-36">
            <a wire:navigate href="/contact-us"
               class="inline-flex items-center gap-4
                      text-sm uppercase tracking-[0.4em]
                      text-[#d4af37] group">
                Let’s Create Something Iconic
                <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
            </a>
        </div>

    </div>
</section>
<x-footer />
@endsection
