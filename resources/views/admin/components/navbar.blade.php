<nav class="bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
        </a>
        <div class="flex lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg lg:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
            <ul class="flex flex-col font-medium border rounded-lg lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 bg-gray-950 lg:bg-gray-900 border-gray-700">
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.index') }}" class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin' == request()->path() ? 'text-gray-800' : '' }}" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home mr-2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>Home</a>
                </li>
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/poin' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.poin') }}" class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/poin' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tally-5 me-2">
                            <path d="M4 4v16" />
                            <path d="M9 4v16" />
                            <path d="M14 4v16" />
                            <path d="M19 4v16" />
                            <path d="M22 6 2 18" />
                        </svg> Poin</a>
                </li>
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/elimdua' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.elimduaView') }}" class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/poin' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tally-5 me-2">
                            <path d="M4 4v16" />
                            <path d="M9 4v16" />
                            <path d="M14 4v16" />
                            <path d="M19 4v16" />
                            <path d="M22 6 2 18" />
                        </svg> ElimDua</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">Leaderboard<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('admin.elimduaLeaderboard') }}" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">Elim Dua Leaderboard</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.finalLeaderboard') }}" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">Final Leaderboard</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">History<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('admin.elimduaHistory') }}" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">Elim Dua History</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.finalHistory') }}" class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">Final History</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all {{ 'admin/final' == request()->path() ? 'bg-[#9290C3]' : '' }}">
                    <a href="{{ route('admin.finalView') }}" class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 {{ 'admin/poin' == request()->path() ? 'text-gray-800' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tally-5 me-2">
                            <path d="M4 4v16" />
                            <path d="M9 4v16" />
                            <path d="M14 4v16" />
                            <path d="M19 4v16" />
                            <path d="M22 6 2 18" />
                        </svg> Final</a>
                </li>
                <li class="hover:bg-[#9290C3] py-2 my-2 rounded-lg hover:ease-in-out hover:transition-all">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider hover:text-gray-800 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out mr-2">
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
    <div class="flex flex-col justify-center items-center lg:pt-[85px] pb-2 bg-violet-100 rounded-full shadow-xl w-1/2 md:pt-[50px] pt-[50px]">
        <div class="">
            <h1 class="text-3xl text-center uppercase max-md:text-2xl max-sm:text-xl">BOM 2024 Admin</h1>
        </div>
        <div class="pt-4 pb-2">
            <h1 class="text-2xl text-center uppercase max-md:text-xl max-sm:text-base">{{ $information }}</h1>
        </div>
    </div>
</div>