<x-app-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Create New Task</h1>
            <p class="text-gray-500 mt-1">Add a new objective to your list.</p>
        </div>

        <div class="bg-white border border-gray-100 shadow-2xl rounded-3xl p-8">
            <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Task Title</label>
                    <input type="text" name="title" placeholder="What needs to be done?"
                           class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 p-4 rounded-xl transition-all bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" placeholder="Add some details..."
                              class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 p-4 rounded-xl transition-all bg-gray-50"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Initial Status</label>
                    <select name="status" class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 p-4 rounded-xl transition-all bg-gray-50">
                        <option value="pending">⏳ Pending</option>
                        <option value="completed">✅ Completed</option>
                    </select>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-0.5">
                        Save Task
                    </button>
                    <a href="{{ route('tasks.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>