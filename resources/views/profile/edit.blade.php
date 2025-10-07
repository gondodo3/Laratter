<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label>アイコン画像を選択</label>
                        <div style="display: flex; gap: 10px;">
                            @foreach($imageFiles as $file)
                                <label>
                                    <input type="radio" name="icon" value="{{ $file }}" {{ (old('icon', $user->icon) == $file) ? 'checked' : '' }}>
                                    <img src="{{ asset('images/' . $file) }}" width="48" class="rounded-full" style="background:#fff;">
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
