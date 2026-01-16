@php
    use App\Models\Work;
    use App\Models\ServiceCategory;

    // only for existence check
    $hasProjects = Work::exists();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EggFirst · Internal Console</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#f6f3ef] text-gray-800">

    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <aside class="w-[280px] bg-white border-r border-gray-100 flex flex-col">

            <!-- BRAND -->
            <div class="px-6 py-6 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#f38121]/10 flex items-center justify-center">
                    <i data-lucide="grid" class="w-5 h-5 text-[#f38121]"></i>
                </div>
                <div>
                    <h1 class="font-semibold text-gray-900 leading-none">EggFirst</h1>
                    <p class="text-[11px] text-gray-400">Admin Console</p>
                </div>
            </div>

            @php
                $is = fn($path) => request()->is($path);
                $isRoute = fn($name) => request()->routeIs($name);
            @endphp

            <!-- NAV -->
            <nav class="flex-1 px-3 space-y-8 text-sm">

                <!-- ================= OVERVIEW ================= -->
                <div>
                    <p class="px-3 mb-2 text-[11px] uppercase tracking-widest text-gray-400">
                        Overview
                    </p>

                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="relative flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                   {{ $is('console/dashboard')
                       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                        @if ($is('console/dashboard'))
                            <span
                                class="absolute left-0 top-1/2 -translate-y-1/2
                                     w-[3px] h-6 bg-[#f38121] rounded-full"></span>
                        @endif

                        <i data-lucide="home" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <!-- ================= WORK ================= -->
                <div class="relative pl-4">
                    <span class="absolute left-0 top-8 bottom-2 w-[2px] bg-gray-200 rounded-full"></span>

                    <p class="px-3 mb-2 text-[11px] uppercase tracking-widest text-gray-400">
                        Work
                    </p>

                    <!-- Projects -->
                    <a href="{{ route('admin.projects') }}"
                        class="flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                   {{ $is('console/projects')
                       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i data-lucide="folder" class="w-4 h-4"></i>
                        <span>Projects</span>
                    </a>

                    <!-- Project Details (ALL PROJECTS – NOT ID BASED) -->
                    @if ($hasProjects)
                        <a href="{{ route('admin.projects.details.view') }}"
                            class="relative flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
   {{ request()->routeIs('admin.projects.details*')
       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                            @if (request()->routeIs('admin.projects.details*'))
                                <span
                                    class="absolute left-0 top-1/2 -translate-y-1/2
                     w-[3px] h-6 bg-[#f38121] rounded-full"></span>
                            @endif

                            <i data-lucide="file-text" class="w-4 h-4"></i>
                            <span>Project Details</span>
                        </a>

                    @endif

                </div>

                <!-- ================= SERVICES ================= -->
                <div class="relative pl-4">
                    <span class="absolute left-0 top-8 bottom-2 w-[2px] bg-gray-200 rounded-full"></span>

                    <p class="px-3 mb-2 text-[11px] uppercase tracking-widest text-gray-400">
                        Services
                    </p>

                    <a href="{{ route('admin.services') }}"
                        class="flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                   {{ $isRoute('admin.services')
                       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i data-lucide="layers" class="w-4 h-4"></i>
                        <span>Services Category</span>
                    </a>

                    @php
                        $defaultCategory = ServiceCategory::where('status', 1)->orderBy('position')->first();
                    @endphp

                    @if ($defaultCategory)
                        <a href="{{ route('admin.services.category.view', $defaultCategory->slug) }}"
                            class="flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                       {{ $isRoute('admin.services.category.view*')
                           ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                           : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i data-lucide="folder-open" class="w-4 h-4"></i>
                            <span>View Services</span>
                        </a>
                    @endif
                </div>

                <!-- ================= SETTINGS ================= -->
                <div class="relative pl-4">
                    <span class="absolute left-0 top-8 bottom-2 w-[2px] bg-gray-200 rounded-full"></span>

                    <p class="px-3 mb-2 text-[11px] uppercase tracking-widest text-gray-400">
                        Settings
                    </p>

                    <a href="/console/users"
                        class="flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                   {{ $is('console/users')
                       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Admin Users</span>
                    </a>

                    <a href="/console/settings"
                        class="flex items-center gap-3 pl-4 pr-4 py-3 rounded-lg
                   {{ $is('console/settings')
                       ? 'bg-[#f38121]/10 text-[#f38121] font-medium'
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                        <span>System Settings</span>
                    </a>
                </div>
            </nav>

            <!-- USER -->
            <div class="px-6 py-5 border-t border-gray-100 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-xs font-semibold">
                    A
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Admin</p>
                    <p class="text-xs text-gray-400">Super Admin</p>
                </div>
            </div>
        </aside>

        <!-- ================= MAIN ================= -->
        <div class="flex-1 flex flex-col">
            <header class="h-[72px] bg-white border-b border-gray-100 px-10 flex items-center">
                <h2 class="text-xl font-semibold text-gray-900">Dashboard</h2>
            </header>

            <main class="p-10">
                {{ $slot }}
            </main>
        </div>

    </div>

    @livewireScripts
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
