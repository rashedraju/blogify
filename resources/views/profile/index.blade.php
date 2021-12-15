<x-dashboard.user username="{{ $user->username }}">
    <form action="/{{ $user->username }}/profile/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="text-center">
            <div class="relative inline-block">
                <img src="{{ $user->image }}"
                    alt="Proifle Picture" style="max-width: 10rem" class="rounded-full">

                <label for="image" class="bg-white absolute right-1 bottom-3 rounded-full pointer">
                    <input type="file" name="image" id="image" class="hidden">
                    <img src="{{ asset('images/add.png') }}" alt="" style="max-width: 2rem">
                </label>
            </div>
            <h1 class="font-semibold text-4xl">{{ $user->name }}</h1>
        </div>

        <x-form.input name="name" value="{{ $user->name }}" />
        <x-form.input name="username" value="{{ $user->username }}" />
        <x-form.input name="email" type="email" autocomplete="email" value="{{ $user->email }}" />
        <x-form.input name="password" type="password" autocomplete="password" />

        <x-button.submit> Update Profile </x-button.submit>
    </form>
</x-dashboard.user>
