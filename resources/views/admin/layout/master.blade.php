<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/picker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- ManyChat -->
    <script src="//widget.manychat.com/106585554142763.js" defer="defer"></script>
    <script src="https://mccdn.me/assets/js/widget.js" defer="defer"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_responsive.css') }}" rel="stylesheet">

    <title>Administrator</title>
    @yield('title')
    @yield('head')
</head>

<body>
    {{-- navbar top --}}
    <section id="nabvar_top">

        <nav class="bg-gray-800">
            <div class=" mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="mobile_menu_button_show inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                                alt="Workflow">
                        </div>

                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button
                            class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button"
                                    class="btn-user-options bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ asset('uploads/profile/' . auth()->user()->profile_img) }}" alt="">
                                </button>
                            </div>

                            <div class="hidden user-options-div origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu">

                                <a href="{{ route('user.logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign
                                    out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    {{-- navbar top end --}}
    {{-- sidebar --}}
    <section>
        <div class="flex">
            <div class="w-1/12 h-screen relative sm_hidden sidebar_main_width">
                <div class="absolute inset-0 w-full h-hull sidebar_main overflow-y-auto pb-10">
                    <div class="w-full h-40 ">
                        <div class="flex justify-center mt-3 ">
                            <img class="h-20 w-20 border-2 border-blue-400  object-cover rounded-full"
                                src="{{ asset('uploads/profile/' . auth()->user()->profile_img) }}" alt="">
                        </div>
                        <div class="text-center mt-22">
                            <h3 class="text-lg text-gray-300 font-semibold uppercase ">
                                {{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm text-gray-100">{{ auth()->user()->email }}</p>
                            <p class="uppercase text-white text-sm">{{ auth()->user()->role }} <i
                                    class="fa-solid fa-circle-check text-blue-600"></i></p>
                        </div>
                    </div>
                    <ul class="mt-5 px-5 mb-10">
                        <li class="text-white py-1 nav_item_li cursor-pointer "
                            style="{{ Route::is('user.researcher') || Route::is('researher.edit') || Route::is('researcher.add') ? 'color:#6366F1' : 'color: white' }}">
                            <span class="w-8 inline-block "><i class="fas fa-user "></i></span><a
                                class="" href="{{ route('user.researcher') }}">Researcher's</a>
                        </li>
                        <li class="text-white py-1 nav_item_li cursor-pointer "
                            style="{{ Route::is('user.research-progress') || Route::is('researh.show') || Route::is('researh.edit') ? 'color:#6366F1' : 'color: white' }}">
                            <span class="w-8 inline-block "><i class="fas fa-spinner"></i></span><a
                                class="" href="{{ route('user.research-progress') }}">Research
                                progress</a>
                        </li>
                        <li class="text-white py-1 nav_item_li cursor-pointer "
                            style="{{ Route::is('user.update-profile') ? 'color:#6366F1' : 'color: white' }}">
                            <span class="w-8 inline-block "><i class="fas fa-user"></i></span><a
                                class="" href="{{ route('user.update-profile') }}">Update
                                profile</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="w-11/12 ">
                {{-- main content --}}
                <div class="container-root" style="margin-top: 70px;">
                    @yield('main')
                </div>
                {{-- main content end --}}
            </div>
        </div>
        @if (session('error'))
            <span class="message_span flex items-center rounded shadow-xl bg-gray-700">
                <div class="flex justify-between w-full">
                    <div class="text-red-400 ml-5 font-semibold text-sm uppercase" role="alert">
                        {{ session('error') }}</div>
                    <div class="mr-4"><i
                            class="fa-solid fa-xmark text-red-500 font-bold cursor-pointer click_banish"></i></div>

                </div>
            </span>
        @endif
        @if (session('success'))
            <span class="message_span flex items-center rounded shadow-xl bg-gray-700">
                <div class="flex justify-between w-full">
                    <div class="text-green-400 ml-5 font-semibold text-sm uppercase">{{ session('success') }}</div>
                    <div class="mr-4"><i
                            class="fa-solid fa-xmark text-red-500 font-bold cursor-pointer click_banish"></i></div>

                </div>
            </span>
        @endif
    </section>
    {{-- sidebar end --}}
    {{-- js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c131658599.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('js/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    <script>
        $(document).on('click', '.btn-mobile-menu', function() {
            // $('.mobile-ul').removeClass('slide_0')
            $('.mobile-ul').slideToggle()

        })

        $(document).on('click', '.click_banish', function() {
            $('.message_span').addClass('hidden')
        })
    </script>


    @yield('script')
</body>

</html>
