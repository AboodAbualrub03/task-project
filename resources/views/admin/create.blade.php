<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                <h2 class="text-xl font-bold mb-6 italic uppercase tracking-wider text-gray-800">Add New User</h2>

                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required placeholder="Enter user full name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required placeholder="example@mail.com" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="flex items-center gap-4 border-t pt-6">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold text-xs hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition">
                            CREATE USER
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 text-xs font-bold hover:underline">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>