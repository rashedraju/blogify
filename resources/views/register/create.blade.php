<x-layout>
    <x-container>
        <h1 class="text-center font-bold text-2xl">Register</h1>
        <form action="/register" method="post" class="bg-white border rounded px-8 pt-6 pb-8 mb-4 xl:w-7/12 mx-auto">
            @csrf

            <x-form.input name="name"/>
            <x-form.input name="username"/>
            <x-form.input name="email" type="email" autocomplete="email"/>
            <x-form.input name="password" type="password" autocomplete="password"/>

            <x-button.submit>Register</x-button.submit>
        </form>
    </x-container>
</x-layout>
