@php
    $enableCategoryService = false;
@endphp

<div class="max-w-4xl space-y-8">

    <!-- PAGE HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Edit Project</h2>
            <p class="text-sm text-gray-500 mt-1">
                Update and manage your project showcase
            </p>
        </div>
    </div>

    <form wire:submit.prevent="update" class="space-y-8 bg-white p-8 rounded-2xl border shadow-sm"
        enctype="multipart/form-data">

        <!-- ================= BASIC INFO ================= -->
        <div class="space-y-6">
            <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">
                Basic Information
            </h3>

            <!-- CATEGORY & SERVICE -->
            @if ($enableCategoryService)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Category</label>
                        <select wire:model.live="service_category_id"
                            class="mt-1 w-full rounded-xl border px-4 py-2
                       focus:ring-2 focus:ring-[#f38121] focus:outline-none">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Service</label>
                        <select wire:model.live="service_id"
                            class="mt-1 w-full rounded-xl border px-4 py-2
                       focus:ring-2 focus:ring-[#f38121] focus:outline-none">
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif


            <!-- MINI TEXT -->
            <div>
                <label class="text-sm font-medium text-gray-700">Client Name</label>
                <input wire:model.defer="client_name" class="mt-1 w-full rounded-xl border px-4 py-2">
            </div>

            <!-- TITLE -->
            <div>
                <label class="text-sm font-medium text-gray-700">Project Title</label>
                <input wire:model.defer="title" class="mt-1 w-full rounded-xl border px-4 py-2">
            </div>
        </div>

        <!-- ================= ROTATING TEXT ================= -->
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">
                Rotating Highlights
            </h3>

            <div class="flex gap-3" wire:keydown.enter.stop.prevent="addRotatingText">
                <input type="text" wire:model.live="rotatingTextInput" placeholder="Type & press Enter"
                    class="flex-1 rounded-xl border px-4 py-2" />

                <button type="button" wire:click="addRotatingText"
                    class="px-5 py-2 rounded-xl bg-[#f38121] text-white">
                    Add
                </button>
            </div>

            @if (count($rotating_text))
                <div class="flex flex-wrap gap-2">
                    @foreach ($rotating_text as $index => $text)
                        <span wire:key="rotating-{{ $index }}"
                            class="inline-flex items-center gap-2
                                   bg-gray-100 border px-3 py-1.5 rounded-full text-sm">
                            {{ $text }}

                            <button type="button" wire:click="removeRotatingText({{ $index }})"
                                class="text-gray-400 hover:text-red-600 font-bold">
                                ×
                            </button>
                        </span>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- ================= HERO MEDIA ================= -->
        <div class="space-y-6">
            <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">
                Hero Media
            </h3>

            <select wire:model.live="hero_media_type" class="w-full rounded-xl border px-4 py-2">
                <option value="image">Hero Image</option>
                <option value="video">Hero Video</option>
            </select>

            @if ($hero_media_type === 'image')
                <div>
                    <input type="file" wire:model="hero_image" accept="image/*"
                        class="w-full rounded-xl border px-4 py-2">

                    <!-- New preview -->
                    @if ($hero_image)
                        <img src="{{ $hero_image->temporaryUrl() }}" class="mt-4 w-full max-w-sm rounded-xl border">
                    @elseif ($hero_media)
                        <img src="{{ asset($hero_media) }}" class="mt-4 w-full max-w-sm rounded-xl border">
                    @endif
                </div>
            @else
                <div>
                    <input type="text" wire:model.live="hero_media" class="w-full rounded-xl border px-4 py-2">

                    @if ($hero_media)
                        <video controls class="mt-4 w-full rounded-xl border">
                            <source src="{{ $hero_media }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            @endif
        </div>

        <!-- ================= SETTINGS ================= -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t">
            <input type="number" wire:model.defer="position" placeholder="Position"
                class="w-full rounded-xl border px-4 py-2">

            <label class="flex items-center gap-3 text-sm">
                <input type="checkbox" wire:model="status">
                Active Project
            </label>
        </div>

        <!-- ================= ACTION ================= -->
        <div class="flex justify-end pt-6">
            <button type="submit"
                class="bg-[#f38121] hover:bg-[#e37218]
                           text-white px-8 py-3 rounded-xl font-semibold">
                Update Project
            </button>
        </div>

    </form>
</div>
