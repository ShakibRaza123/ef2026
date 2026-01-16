<section x-data="{ active: null }" class="bg-white py-5">

    <!-- HEADER -->
    <div class="max-w-[1400px] mx-auto px-6 lg:px-16">
        <div class="flex justify-between items-center mb-14">
            <h2 class="text-[28px] sm:text-[32px] lg:text-[40px] font-bold text-black">
                News, V!ews and Breakthroughs
            </h2>


            <a href="/news"
                class="hidden lg:inline-flex
          group items-center gap-2 text-[22px] font-bold
          border-b border-black pb-1
          transition-all duration-300 text-black">
                See All News
                <span class="transition-transform duration-300 group-hover:translate-x-2">→</span>
            </a>
        </div>
    </div>

    <!-- LIST -->
    <div class="border-t border-black">

        <!-- ITEM 1 -->
        <a href="/blog/beyond-basic-cuts" @mouseenter="active = 1" @mouseleave="active = null" class="block">

            <div class="border-b border-black transition-colors duration-300"
                :class="active === 1 ? 'bg-[#f58220]' : 'bg-white'">

                <div
                    class="max-w-[1400px] mx-auto
                            px-5 lg:px-16   
                            py-8 lg:py-10
                            grid grid-cols-12 gap-y-3
                            items-start lg:items-center">

                    <!-- DATE (LEFT ON MOBILE) -->
                    <div class="col-span-4 lg:col-span-2 text-xs uppercase tracking-widest"
                        :class="active === 1 ? 'text-white' : 'text-black/60'">
                        Dec 2025
                    </div>

                    <!-- TITLE (HIDE ON MOBILE) -->
                    <div class="hidden lg:block col-span-8 lg:col-span-6 lg:text-left">
                        <h3 class="font-bold leading-snug text-[18px] lg:text-[22px]"
                            :class="active === 1 ? 'text-white' : 'text-black'">

                            <span
                                class="relative inline
                   after:content-['']
                   after:absolute
                   after:left-1/2
                   after:-translate-x-1/2
                   after:-bottom-1
                   after:h-[2px]
                   after:w-0
                   after:bg-current
                   after:transition-[width]
                   after:duration-300
                   after:ease-out"
                                :class="active === 1 ? 'after:w-full' : ''">

                                Unfading words makes psychological violence impossible to ignore
                            </span>
                        </h3>
                    </div>



                    <!-- DESKTOP IMAGE -->
                    <div class="hidden lg:flex col-span-3 justify-end overflow-hidden">
                        <div class="w-[200px]">
                            <img src="https://www.eggfirst.com/neweggfirst/assets/demo/img7.png"
                                class="w-full h-auto rounded-md shadow-lg
                                        transform-gpu transition-all duration-300 ease-out"
                                :class="active === 1 ?
                                    'opacity-100 translate-y-0' :
                                    'opacity-0 translate-y-4'">
                        </div>
                    </div>

                    <!-- DESKTOP ARROW -->
                    <div class="hidden lg:flex col-span-1 justify-end text-xl"
                        :class="active === 1 ? 'text-white' : 'text-black'">
                        →
                    </div>


                    <!-- TITLE + IMAGE (MOBILE: CUT-TO-CUT) -->
                    <div class="col-span-8 lg:col-span-6 lg:text-left">

                        <!-- TITLE -->
                        <h3 class="font-bold leading-snug text-[18px] lg:text-[22px]
                            lg:text-left lg:hidden"
                            :class="active === 1 ? 'text-white' : 'text-black'">

                            <span
                                class="relative inline
                                after:content-['']
                                after:absolute
                                after:left-1/2 lg:after:left-0
                                after:-translate-x-1/2 lg:after:translate-x-0
                                after:-bottom-1
                                after:h-[2px]
                                after:w-0
                                after:bg-current
                                after:transition-[width]
                                after:duration-300"
                                :class="active === 1 ? 'after:w-full' : ''">
                                Unfading words makes psychological violence impossible to ignore
                            </span>

                            <span class="inline lg:hidden"> →</span>
                        </h3>

                        <!-- MOBILE IMAGE : CUT TO CUT -->
                        <div class="lg:hidden flex mt-4">
                            <img src="https://www.eggfirst.com/neweggfirst/assets/demo/img7.png"
                                class="w-full max-w-[56%] h-auto rounded-md border">
                        </div>

                    </div>

                </div>
            </div>
        </a>

    </div>

    <!-- MOBILE SEE ALL CTA -->
    <div class="lg:hidden">
        <div class="max-w-[1400px] mx-auto px-6 py-8">
            <a href="/news"
                class="block lg:hidden
          group inline-flex items-center gap-2
          text-[18px] font-semibold
          border-b border-black pb-1
          transition-all duration-300 text-black">

                See All News
                <span class="transition-transform duration-300 group-hover:translate-x-2">
                    →
                </span>
            </a>
        </div>
    </div>



</section>
