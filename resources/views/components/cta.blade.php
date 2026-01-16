<section class="relative bg-black text-white overflow-hidden min-h-[480px]">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/assets/banner/banner3.jpg" class="w-full h-full object-cover opacity-50" alt="Background">
        <div class="absolute inset-0"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative max-w-6xl mx-auto
px-4 sm:px-6 lg:px-8
py-16 sm:py-20 lg:py-28
">

        <!-- TOP TEXT -->
        <p class="text-sm text-white/70 mb-14 max-w-xl">
            At Creative Horizon, every frame begins with imagination and ends with impact.
        </p>

        <!-- CTA + FORM WRAPPER -->
        <div class="mx-auto">

            <!-- CTA -->
            <div class="mb-12 md:text-left">
                <button
                    class="inline-flex gap-4
           text-[22px] sm:text-2xl lg:text-2xl
           font-semibold tracking-wide
           group transition-all text-justify">
                    LET’S CONNECT
                    <span class="transition-transform duration-300 group-hover:translate-x-2">
                        →
                    </span>
                </button>
            </div>

            <form class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 items-end" id="contactForm" novalidate>

                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2 text-white/70">
                        Name *
                    </label>
                    <input type="text" name="name" required minlength="2"
                        class="w-full bg-transparent border-b border-white/40
               focus:border-[#d4af37] outline-none py-2
               text-white placeholder-white/40 transition-colors"
                        placeholder="Your name">

                    <!-- ERROR -->
                    <p class="mt-1 text-[11px] text-red-400 error-msg"></p>
                </div>


                <!-- EMAIL -->
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2 text-white/70">
                        Email Address *
                    </label>
                    <input type="email" name="email" required
                        class="w-full bg-transparent border-b border-white/40
               focus:border-[#d4af37] outline-none py-2
               text-white placeholder-white/40 transition-colors"
                        placeholder="you@example.com">

                    <!-- ERROR -->
                    <p class="mt-1 text-[11px] text-red-400 error-msg"></p>
                </div>


                <!-- CONTACT -->
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2 text-white/70">
                        Contact Number *
                    </label>
                    <input type="tel" name="mobile" required inputmode="numeric" pattern="[0-9]{10}" maxlength="10"
                        class="w-full bg-transparent border-b border-white/40
               focus:border-[#d4af37] outline-none py-2
               text-white placeholder-white/40 transition-colors"
                        placeholder="10 digit mobile number">

                    <!-- ERROR -->
                    <p class="mt-1 text-[11px] text-red-400 error-msg"></p>
                </div>

                <!-- SUBMIT -->
                <div class="md:col-span-3 mt-10 text-center md:text-right">
                    <button type="submit"
                        class="inline-flex items-center gap-3
                   px-8 py-3
                   border border-[#d4af37]/60
                   text-[#d4af37]
                   uppercase tracking-widest text-xs
                   rounded-full
                   transition-all duration-300
                   hover:bg-[#d4af37]
                   hover:text-black  cursor-pointer">
                        Send Message →
                    </button>
                </div>

            </form>


        </div>



    </div>

</section>
