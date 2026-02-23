<x-app-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Task Details</h1>
                <p class="text-gray-500 mt-1">Reviewing your objective.</p>
            </div>
            <a href="{{ route('tasks.edit', $task) }}" class="p-3 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-100 transition-colors">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </a>
        </div>

        <div class="bg-white border border-gray-100 shadow-2xl rounded-3xl overflow-hidden">
            <div class="p-8">
                <div class="mb-6">
                    @if($task->status === 'completed')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 mr-2 rounded-full bg-green-500"></span> Completed
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                            <span class="w-1.5 h-1.5 mr-2 rounded-full bg-amber-500"></span> Pending
                        </span>
                    @endif
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $task->title }}</h2>
                <p class="text-gray-600 leading-relaxed bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    {{ $task->description }}
                </p>
            </div>

            <div class="px-8 py-4 bg-gray-50/50 border-t border-gray-100 flex justify-between items-center">
                <span class="text-sm text-gray-400">Created: {{ $task->created_at->diffForHumans() }}</span>
                <a href="{{ route('tasks.index') }}" class="text-indigo-600 font-bold hover:text-indigo-800">← Back to Dashboard</a>
            </div>
        </div>
    </div>
</x-app-layout>