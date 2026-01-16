<div class="min-h-screen flex items-center justify-center bg-[#f6f3ef] px-4">

    <div
        class="w-full max-w-md bg-white rounded-2xl shadow-[0_20px_60px_-20px_rgba(0,0,0,0.25)]
               p-10 relative">

        <!-- BRAND -->
        <div class="mb-10 text-center">
            <img src="{{ asset('assets/logo/logo.svg') }}" class="h-8 mx-auto mb-4" alt="EggFirst">

            <p class="text-xs tracking-[0.3em] uppercase text-gray-400">
                Internal Console
            </p>
        </div>

        <!-- FORM -->
        <form wire:submit.prevent="login" class="space-y-6" x-data="{ show: false }">

            <!-- EMAIL -->
            <div>
                <label class="block text-sm text-gray-600 mb-2">
                    Email
                </label>
                <input type="email" wire:model.defer="email" placeholder="name@company.com"
                    class="w-full px-4 py-3 rounded-lg
                           border border-gray-300
                           focus:outline-none
                           focus:ring-2 focus:ring-[#f38121]/40">
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm text-gray-600 mb-2">
                    Password
                </label>

                <div class="relative">
                    <input :type="show ? 'text' : 'password'" wire:model.defer="password" placeholder="••••••••"
                        class="w-full px-4 py-3 pr-12 rounded-lg
                               border border-gray-300
                               focus:outline-none
                               focus:ring-2 focus:ring-[#f38121]/40">

                    <!-- EYE TOGGLE -->
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-3
                               flex items-center text-gray-400
                               hover:text-gray-600">

                        <!-- EYE -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5
                                     c4.478 0 8.268 2.943 9.542 7
                                     -1.274 4.057-5.064 7-9.542 7
                                     -4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <!-- EYE OFF -->
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3l18 18" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M10.584 10.586a2 2 0 002.83 2.83" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.88 5.083A9.953 9.953 0 0112 5
                                     c4.478 0 8.268 2.943 9.542 7
                                     a9.965 9.965 0 01-1.249 2.592" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.343 6.343A9.957 9.957 0 002.458 12
                                     c1.274 4.057 5.065 7 9.542 7
                                     a9.97 9.97 0 004.132-.879" />
                        </svg>
                    </button>
                </div>

                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- SUBMIT -->
            <button type="submit"
                class="w-full py-3 rounded-lg
                       bg-[#f38121] text-white font-medium
                       tracking-wide
                       hover:bg-[#e37016]
                       transition-all duration-300">
                Continue
            </button>

        </form>

        <!-- FOOTNOTE -->
        <p class="mt-8 text-xs text-center text-gray-400">
            Authorized access only
        </p>
    </div>
</div>
