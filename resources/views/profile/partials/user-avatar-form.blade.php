<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or update user avatar
        </p>
    </header>
    {{-- THIS IS IF THERE IS A MESSAGE (CAN BE SEEN IN CONTROLLER), THEN IT WILL BE SHOWN IN THE FRONTEND --}}
    @if(session('message'))
        <div class="text-red-500">
            {{session('message')}}
        </div>
    @endif

    <form method="post" action="{{route('profile.avatar')}}">
        @method('patch')
        {{-- THIS IS THE SHORTCUT, INSTEAD OF MANUALLY CREATING INPUT TYPE HIDDEN --}}
        @csrf
        {{-- THIS IS FOR THE TOKEN, FOR LOGGED IN USER --}}
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        <div>
            <x-input-label for="avatar" :value="__('Avatar ')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
    
</section>
