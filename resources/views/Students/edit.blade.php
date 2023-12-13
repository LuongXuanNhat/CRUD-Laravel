<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('patch')
            <input
                name="name"
                value="{{ $student->name }}"
                placeholder="{{ __('What\'s your name?') }}"
                class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('name' ) }}
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input
                name="class"
                value="{{ $student->class }}"
                placeholder="{{ __('Class name?') }}"
                class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('class') }}
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                
            <div class="mt-4 space-x-2">
                <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
                <a href="{{ route('students.index') }}">{{ __('Cancel') }}</a>
            </div>
            
        </form>
    </div>
</x-app-layout>