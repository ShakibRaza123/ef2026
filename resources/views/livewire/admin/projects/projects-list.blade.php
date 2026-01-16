<div class="space-y-8">

    <!-- ================= HEADER ================= -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Projects</h1>
            <p class="text-sm text-gray-500">Manage all projects / works</p>
        </div>

        <div class="flex gap-3 items-center">
            <!-- SEARCH -->
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search projects..."
                class="w-64 rounded-lg border px-4 py-2 text-sm
                       focus:ring-2 focus:ring-[#f38121] focus:outline-none" />

            <!-- ADD BUTTON -->
            <a href="{{ route('admin.projects.create') }}"
                class="bg-[#f38121] hover:bg-[#e37218] transition
                      text-white px-5 py-2 rounded-lg text-sm font-medium">
                + Add Project
            </a>
        </div>
    </div>

    <!-- ================= SUCCESS MESSAGE ================= -->
    @if (session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- ================= PROJECT LIST ================= -->
    <div class="space-y-4">

        @forelse($projects as $project)
            <div wire:key="project-{{ $project->id }}"
                class="bg-white border rounded-xl p-5
                       hover:shadow-md transition">

                <div class="grid grid-cols-12 gap-6 items-start">

                    <!-- PROJECT INFO -->
                    <div class="col-span-12 lg:col-span-4">
                        <h3 class="font-semibold text-base text-gray-900">
                            {{ $project->title }}
                        </h3>

                        @if ($project->mini_text)
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $project->mini_text }}
                            </p>
                        @endif

                        <span
                            class="inline-block mt-3 text-xs px-3 py-1 rounded-full
                            {{ $project->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $project->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <!-- HERO -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        @if ($project->hero_media_type === 'image' && $project->hero_media)
                            <img src="{{ asset($project->hero_media) }}"
                                class="w-full max-w-[200px] h-[120px]
                   object-cover rounded-lg border"
                                alt="">
                        @elseif ($project->hero_media_type === 'video' && $project->hero_media)
                            <video class="w-full max-w-[200px] rounded-lg border" controls>
                                <source src="{{ $project->hero_media }}" type="video/mp4">
                            </video>
                        @else
                            <div
                                class="w-[200px] h-[120px]
                    flex items-center justify-center
                    text-gray-400 border rounded-lg">
                                No Media
                            </div>
                        @endif
                    </div>


                    <!-- ROTATING TEXT -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <p class="text-xs font-semibold text-gray-400 mb-2">
                            Rotating Text
                        </p>

                        @if (is_array($project->rotating_text))
                            <ul class="space-y-1 text-sm text-gray-600">
                                @foreach ($project->rotating_text as $text)
                                    <li>• {{ $text }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-sm text-gray-400">—</span>
                        @endif
                    </div>

                    <!-- ACTIONS -->
                    <div class="col-span-12 lg:col-span-2 flex lg:flex-col gap-2">
                           <!-- EDIT -->
    <a href="{{ route('admin.projects.edit', $project->id) }}"
        class="text-sm px-3 py-2 rounded-lg text-center
               bg-blue-50 text-blue-700
               hover:bg-blue-100 transition">
        Edit
    </a>

                        <button wire:click="confirmDelete({{ $project->id }})"
                            class="text-sm px-3 py-2 rounded-lg
                                   bg-red-50 text-red-700
                                   hover:bg-red-100 transition">
                            Delete
                        </button>
                    </div>

                </div>
            </div>
        @empty
            <div class="text-center py-20 text-gray-400">
                No projects found
            </div>
        @endforelse

    </div>

    <!-- ================= PAGINATION ================= -->
    <div class="flex justify-center pt-6">
        {{ $projects->links() }}
    </div>

    <!-- ================= DELETE MODAL ================= -->
    @if ($deleteId)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl p-6 w-[360px]">
                <h3 class="text-lg font-semibold mb-2">Delete Project?</h3>
                <p class="text-sm text-gray-500 mb-4">
                    This action cannot be undone.
                </p>

                <div class="flex justify-end gap-2">
                    <button wire:click="$set('deleteId', null)" class="px-4 py-2 text-sm rounded-lg border">
                        Cancel
                    </button>

                    <button wire:click="deleteProject" class="px-4 py-2 text-sm rounded-lg bg-red-600 text-white">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
