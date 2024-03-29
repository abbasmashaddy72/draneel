@push('meta')
@include('layouts.frontend.meta', [
'description' => $welcome_message,
'image' => '//images.weserv.nl/?url=' . asset('storage/' . $logo) . '&w=200&h=200',
'keywords' => 'Some Text for SEO',
])
@endpush
<x-guest-layout>
    @push('styles')
    <link href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css" rel="stylesheet">
    @endpush
    @push('scripts')
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
    @endpush

    <div class="mb-8 mt-28 text-center md:col-span-6 lg:col-span-5 md:mb-0">
        <h2 class="mb-4 font-extrabold h4 text-3xl font-red-hat-display" data-aos="fade-down">
            {{ $tag_line }}</h2>
    </div>

    @if (\Jenssegers\Agent\Facades\Agent::isMobile() || \Jenssegers\Agent\Facades\Agent::isTablet())
    <div class="flex justify-center">
        <div class="mb-8 text-center space-x-2 space-y-2">
            <a href="{{ route('book_appointment') }}"
                class="inline-block px-3 py-2 bg-primary font-semibold text-lg rounded-xl hover:bg-secondary text-gray-50 transition ease-in-out duration-500">{{
                'Book Appointment' }}</a>
            <a href="{{ route('feedback') }}"
                class="inline-block px-3 py-2 bg-primary font-semibold text-lg rounded-xl hover:bg-secondary text-gray-50 transition ease-in-out duration-500">{{
                'Feedback' }}</a>
            <a href="{{ 'http://124.123.32.48:9999/shivam/onlinereporting/index.jsp' }}"
                class="inline-block px-3 py-2 bg-primary font-semibold text-lg rounded-xl hover:bg-secondary text-gray-50 transition ease-in-out duration-500">{{
                'Online Reports' }}<i data-feather="external-link" width='20' height='20' class="inline"></i></a>
        </div>
    </div>
    @endif

    <!-- Welcome Section Start -->
    @include('components.frontend.welcome')
    <!-- Welcome Section End -->

    <!-- feature section -->
    <section class="bg-white md:mt-10">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="grid grid-cols-3 gap-2 md:gap-20">
                <!-- first Repeater -->
                @foreach ($features as $item)
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="w-52 py-4 flex justify-center">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="rounded-full object-cover shadow-testimonial w-24 h-24 md:w-32 md:h-32" />
                        </div>
                    </div>

                    <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">{{ $item->title }}</h4>
                </div>
                @endforeach
            </div>

        </div> <!-- container.// -->

    </section>
    <!-- feature section //end -->

    <!-- count section -->
    <section class="bg-white mt-6 md:mt-16">

        <div class="container max-w-screen-2xl mx-auto px-4">

            <p class="font-bold text-gray-900 text-xl md:text-2xl text-center uppercase mb-6">Our Progress</p>

            <h1 class="font-normal text-gray-900 text-lg md:text-xl text-center leading-normal mb-10">
                {{ $count_excerpt }}</h1>

            <div class="grid grid-cols-4 gap-10">
                @forelse ($counts as $item)
                <div class="grid grid-cols-1 md:space-x-20 mb-16 text-center">
                    <div class="mb-5 md:mb-0">
                        <div class="flex justify-center">
                            <div class="w-20 py-6 flex justify-center bg-primary bg-opacity-20 rounded-xl mb-4">
                                <i data-feather="{{ $item->icon }}"></i>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <h3 class="font-semibold text-gray-900 text-xl md:text-3xl mb-4">
                                {{ $item->value }}
                            </h3>
                        </div>
                        <p class="font-light text-gray-800 text-md md:text-lg">{{ $item->title }}</p>
                    </div>
                </div>
                @empty
                <div class="w-full px-4">
                    <div class="text-center font-bold text-gray-800 text-lg">No Data Available</div>
                </div>
                @endforelse
            </div>
        </div> <!-- container.// -->

    </section>
    <!-- count section //end -->

    <!-- Google Reviews -->
    <section class="bg-white md:mt-10">

        <div class="container max-w-screen-2xl mx-auto px-4">

            <p class="font-bold text-gray-900 text-lg md:text-2xl text-center uppercase mb-6">Patient Reviews</p>

            <h1 class="font-normal text-gray-900 text-lg md:text-xl text-center leading-normal mb-10">
                {{ $review_excerpt }}</h1>
        </div>
    </section>

    <section class="bg-white md:mt-10">

        <div class="container max-w-screen-2xl mx-auto px-4">

            <section class="px-8 py-8">
                @livewire('pagination.frontend.reviews', ['where' => 'homepage'])
            </section>
        </div>

        <div class="flex items-center justify-center">
            <a href="{{ route('reviews') }}"
                class="bg-primary hover:bg-secondary px-7 py-5 font-semibold text-white text-lg rounded-xl transition ease-in-out duration-500">More
                Reviews</a>
        </div>

    </section>

    @include('components.frontend.g-reviews')

</x-guest-layout>