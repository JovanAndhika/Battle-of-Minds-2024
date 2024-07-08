<nav class="bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
        </a>
        <div class="flex lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg lg:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col font-medium border rounded-lg lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 bg-gray-950 lg:bg-gray-900 border-gray-700">
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.index') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin' == request()->path() ? 'text-gray-800' : '' }}"
                        aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-home mr-2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>Home</a>
                </li>
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/poin' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.poin') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/poin' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-tally-5 me-2">
                            <path d="M4 4v16" />
                            <path d="M9 4v16" />
                            <path d="M14 4v16" />
                            <path d="M19 4v16" />
                            <path d="M22 6 2 18" />
                        </svg> Poin</a>
                </li>
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/elimdua' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.elimduaView') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/elimdua' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-bomb me-2">
                            <circle cx="11" cy="13" r="9" />
                            <path
                                d="M14.35 4.65 16.3 2.7a2.41 2.41 0 0 1 3.4 0l1.6 1.6a2.4 2.4 0 0 1 0 3.4l-1.95 1.95" />
                            <path d="m22 2-1.5 1.5" />
                        </svg>
                        <path d="M4 4v16" />
                        <path d="M9 4v16" />
                        <path d="M14 4v16" />
                        <path d="M19 4v16" />
                        <path d="M22 6 2 18" />
                        </svg> ElimDua
                    </a>
                </li>
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/elimdua/leaderboard' == request()->path() || 'admin/final/leaderboard' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <button id="dropdownDefaultButtonLeaderboard" data-dropdown-toggle="dropdownLeaderboard"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/elimdua/leaderboard' == request()->path() || 'admin/final/leaderboard' == request()->path() ? 'text-gray-800' : '' }}"
                        type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-4 me-2">
                            <path d="M3 3v18h18" />
                            <path d="M13 17V9" />
                            <path d="M18 17V5" />
                            <path d="M8 17v-3" />
                        </svg>Leaderboard<svg class="w-2.5 h-2.5 ms-3 my-auto" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownLeaderboard"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButtonLeaderboard">
                            <li>
                                <a href="{{ route('admin.elimduaLeaderboard') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Elim
                                    2 Leaderboard</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.finalLeaderboard') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Final
                                    Leaderboard</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/elimdua/history' == request()->path() || 'admin/final/history' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <button id="dropdownDefaultButtonHistory" data-dropdown-toggle="dropdownHistory"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/elimdua/history' == request()->path() || 'admin/final/history' == request()->path() ? 'text-gray-800' : '' }}"
                        type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history me-2">
                            <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                            <path d="M3 3v5h5" />
                            <path d="M12 7v5l4 2" />
                        </svg>History<svg class="w-2.5 h-2.5 ms-3 my-auto" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHistory"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButtonHistory">
                            <li>
                                <a href="{{ route('admin.elimduaHistory') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Elim
                                    2 History</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.finalHistory') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Final
                                    History</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li
                    class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/final' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.finalView') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/final' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-trophy me-2">
                            <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                            <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                            <path d="M4 22h16" />
                            <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                            <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                            <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                        </svg>Final</a>
                </li>
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out mr-2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" x2="9" y1="12" y2="12" />
                            </svg>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="flex justify-center">
    <div
        class="flex flex-col justify-center items-center lg:pt-[85px] pb-2 bg-violet-100 md:rounded-full rounded-lg shadow-xl md:w-2/3 w-11/12 md:pt-[50px] pt-[50px]">
        <div class="">
            <h1 class="text-3xl text-center uppercase max-md:text-2xl max-sm:text-xl">BOM 2024 Admin</h1>
        </div>
        <div class="pt-4 pb-2">
            <h1 class="text-2xl text-center uppercase max-md:text-xl max-sm:text-base">{{ $information }}</h1>
        </div>
    </div>
</div>
