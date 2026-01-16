<div>
    <form wire:submit.prevent="save"
          class="space-y-8 bg-white p-8 rounded-2xl border max-w-4xl">

        <h2 class="text-2xl font-semibold">
            Project Details / Inside Page
        </h2>

        {{-- SUCCESS --}}
        @if (session()->has('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- STEP 1: SELECT PROJECT -->
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-600">
                Select Project
            </label>

            <select wire:model.live="project_id"
                    class="w-full rounded-lg border px-4 py-2">
                <option value="">Choose existing project</option>
                @foreach($projects as $p)
                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                @endforeach
            </select>
        </div>

        @if($project)

            <!-- CONTEXT INFO (LOCKED) -->
            <div class="grid grid-cols-2 gap-6 bg-gray-50 p-5 rounded-xl">
                <div>
                    <p class="text-xs text-gray-400 uppercase">Category</p>
                    <p class="font-medium">{{ $category }}</p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 uppercase">Service</p>
                    <p class="font-medium">{{ $service }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-xs text-gray-400 uppercase">Project</p>
                    <p class="font-semibold">{{ $project->title }}</p>
                </div>
            </div>

            <!-- INSIDE HERO -->
            <div class="space-y-3">
                <label class="text-sm font-medium text-gray-700">
                    Inside Page Hero
                </label>

                <select wire:model.live="inner_hero_type"
                        class="rounded-lg border px-4 py-2">
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>

                @if($inner_hero_type === 'image')
                    <div wire:key="inner-hero-image">
                        <input type="file"
                               wire:model="hero_upload"
                               class="w-full rounded-lg border px-4 py-2">

                        @if($hero_upload)
                            <img src="{{ $hero_upload->temporaryUrl() }}"
                                 class="mt-3 max-w-sm rounded-lg border">
                        @endif
                    </div>
                @else
                    <div wire:key="inner-hero-video">
                        <input type="text"
                               wire:model.defer="inner_hero_media"
                               placeholder="Video URL"
                               class="w-full rounded-lg border px-4 py-2">
                    </div>
                @endif
            </div>

            <!-- INTRO CONTENT -->
            <div class="space-y-4">
                <input wire:model.defer="intro_heading"
                       placeholder="Intro Heading"
                       class="w-full rounded-lg border px-4 py-3 text-lg font-medium">

                <textarea wire:model.defer="intro_description"
                          rows="6"
                          placeholder="Intro description explaining the work..."
                          class="w-full rounded-lg border px-4 py-3"></textarea>
            </div>

            <!-- SERVICES USED -->
            <div class="space-y-3">
                <label class="text-sm font-medium text-gray-700">
                    Services Used (frontend pills)
                </label>

                <div class="flex gap-2">
                    <input wire:model="serviceInput"
                           wire:keydown.enter.prevent="addService"
                           class="flex-1 rounded-lg border px-4 py-2">

                    <button type="button"
                            wire:click="addService"
                            class="px-4 py-2 rounded-lg bg-[#f38121] text-white">
                        Add
                    </button>
                </div>

                <div class="flex flex-wrap gap-2">
                   @if(is_array($services))
    @foreach($services as $i => $s)
        <span wire:key="service-{{ $i }}"
              class="px-3 py-1 bg-gray-100 rounded-full text-sm flex items-center gap-2">
            {{ $s }}
            <button type="button"
                    wire:click="removeService({{ $i }})"
                    class="text-gray-500 hover:text-red-600 font-bold">
                ×
            </button>
        </span>
    @endforeach
@endif

                </div>
            </div>

            <!-- SAVE -->
            <div class="pt-6 border-t flex justify-end">
                <button class="bg-[#f38121] text-white px-8 py-3 rounded-xl">
                    Save Project Details
                </button>
            </div>

        @endif
    </form>
</div>
