<x-backend.custom-form back='true'>
    <x-slot name="title">{{ __('Department') }}</x-slot>
    @if ($action == 'create')
        <form wire:submit.prevent="store">
        @elseif($action == 'edit')
            <form wire:submit.prevent="update">
            @else
                <form id="form">
    @endif
    @csrf

    @wire('debounce.200ms')
        <x-form-input name="name" label="Title" type="text" />

        <x-form-textarea name="excerpt" label="Excerpt" required />

        <x-backend.single-upload name="image" label="Image (Size: 442 X 442 px)" />
    @endwire

    <div class="mt-3">
        @if ($action == 'create')
            <x-backend.submit-button>
                {{ __('Save') }}
            </x-backend.submit-button>
        @elseif($action == 'edit')
            <x-backend.submit-button>
                {{ __('Update') }}
            </x-backend.submit-button>
        @else
        @endif
    </div>
    </form>
</x-backend.custom-form>
