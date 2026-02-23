<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">My Tasks</h1>
                <p class="text-gray-500 mt-1">Manage your productivity and daily goals.</p>
            </div>
            <a href="{{ route('tasks.create') }}"
               class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 transform hover:-translate-y-0.5 transition-all text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-indigo-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Task
            </a>
        </div>

        @if(session('status'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                 class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-900 p-4 rounded-r-lg mb-8 shadow-sm transition-opacity duration-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                        </svg>
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white border border-gray-100 shadow-2xl rounded-3xl overflow-hidden">
            <div class="overflow-x-auto"> <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50 uppercase text-xs font-semibold text-gray-500">
                        <tr>
                            <th class="p-6">Task Details</th>
                            <th class="p-6">Status</th>
                            <th class="p-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($tasks as $task)
                            <tr class="group hover:bg-indigo-50/30 transition-colors">
                                <td class="p-6">
                                    <div class="font-bold text-gray-800 text-lg group-hover:text-indigo-600 transition-colors">
                                        {{ $task->title }}
                                    </div>
                                    <div class="text-gray-400 text-sm truncate max-w-xs">
                                        {{ Str::limit($task->description, 50) }}
                                    </div>
                                </td>
                                <td class="p-6">
                                    @if($task->status === 'completed')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 mr-2 rounded-full bg-green-500"></span> Completed
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                            <span class="w-1.5 h-1.5 mr-2 rounded-full bg-amber-500"></span> Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="p-6 text-right space-x-2">
                                    <div class="flex justify-end items-center space-x-3">
                                        <a href="{{ route('tasks.show', $task) }}" class="text-gray-400 hover:text-indigo-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="text-gray-400 hover:text-amber-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                            @csrf @method('DELETE')
                                            <button class="text-gray-400 hover:text-red-600 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gray-100 p-4 rounded-full mb-4 text-gray-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                        </div>
                                        <p class="text-gray-500 text-lg">No tasks found. Start by creating one!</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($tasks instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    {{ $tasks->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>