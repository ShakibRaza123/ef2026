<div class="space-y-6">

    <!-- ================= HEADER ================= -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Services
            </h1>
            <p class="text-sm text-gray-500">
                Manage all services across all categories
            </p>
        </div>

        <div class="flex items-center gap-3">
            <!-- Search -->
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Search service or category..."
                    class="pl-10 pr-4 py-2 border rounded-lg text-sm
           focus:ring-[#f38121] focus:border-[#f38121]">

                <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>

            <!-- Add -->
            <a href="{{ route('admin.services.create') }}"
                class="inline-flex items-center gap-2 bg-[#f38121] text-white
                      px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Add Service
            </a>
        </div>
    </div>

    <!-- ================= SUCCESS MESSAGE ================= -->
    @if (session()->has('success'))
        <div
            class="rounded-lg bg-green-50 border border-green-200
                    px-4 py-3 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">

                <thead class="bg-gray-50 border-b">
                    <tr class="text-left text-xs uppercase tracking-wider text-gray-500">
                        <th class="px-6 py-4 w-14">#</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Service Name</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4 w-28">Status</th>
                        <th class="px-6 py-4 w-32 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($services as $index => $service)
                        <tr class="hover:bg-gray-50 transition">

                            <!-- Index -->
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $services->firstItem() + $index }}
                            </td>

                            <!-- Category -->
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $service->category->name ?? '—' }}
                            </td>

                            <!-- Service -->
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $service->title }}
                            </td>

                            <!-- Description -->
                            <td class="px-6 py-4 text-sm text-gray-600 max-w-xl">
                                {{ Str::limit($service->description, 80) }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $service->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $service->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-3">

                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        Edit
                                    </a>


                                    <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                                        Delete
                                    </button>

                                </div>
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center text-gray-500">
                                No services found
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- ================= PAGINATION ================= -->
        <div class="px-6 py-4 border-t bg-gray-50">
            {{ $services->links() }}
        </div>

    </div>
</div>
