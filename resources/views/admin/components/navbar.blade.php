<nav class="bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
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
                class="flex flex-col p-4 lg:p-0 mt-4 font-medium border rounded-lg lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 bg-gray-800 lg:bg-gray-900 border-gray-700">
                <li>
                    <a href="{{ route('admin.index') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider"
                        aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-home mr-2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.poin') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider">
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
                <li>
                    <a href="{{ route('admin.adminSelection') }}"
                        class="flex py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-notepad-text mr-2">
                            <path d="M8 2v4" />
                            <path d="M12 2v4" />
                            <path d="M16 2v4" />
                            <rect width="16" height="18" x="4" y="4" rx="2" />
                            <path d="M8 10h6" />
                            <path d="M8 14h8" />
                            <path d="M8 18h5" />
                        </svg>Set Jawaban</a>
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="py-2 px-3 text-gray-100 rounded text-md font-bold tracking-wider flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-log-out mr-2">
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
    <div class="flex flex-col justify-center items-center pt-[85px] pb-2 bg-violet-100 rounded-full shadow-xl w-1/2">
        <div class="">
            <h1 class="text-3xl text-center uppercase max-md:text-2xl max-sm:text-xl">BOM 2024 Admin</h1>
        </div>
        <div class="pt-4 pb-2">
            <h1 class="text-2xl text-center uppercase max-md:text-xl max-sm:text-base">{{ $information }}</h1>
        </div>
    </div>
</div>
