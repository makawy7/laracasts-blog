<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-grey-700">name</label>
                    <input value="{{ old('name') }}" class="border border-grey-400 p-2 w-full" type="text"
                        name="name" id="name">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-grey-700">Username</label>
                    <input value="{{ old('username') }}" class="border border-grey-400 p-2 w-full" type="text"
                        name="username" id="username">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-grey-700">email</label>
                    <input value="{{ old('email') }}" class="border border-grey-400 p-2 w-full" type="text"
                        name="email" id="email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-grey-700">password</label>
                    <input class="border border-grey-400 p-2 w-full" type="password" name="password" id="password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs mt-2">{{ $error }}</p>
                    @endforeach
                @endif --}}
            </form>
        </main>

    </section>
</x-layout>
