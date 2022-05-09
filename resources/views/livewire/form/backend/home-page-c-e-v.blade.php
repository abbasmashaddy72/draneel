<x-backend.custom-form title="Edit Update Data">
    <form wire:submit.prevent="submit">
        @csrf
        @wire('debounce.200ms')
        <x-backend.single-upload name="logo" label="Logo" />

        <x-backend.single-upload name="count_image" label="Count Image" />

        <h4 class="my-4 text-2xl font-medium card-title" wire:ignore>
            {{ __('Descriptions') }}
        </h4>

        <x-form-textarea name="services_excerpt" label="Services Excerpt" type="text" />

        <x-form-textarea name="count_excerpt" label="Count Excerpt" type="text" />

        <h4 class="my-4 text-2xl font-medium card-title" wire:ignore>
            {{ __('Social Media Links') }}
        </h4>

        <x-form-input name="twitter" label="Twitter" type="text" />

        <x-form-input name="facebook" label="Facebook" type="text" />

        <x-form-input name="instagram" label="Instagram" type="text" />

        <x-form-input name="linkedin" label="Linkedin" type="text" />

        <x-form-input name="youtube" label="Youtube" type="text" />

        <x-form-input name="google_business" label="Google Business" type="text" />

        <h4 class="my-4 text-2xl font-medium card-title" wire:ignore>
            {{ __('Google Map & Review APIs') }}
        </h4>

        <x-form-input name="embed_map_link"
            label="Embed Map Link(Directly from Google Maps Search, Share, Embed copy src link & paste)" type="text" />

        <x-form-input name="gr_api"
            label="Google Review API(Follow the Instructions from https://googlereviews.cws.net & paste the value of load_google_reviews from 2nd script)"
            type="text" />

        <x-form-input name="gr_count_api"
            label="Google Review Count API(Follow the Instructions from https://www.review-widget.net & paste the value of data-uuid from script)"
            type="text" />
        @endwire
        <div class="mt-3">
            <x-backend.submit-button>
                {{ __('Update') }}
            </x-backend.submit-button>
        </div>
    </form>
</x-backend.custom-form>
