<div class="space-y-6">

    <!-- HEADER + ACTION -->
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold">Project Details</h1>
            <p class="text-sm text-gray-500">
                Inside page content (read only)
            </p>
        </div>

        <!-- ADD / EDIT BUTTON (GLOBAL) -->
        <a href="{{ route('admin.projects.details.edit') }}"
            class="inline-flex items-center gap-2 bg-[#f38121] text-white px-4 py-2 rounded-lg">
            + Add / Edit Project Details
        </a>

    </div>

    {{-- INFO / SUCCESS --}}
    @if (session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-700
                    px-4 py-3 rounded-lg text-sm">
            ✅ {{ session('success') }}
        </div>
    @else
        <div class="bg-blue-50 border border-blue-200 text-blue-700
                    px-4 py-3 rounded-lg text-sm">
            ℹ️ This page shows <strong>inside page content</strong> for projects.
            To update content, click <strong>Add / Edit Project Details</strong>.
        </div>
    @endif

    <!-- TABLE -->
    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="text-left text-xs uppercase text-gray-500">
                    <th class="px-6 py-3">Project</th>
                    <th class="px-6 py-3">Hero Type</th>
                    <th class="px-6 py-3">Intro Heading</th>
                    <th class="px-6 py-3">Services</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($details as $row)
                    <tr>

                        <!-- PROJECT -->
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">
                                {{ $row->work->title ?? '—' }}
                            </div>
                            <div class="text-xs text-gray-500">
                                Project ID: {{ $row->work_id }}
                            </div>
                        </td>

                        <!-- HERO TYPE -->
                        <td class="px-6 py-4 text-sm capitalize">
                            {{ $row->inner_hero_type ?? '—' }}
                        </td>

                        <!-- INTRO -->
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $row->intro_heading ?: '—' }}
                        </td>

                        <!-- SERVICES -->
                        <td class="px-6 py-4">
                            @php
                                $services = is_array($row->services) ? array_filter($row->services) : [];
                            @endphp

                            @if (count($services))
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($services as $s)
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100">
                                            {{ $s }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">—</span>
                            @endif
                        </td>

                        <!-- ACTION -->
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.projects.details.edit', $row->work_id) }}"
                                class="text-sm text-[#f38121] font-medium hover:underline">
                                Edit
                            </a>

                             <!-- VIEW -->
        <a href="{{ route('work.detail', $row->work->slug) }}"
           target="_blank"
           class="text-sm text-gray-600 hover:text-gray-900 font-medium">
            View
        </a>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                            No project details found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
