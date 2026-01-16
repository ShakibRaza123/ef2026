<header x-data="{ mega: false, mobile: false, mobileServices: false }" class="fixed top-0 left-0 w-full bg-white z-50 font-[Poppins] text-black">

    <!-- ================= TOP BAR ================= -->
    <div class="max-w-[1400px] mx-auto h-[96px] px-4 lg:px-20 flex items-center relative">

        <!-- LOGO (FIXED) -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" wire:navigate>
                <img src="https://www.eggfirst.com/assets/imgs/logo/logo.svg" class="h-10 w-auto" alt="Eggfirst">
            </a>
        </div>

        <!-- ================= DESKTOP NAV (FIXED) ================= -->
        <nav class="hidden lg:flex items-center gap-10 mx-auto">

            <a href="{{ route('about') }}" wire:navigate class="relative group font-medium text-[16px] cursor-pointer">
                About
                <span
                    class="absolute left-1/2 -bottom-1 h-[1px] w-0 bg-black
                             transition-all duration-300
                             group-hover:w-full group-hover:left-0"></span>
            </a>

            <!-- SERVICES -->
            <button @click="mega = !mega"
                class="relative group flex items-center gap-2
                       font-medium text-[16px]
                       cursor-pointer select-none">

                <span>Services</span>

                <svg class="w-3 h-3 transition-transform duration-300" :class="mega && 'rotate-180'" viewBox="0 0 10 6">
                    <path d="M1 1l4 4 4-4" stroke="#000" stroke-width="1.5" fill="none" />
                </svg>

                <span
                    class="absolute left-1/2 -bottom-1 h-[1px] w-0 bg-black
                             transition-all duration-300
                             group-hover:w-full group-hover:left-0"></span>
            </button>

            <a href="{{ route('work') }}" wire:navigate class="relative group font-medium text-[16px] cursor-pointer">
                Work
                <span
                    class="absolute left-1/2 -bottom-1 h-[1px] w-0 bg-black
                             transition-all duration-300
                             group-hover:w-full group-hover:left-0"></span>
            </a>


            <a href="#" class="relative group font-medium text-[16px] cursor-pointer">
                Chalo Bharat
                <span
                    class="absolute left-1/2 -bottom-1 h-[1px] w-0 bg-black
                             transition-all duration-300
                             group-hover:w-full group-hover:left-0"></span>
            </a>

        </nav>



        <!-- CTA -->
        <div class="absolute right-10 hidden lg:block">
            <a href="{{ route('contact') }}" wire:navigate
                class="inline-flex items-center justify-center
                      px-7 py-2.5 text-[16px] font-medium
                      bg-[#f38121] text-white
                      border border-transparent
                      transition-all duration-300 ease-out
                      hover:bg-white hover:text-black hover:border-black">
                Contact
            </a>
        </div>

        <!-- MOBILE BUTTON -->
        <button @click="mobile = true" class="lg:hidden ml-auto cursor-pointer">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

    </div>

    <!-- ================= MEGA MENU ================= -->
    <div x-show="mega" x-transition.opacity.duration.300ms class="relative w-full bg-white z-40">

        <div class="max-w-[1400px] mx-auto pt-2 px-20 py-12">

            <!-- ================= STICKY HEADER ================= -->
            <div
                class="sticky top-[var(--header-h)]
                    bg-white/95 backdrop-blur
                    z-30 pb-5">

                <a href="{{ route('services.index') }}" wire:navigate
                    class="inline-flex items-center gap-2
                      text-[26px] font-bold group">
                    Services Overview
                    <span class="transition-transform duration-300 group-hover:translate-x-2">→</span>
                </a>

                <div class="w-full h-[1px] bg-black mt-5"></div>
            </div>

            <!-- ================= GRID ================= -->
            <div class="grid grid-cols-4 gap-x-10 pt-0">

                <!-- COLUMN 1 -->
                <div>

                    <a href="{{ route('services.strategy-consulting') }}" wire:navigate class="hover:underline">
                        <h4 class="text-[16px] font-semibold mb-6">
                            Strategy & Consulting
                        </h4>
                    </a>

                    <ul class="space-y-4 text-[15px]">
                        <li><a href="{{ route('services.detail', 'brand-strategy') }}"
                                class="group inline-flex items-center gap-2">
                                Brand Strategy
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                                    →
                                </span>
                            </a>
                        </li>
                        <li><a href="{{ route('services.detail', 'rural-semi-urban-marketing') }}" class="group inline-flex items-center gap-2">
                                Rural & Semi-Urban Marketing
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                Consumer and Market Research
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                Google and Meta Marketing
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                PR and Media Outreach
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                Go-To-Market Planning
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                Marketing-To-Sales Strategy
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                        <li><a href="#" class="group inline-flex items-center gap-2">
                                Data, Analytics & ROI Measurement
                                <span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span>
                            </a></li>
                    </ul>
                </div>

                <!-- COLUMN 2 -->
                <div>
                    <h4 class="text-[16px] font-semibold mb-6">
                        360 Degree Storytelling
                    </h4>
                    <ul class="space-y-4 text-[15px]">
                        <li><a href="#" class="group inline-flex items-center gap-2">Film and Video
                                Production<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">AI Video Creation<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Content Creation<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">On-ground Activations<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Brand Identity, Design &
                                Packaging<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Social Media Marketing<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Podcast-as-a-Strategy<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                    </ul>
                </div>

                <!-- COLUMN 3 -->
                <div>
                    <h4 class="text-[16px] font-semibold mb-6">
                        Digital & Experiential
                    </h4>
                    <ul class="space-y-4 text-[15px] mb-10">
                        <li><a href="#" class="group inline-flex items-center gap-2">Tech-enabled
                                Innovations<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">UI/UX Design & Website
                                Creation<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">AI-enabled Automation<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                    </ul>

                    <h4 class="text-[16px] font-semibold mb-6">
                        Media & MarTech
                    </h4>
                    <ul class="space-y-4 text-[15px]">
                        <li><a href="#" class="group inline-flex items-center gap-2">Media Planning<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Search Engine
                                Optimization<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Performance Marketing<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Affiliate Marketing<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">E-comm / Quick-comm
                                Solutions<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                    </ul>
                </div>

                <!-- COLUMN 4 -->
                <div>
                    <h4 class="text-[16px] font-semibold mb-6">
                        Influencer & Celebrity Management
                    </h4>
                    <ul class="space-y-4 text-[15px]">
                        <li><a href="#" class="group inline-flex items-center gap-2">Sponsorships & Rights
                                Management<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Celebrity Management<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                        <li><a href="#" class="group inline-flex items-center gap-2">Regional & National
                                Influencer Activation<span
                                    class="opacity-0 -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">→</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>



    <!-- ================= MOBILE MENU ================= -->
    <div x-show="mobile" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="
        fixed inset-0
        bg-white
        z-50
        lg:hidden

        overflow-y-scroll      <!-- 🔥 scrollbar visible -->
        overscroll-contain     <!-- 🔥 scroll bleed fix -->
    ">


        <!-- MOBILE HEADER -->
        <div class="flex items-center justify-between px-4 h-[88px] border-b">

            <img src="https://www.eggfirst.com/assets/imgs/logo/logo.svg" class="h-8" alt="Eggfirst">

            <button @click="mobile=false" class="p-2 rounded-full hover:bg-gray-100 transition cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- MOBILE CONTENT -->
        <div
            class="
        px-6
        py-10
        space-y-8
        text-[18px]
        font-medium
        min-h-full        <!-- 🔥 IMPORTANT -->
    ">


            <a href="#" class="block cursor-pointer">Home</a>
            <a href="#" class="block cursor-pointer">Work</a>
            <a href="#" class="block cursor-pointer">About</a>

            <!-- SERVICES ACCORDION -->
            <div>
                <button @click="mobileServices = !mobileServices"
                    class="w-full flex justify-between items-center cursor-pointer">
                    <span>Services</span>
                    <svg class="w-4 h-4 transition-transform duration-300" :class="mobileServices && 'rotate-180'"
                        fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="mobileServices" x-transition class="pl-4 pt-6 space-y-5 text-[16px] font-normal">
                    <a href="#" class="block cursor-pointer">Services Overview</a>
                    <a href="#" class="block cursor-pointer">Marketing + Communications</a>
                    <a href="#" class="block cursor-pointer">Experience + Consulting</a>
                    <a href="#" class="block cursor-pointer">Media + Sponsorship</a>
                    <a href="#" class="block cursor-pointer">Specialist Services</a>
                </div>
            </div>

            {{-- <a href="#" class="block cursor-pointer">Thinking</a> --}}
            {{-- <a href="#" class="block cursor-pointer">Careers</a>
            <ul class="text-lg flex gap-x-8 mb-10">
                <li><a class="hover:underline focus:underline active:underline" href="/news">News</a></li>
                <li><a class="hover:underline focus:underline active:underline" href="">Investors</a></li>

            </ul> --}}
        </div>
    </div>

</header>
