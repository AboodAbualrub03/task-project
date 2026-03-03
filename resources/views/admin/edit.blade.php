<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-6 italic uppercase tracking-wider text-gray-800">Edit User: {{ $user->name }}</h2>

                <form action="{{ route('admin.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold text-xs hover:bg-indigo-700 transition">
                            SAVE CHANGES
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 text-xs font-bold hover:underline">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
