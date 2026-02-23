<x-app-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Edit Task</h1>
            <p class="text-gray-500 mt-1">Updating: <span class="text-indigo-600 font-semibold">{{ $task->title }}</span></p>
        </div>

        <div class="bg-white border border-gray-100 shadow-2xl rounded-3xl p-8">
            <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Task Title</label>
                    <input type="text" name="title" value="{{ $task->title }}"
                           class="w-full border-gray-200 focus:border-amber-500 focus:ring-amber-500 p-4 rounded-xl transition-all bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full border-gray-200 focus:border-amber-500 focus:ring-amber-500 p-4 rounded-xl transition-all bg-gray-50">{{ $task->description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Update Status</label>
                    <select name="status" class="w-full border-gray-200 focus:border-amber-500 focus:ring-amber-500 p-4 rounded-xl transition-all bg-gray-50">
                        <option value="pending" @selected($task->status=='pending')>⏳ Pending</option>
                        <option value="completed" @selected($task->status=='completed')>✅ Completed</option>
                    </select>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-amber-200 transition-all transform hover:-translate-y-0.5">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">Back to list</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>