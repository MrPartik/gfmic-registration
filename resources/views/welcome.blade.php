<x-guest-layout>
    <style>
        .carousel-caption {
            background-color: #000000cc;
        }
    </style>
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        {{--        @if (Route::has('login'))--}}
        {{--            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
        {{--                @auth--}}
        {{--                    <a href="{{ url('/admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>--}}
        {{--                @else--}}
        {{--                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

        {{--                    @if (Route::has('register'))--}}
        {{--                        <a href="{{ route('register') }}"--}}
        {{--                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
        {{--                    @endif--}}
        {{--                @endauth--}}
        {{--            </div>--}}
        {{--        @endif--}}
        <div class="bg-white overflow-hidden sm:rounded-lg">
            {{--            @if (Route::has('login'))--}}
            {{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
            {{--                    @auth--}}
            {{--                        <a href="{{ url('/admin/dashboard') }}"--}}
            {{--                           class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>--}}
            {{--                    @else--}}
            {{--                        <a href="{{ route('login') }}"--}}
            {{--                           class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

            {{--                        @if (Route::has('register'))--}}
            {{--                            <a href="{{ route('register') }}"--}}
            {{--                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
            {{--                        @endif--}}
            {{--                    @endauth--}}
            {{--                </div>--}}
            {{--            @endif--}}
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel"
                     style="max-height:100vh">
                    <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4"
                         style="max-height:100vh">
                        @foreach(\App\Models\Event::all()  as $iKey => $aEvent)
                            <button
                                type="button"
                                data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $iKey }}"
                                class="{{ ($iKey === 0) ? 'active': '' }}"
                                aria-current="{{ ($iKey === 0) ? 'true': '' }}"
                                aria-label="Slide {{ $iKey }}"
                            ></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner relative w-full overflow-hidden"
                         style="max-height:100vh">
                        @foreach(\App\Models\Event::all()  as $iKey => $aEvent)
                            <div
                                class="carousel-item {{ ($iKey === 0) ? 'active': '' }} relative float-left w-full"
                                style="max-height:100vh">
                                <img
                                    style="height:100%"
                                    src="{{ url($aEvent['featured_image_url']) }}"
                                    class="block w-full"
                                    alt="{{ $aEvent['name'] }}"
                                />
                                <a target="_blank" href="{{ url('/events/' . $aEvent['event_id']) }}"
                                   class="carousel-caption hidden md:block absolute text-center">
                                    <h5 class="text-xl">{{ $aEvent['name'] }}</h5>
                                    <p>{{ $aEvent['description'] }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <button
                        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                        type="button"
                        data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev"
                    >
                                <span class="carousel-control-prev-icon inline-block bg-no-repeat"
                                      aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                        type="button"
                        data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next"
                    >
                                <span class="carousel-control-next-icon inline-block bg-no-repeat"
                                      aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
