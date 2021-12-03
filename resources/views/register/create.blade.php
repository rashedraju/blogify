<x-layout>
    <main class="w-full max-w-xs mx-auto my-5">
        <h1 class="text-center font-bold text-2xl">Register</h1>
        <form action="/register" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name')}}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror

            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" value="{{old('username')}}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('username')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror

            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{old('email')}}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            @error('email')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password"
                   name="password"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('password')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror

            <button
                class="my-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Register
            </button>
        </form>
    </main>
</x-layout>
