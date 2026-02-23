<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">

                <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                    <div>
                        <h2 class="text-2xl font-black text-gray-800 italic uppercase tracking-wider">User Details</h2>
                        <p class="text-gray-400 text-xs mt-1">Full profile information for ID: #{{ $user->id }}</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 bg-white border border-gray-200 text-gray-600 text-[10px] font-black rounded-xl hover:bg-gray-50 transition">
                        BACK TO LIST
                    </a>
                </div>

                <div class="p-8">
                    <div class="space-y-6">

                        <div class="flex items-center space-x-4">
                            <div class="bg-indigo-50 p-3 rounded-2xl">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Full Name</p>
                                <p class="text-lg font-bold text-gray-700">{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-emerald-50 p-3 rounded-2xl">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Email Address
                                </p>
                                <p class="text-lg font-bold text-gray-700">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-amber-50 p-3 rounded-2xl">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.040L3 14.535a11.955 11.955 0 0017.382 0l-1.382-8.551z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Account Role
                                </p>
                                <span
                                    class="px-3 py-1 bg-amber-100 text-amber-700 rounded text-[9px] font-black uppercase tracking-widest">
                                    {{ $user->role ?? 'User' }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-10 pt-8 border-t border-gray-50">
                            <h3
                                class="text-sm font-black text-gray-800 italic uppercase tracking-widest mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                                Assigned Tasks
                            </h3>

                            <div class="bg-gray-50/50 rounded-2xl border border-gray-100 overflow-hidden">
                                <table class="w-full text-left">
                                    <thead class="bg-gray-100/50 text-[9px] font-black uppercase text-gray-400">
                                        <tr>
                                            <th class="px-6 py-3">Task Title</th>
                                            <th class="px-6 py-3 text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse($user->tasks as $task)
                                            <tr class="hover:bg-white transition-colors">
                                                <td class="px-6 py-4 text-xs font-bold text-gray-600">
                                                    {{ $task->title }}</td>
                                                <td class="px-6 py-4 text-center">
                                                    <span
                                                        class="px-2 py-0.5 rounded-full text-[8px] font-black uppercase tracking-tighter {{ $task->status == 'completed' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                                                        {{ $task->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2"
                                                    class="px-6 py-10 text-center text-gray-400 text-[10px] font-bold italic uppercase tracking-widest">
                                                    No tasks assigned to this user yet.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-50 flex gap-3">
                        <a href="{{ route('admin.edit', $user->id) }}"
                            class="bg-indigo-600 text-white text-[10px] font-black px-6 py-2.5 rounded-xl shadow-lg shadow-indigo-100 hover:scale-105 transition-transform text-center">
                            EDIT USER
                        </a>

                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-rose-50 text-rose-600 text-[10px] font-black px-6 py-2.5 rounded-xl hover:bg-rose-100 transition text-center">
                                DELETE ACCOUNT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
