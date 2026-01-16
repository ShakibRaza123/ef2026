<!-- ================= CONTACT SECTION ================= -->
<section class="pt-0 pb-12 sm:pt-24 sm:pb-16">


    <div class="max-w-[1400px] mx-auto w-full px-5 sm:px-6 lg:px-16">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">

            <!-- IMAGE : Hidden on Mobile, Visible on Desktop -->
            <div class="hidden lg:flex order-2 lg:order-1 justify-center mt-4 sm:mt-6 lg:mt-0">
                <img src="https://www.eggfirst.com/neweggfirst/assets/images/eggfirst-cup.jpg" alt="Eggfirst Coffee Cup"
                    class="w-full max-w-[260px] sm:max-w-md lg:max-w-full
                h-auto object-contain">
            </div>


            <!-- RIGHT SIDE : TITLE + FORM -->
            <div
                class="order-1 lg:order-2
           flex flex-col gap-6 w-full
           lg:items-start
           lg:justify-center
           lg:min-h-[calc(100svh-180px)]
           lg:py-10
           lg:pl-[110px]">



                {{-- <div class="max-w-[520px] px-0 lg:px-[50px]"> --}}


                <!-- TITLE -->
                <div>
                    <h2
                        class="text-[26px] sm:text-[32px] lg:text-[40px]
                               font-bold leading-tight mb-3">
                        Let's meet over<br>
                        a cup of coffee.
                    </h2>

                    <p class="text-xs text-black/50 mt-5 mb-3">
                        *Required fields
                    </p>
                </div>

                <!-- FORM -->
                <form id="coffeeForm" class="space-y-8 lg:space-y-10" novalidate>

                    <!-- FIRST NAME -->
                    <div>
                        <input type="text" name="firstname" placeholder="Name*"
                            class="w-full bg-transparent placeholder:text-black
                                   text-[15px] font-semibold outline-none
                                   border-b border-black pb-2">
                        <p class="mt-1 text-xs text-red-600 hidden">
                            Please enter your Name
                        </p>
                    </div>

                    <!-- PHONE -->
                    <div>
                        <input type="tel" name="phone" placeholder="Phone Number*" maxlength="10"
                            inputmode="numeric"
                            class="w-full bg-transparent placeholder:text-black
                                   text-[15px] font-semibold outline-none
                                   border-b border-black pb-2">
                        <p class="mt-1 text-xs text-red-600 hidden">
                            Please enter a valid 10-digit Phone Number
                        </p>
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <input type="email" name="email" placeholder="Email*"
                            class="w-full bg-transparent placeholder:text-black
                                   text-[15px] font-semibold outline-none
                                   border-b border-black pb-2">
                        <p class="mt-1 text-xs text-red-600 hidden">
                            Please enter a valid Email Address
                        </p>
                    </div>

                    <!-- SERVICES -->
                    <div class="relative">
                        <select name="service"
                            class="w-full bg-transparent text-[15px] font-semibold
                                   text-black outline-none appearance-none
                                   border-b border-black pb-2">
                            <option value="">Choose Services*</option>
                            <option>Brand Strategy</option>
                            <option>Advertising</option>
                            <option>Digital Marketing</option>
                            <option>Production</option>
                        </select>

                        <!-- Arrow -->
                        <span class="pointer-events-none absolute right-0 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>

                        <p class="mt-1 text-xs text-red-600 hidden">
                            Please select a Service
                        </p>
                    </div>

                    <!-- MESSAGE (OPTIONAL) -->
                    <div>
                        <textarea rows="4" name="message" placeholder="Message (Optional)"
                            class="w-full bg-transparent placeholder:text-black
                                   text-[15px] font-semibold outline-none
                                   border border-black p-3 resize-none"></textarea>
                    </div>

                    <!-- CHECKBOX -->
                    <div>
                        <div class="flex items-start gap-3 text-xs sm:text-sm text-black/60">
                            <input type="checkbox" name="consent" class="mt-1">
                            <p>
                                Your confidential information stays with us, protected by a promise that’s as good as our word.
                            </p>
                        </div>
                        <p class="mt-1 text-xs text-red-600 hidden">
                            You must agree before submitting
                        </p>
                    </div>

                    <button type="submit"
                        class="group w-full bg-black text-white py-3.5
           text-sm font-semibold tracking-wide
           border border-black
           flex items-center justify-center gap-2
           hover:bg-white hover:text-black
           transition-all duration-300
           cursor-pointer">

                        <span>Submit</span>

                        <!-- Arrow (only on hover) -->
                        <span
                            class="opacity-0 translate-x-[-6px]
                 group-hover:opacity-100 group-hover:translate-x-0
                 transition-all duration-300">
                            &rarr;
                        </span>
                    </button>



                </form>

            </div>

        </div>
    </div>

    </div>
</section>

<!-- ================= FORM VALIDATION JS ================= -->
<script>
    document.getElementById('coffeeForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let isValid = true;

        function toggleError(input, show) {
            const error = input.parentElement.querySelector('p.text-red-600');
            if (!error) return;
            error.classList.toggle('hidden', !show);
        }

        // First Name
        if (this.firstname.value.trim() === '') {
            toggleError(this.firstname, true);
            isValid = false;
        } else {
            toggleError(this.firstname, false);
        }

        // Phone
        if (!/^[0-9]{10}$/.test(this.phone.value.trim())) {
            toggleError(this.phone, true);
            isValid = false;
        } else {
            toggleError(this.phone, false);
        }

        // Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(this.email.value.trim())) {
            toggleError(this.email, true);
            isValid = false;
        } else {
            toggleError(this.email, false);
        }

        // Service
        if (this.service.value === '') {
            toggleError(this.service, true);
            isValid = false;
        } else {
            toggleError(this.service, false);
        }

        // Checkbox
        const consentError = this.consent.closest('div').nextElementSibling;
        if (!this.consent.checked) {
            consentError.classList.remove('hidden');
            isValid = false;
        } else {
            consentError.classList.add('hidden');
        }

        // Message is optional

        if (isValid) {
            alert('Form submitted successfully!');
            this.reset();
        }
    });
</script>
