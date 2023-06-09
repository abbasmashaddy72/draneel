@push('meta')
    @include('layouts.frontend.meta', [
        'title' => 'About Us',
        'description' => $tag_line,
        'image' => '//images.weserv.nl/?url=' . asset('storage/' . $hero_image) . '&w=200&h=200',
        'keywords' => 'Some Keywords for SEO',
    ])
@endpush
<x-guest-layout>
    <x-frontend.container>
        <x-slot name='banner_name'>
            {{ __('About Us') }}
        </x-slot>

        <div class="mb-8 text-center md:col-span-6 lg:col-span-5 md:mb-0">
            <h2 class="mb-4 font-extrabold h4 text-3xl font-red-hat-display" data-aos="fade-down">
                {{ $tag_line }}</h2>
        </div>

        <!-- Welcome Section Start -->
        @include('components.frontend.welcome')
        <!-- Welcome Section End -->

    </x-frontend.container>
</x-guest-layout>
