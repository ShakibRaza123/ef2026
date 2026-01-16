<div class="max-w-xl space-y-6">

    <h2 class="text-2xl font-semibold">Add Service Category</h2>

    <div class="bg-white rounded-2xl border p-6 space-y-4">

        <!-- Category Name -->
        <div>
            <label class="text-sm text-gray-500">Category Name</label>
            <input
                type="text"
                wire:model.defer="name"
                placeholder="e.g. Strategy & Consulting"
                class="w-full mt-1 px-4 py-2 border rounded-lg
                       focus:ring-[#f38121] focus:border-[#f38121]"
            >
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- ✅ Category Description -->
        <div>
            <label class="text-sm text-gray-500">Description</label>
            <textarea
                wire:model.defer="description"
                rows="3"
                placeholder="Short description about this category"
                class="w-full mt-1 px-4 py-2 border rounded-lg
                       focus:ring-[#f38121] focus:border-[#f38121]"
            ></textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('admin.services') }}"
               class="px-5 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">
                Cancel
            </a>

            <button
                wire:click="save"
                class="px-6 py-2 bg-[#f38121] text-white rounded-lg hover:opacity-90">
                Save & Return
            </button>
        </div>

    </div>

</div>
