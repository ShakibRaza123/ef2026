<div class="space-y-6">

    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Service Categories</h2>

        <a href="{{ route('admin.service.categories') }}" class="px-5 py-2 bg-[#f38121] text-white rounded-lg">
            Manage Categories
        </a>
    </div>

    @if (session()->has('success'))
        <div
            class="flex items-center justify-between
               bg-green-50 border border-green-200
               text-green-800 px-5 py-3 rounded-lg">
            <span>{{ session('success') }}</span>

            <button onclick="this.parentElement.remove()" class="text-green-600 font-bold">
                ×
            </button>
        </div>
    @endif


    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="px-6 py-3 text-left">Category Name</th>
                     <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Slug</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr class="border-t">
                        <td class="px-6 py-3 font-medium">
                            {{ $category->name }}
                        </td>

                        <td class="px-6 py-3 text-gray-500">
                            {{ $category->description }}
                        </td>

                        <td class="px-6 py-3 text-gray-500">
                            {{ $category->slug }}
                        </td>

                        <td class="px-6 py-3 text-center">
                            @if ($category->status)
                                <span class="text-green-600">Active</span>
                            @else
                                <span class="text-red-500">Inactive</span>
                            @endif
                        </td>

                        <td class="px-6 py-3 text-right space-x-4">
                            <a href="#" class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            <button class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-400">
                            No categories found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
