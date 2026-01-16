<div class="space-y-6">

    <!-- ================= HEADER ================= -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Edit Service</h2>
            <p class="text-sm text-gray-500">
                Update service details and assign works
            </p>
        </div>

        <a href="{{ route('admin.services') }}" class="text-sm text-gray-600 hover:underline">
            ← Back to Services
        </a>
    </div>

    <!-- ================= SUCCESS MESSAGE ================= -->
    @if (session()->has('success'))
        <div class="rounded-lg bg-green-50 border border-green-200
                   px-4 py-3 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- ================= CARD ================= -->
    <div class="bg-white rounded-xl border p-6 max-w-3xl">

        <form wire:submit.prevent="update" class="space-y-6">

            <!-- Service Title -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Service Title
                </label>
                <input type="text" wire:model.defer="title" class="w-full rounded-lg border px-4 py-2">
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Category
                </label>
                <select wire:model.defer="service_category_id" class="w-full rounded-lg border px-4 py-2">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Hero Video -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Hero Video URL
                </label>
                <input type="text" wire:model.defer="hero_video" placeholder="https://example.com/video.mp4"
                    class="w-full rounded-lg border px-4 py-2">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Description
                </label>
                <textarea wire:model.defer="description" rows="4" class="w-full rounded-lg border px-4 py-2"></textarea>
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model.defer="status">
                <span>Active</span>
            </div>

            <!-- ================= ASSIGN WORKS ================= -->
            <div class="border-t pt-6">
                <h3 class="text-sm font-semibold mb-3">
                    Assign Works
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach ($works as $work)
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" wire:model="selectedWorks" value="{{ $work->id }}">
                            {{ $work->client_name }}
                        </label>
                    @endforeach
                </div>

            </div>

            <!-- ================= ACTIONS ================= -->
            <div class="flex items-center gap-3 pt-4">
                <button type="submit" class="bg-[#f38121] text-white px-6 py-2 rounded-lg">
                    Update Service
                </button>

                <a href="{{ route('admin.services') }}" class="text-sm text-gray-600 hover:underline">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>
