<!-- ================= DASHBOARD CONTENT ================= -->
<div class="space-y-10">

    <!-- ================= HERO SUMMARY ================= -->
    <section
        class="rounded-3xl
           bg-gradient-to-r
           from-[#f38121]
           via-[#f59e0b]
           to-[#fbbf24]
           px-12 py-10
           text-white
           shadow-[0_25px_60px_-25px_rgba(243,129,33,0.6)]">


        <p class="text-xs uppercase tracking-widest opacity-80">
            Welcome Back
        </p>

        <h1 class="text-3xl font-semibold mt-2">
            EggFirst Admin Dashboard
        </h1>

        <p class="mt-2 text-sm opacity-90 max-w-2xl">
            Track internal performance, content growth & platform activity at a glance.
        </p>

        <div class="mt-6 flex gap-6">
            <div class="bg-white/20 rounded-xl px-4 py-3 text-sm">
                <p class="opacity-80">Today</p>
                <p class="font-semibold">10 Jan 2026</p>
            </div>
            <div class="bg-white/20 rounded-xl px-4 py-3 text-sm">
                <p class="opacity-80">System Status</p>
                <p class="font-semibold">All Systems Live</p>
            </div>
        </div>
    </section>

    <!-- ================= STATS GRID ================= -->
    <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

        <!-- TOTAL FORMS -->
        <div class="bg-white rounded-3xl p-8 shadow-md">
            <p class="text-xs uppercase tracking-widest text-gray-400">
                Total Form Submissions
            </p>
            <p class="text-4xl font-semibold mt-4">
                1,284
            </p>
            <p class="text-sm text-green-600 mt-2">
                +18% vs last month
            </p>
        </div>

        <!-- TOTAL BLOGS -->
        <div class="bg-white rounded-3xl p-8 shadow-md">
            <p class="text-xs uppercase tracking-widest text-gray-400">
                Blogs Published
            </p>
            <p class="text-4xl font-semibold mt-4">
                246
            </p>
            <p class="text-sm text-blue-600 mt-2">
                +12 new this month
            </p>
        </div>

        <!-- TOTAL WORK -->
        <div class="bg-white rounded-3xl p-8 shadow-md">
            <p class="text-xs uppercase tracking-widest text-gray-400">
                Total Work
            </p>
            <p class="text-4xl font-semibold mt-4">
                68
            </p>
            <p class="text-sm text-gray-500 mt-2">
                Active & Archived
            </p>
        </div>

        <!-- CASE STUDIES -->
        <div class="bg-white rounded-3xl p-8 shadow-md">
            <p class="text-xs uppercase tracking-widest text-gray-400">
                Case Studies
            </p>
            <p class="text-4xl font-semibold mt-4">
                24
            </p>
            <p class="text-sm text-orange-500 mt-2">
                4 pending review
            </p>
        </div>

    </section>

    <!-- ================= ANALYTICS ================= -->
    <section class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <!-- ACTIVITY OVERVIEW -->
        <div class="xl:col-span-2 bg-white rounded-3xl p-8 shadow-md">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="font-semibold text-lg">
                        Platform Activity Overview
                    </h3>
                    <p class="text-sm text-gray-400">
                        Forms · Blogs · Work · Case Studies
                    </p>
                </div>
                <select class="text-sm rounded-lg border border-gray-200 px-3 py-1">
                    <option>This Month</option>
                    <option>Last Month</option>
                </select>
            </div>

            <!-- CHART PLACEHOLDER -->
            <div
                class="h-[260px] rounded-xl bg-gradient-to-br
                       from-gray-50 to-gray-100
                       flex items-center justify-center text-sm text-gray-400">
                Chart placeholder (Chart.js / ApexCharts)
            </div>
        </div>

        <!-- RECENT ACTIVITY -->
        <div class="bg-white rounded-3xl p-8 shadow-md">
            <h3 class="font-semibold text-lg mb-6">
                Recent Activity
            </h3>

            <ul class="space-y-5 text-sm">

                <li class="flex justify-between">
                    <span class="text-gray-600">
                        New form submitted
                    </span>
                    <span class="text-gray-400">
                        5 min ago
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-600">
                        Blog published
                    </span>
                    <span class="text-gray-400">
                        2 hrs ago
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-600">
                        Case study updated
                    </span>
                    <span class="text-gray-400">
                        Yesterday
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-600">
                        New work added
                    </span>
                    <span class="text-gray-400">
                        2 days ago
                    </span>
                </li>

            </ul>
        </div>

    </section>

</div>
