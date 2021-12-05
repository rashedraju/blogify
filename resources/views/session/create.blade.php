<x-layout>
    <x-container>
        <h1 class="text-center font-bold text-2xl">Login</h1>
        <form action="/login" method="POST" class="bg-white border rounded px-8 pt-6 pb-8 mb-4 xl:w-7/12 mx-auto">
            @csrf

            <x-form.input name="email" type="email"/>
            <x-form.input name="password" type="password"/>

            <x-submit-button>Login</x-submit-button>
        </form>
    </x-container>
</x-layout>
