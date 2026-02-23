<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-2xl font-black text-gray-800 tracking-tight italic">DASHBOARD EXAMPLE 1</h1>
                <p class="text-gray-400 text-sm">Monitoring your system's performance and active users.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 rounded-2xl shadow-xl shadow-indigo-100 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-indigo-100 text-xs font-bold uppercase tracking-widest">Total Users</h2>
                        <p class="text-4xl font-black mt-2">{{ $usersCount }}</p>
                        <p class="text-indigo-200 text-[10px] mt-2 italic">Active in system</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 bg-white/10 w-24 h-24 rounded-full"></div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-gray-400 text-xs font-bold uppercase tracking-widest">Total Tasks</h2>
                        <p class="text-4xl font-black mt-2 text-indigo-600">{{ $tasksCount }}</p>
                    </div>
                    <div class="bg-indigo-50 p-3 rounded-xl">
                        <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-400 to-emerald-600 p-6 rounded-2xl shadow-xl shadow-emerald-50 text-white">
                    <h2 class="text-emerald-50 text-xs font-bold uppercase tracking-widest">Completed</h2>
                    <p class="text-4xl font-black mt-2">{{ $completedCount }}</p>
                    <p class="text-emerald-100 text-[10px] mt-2 italic">Success rate high</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-gray-400 text-xs font-bold uppercase tracking-widest">Pending</h2>
                        <p class="text-4xl font-black mt-2 text-rose-500">{{ $pendingCount }}</p>
                    </div>
                    <div class="bg-rose-50 p-3 rounded-xl text-rose-500 font-bold">!</div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-white">
                    <h2 class="font-bold text-gray-800 italic uppercase tracking-wider">Active Users</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-indigo-600 text-white text-[10px] rounded-full font-bold">Last Week</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-400 text-[10px] rounded-full font-bold">All Month</button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-400 text-[10px] font-black uppercase tracking-[0.2em]">
                            <tr>
                                <th class="px-8 py-4">#</th>
                                <th class="px-8 py-4">Name</th>
                                <th class="px-8 py-4">Status</th>
                                <th class="px-8 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($latestUsers as $user)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td class="px-8 py-5 text-gray-400 text-xs font-medium">#{{ $user->id }}</td>
                                <td class="px-8 py-5">
                                    <div class="font-bold text-gray-700 text-sm">{{ $user->name }}</div>
                                    <div class="text-gray-400 text-[11px]">{{ $user->email }}</div>
                                </td>
                                <td class="px-8 py-5 text-xs">
                                    <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded text-[9px] font-black uppercase tracking-widest">Pending</span>
                                </td>
                                <td class="px-8 py-5 text-center flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.show', $user->id) }}" class="bg-indigo-600 text-white text-[10px] font-black px-3 py-1.5 rounded shadow-lg shadow-indigo-100 hover:scale-105 transition-transform">
                                        DETAILS
                                    </a>

                                    <a href="{{ route('admin.edit', $user->id) }}" class="bg-emerald-500 text-white text-[10px] font-black px-3 py-1.5 rounded shadow-lg shadow-emerald-100 hover:scale-105 transition-transform">
                                        EDIT
                                    </a>

                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-500 text-white text-[10px] font-black px-3 py-1.5 rounded shadow-lg shadow-rose-100 hover:scale-105 transition-transform">
                                            DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>