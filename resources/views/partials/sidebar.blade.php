<!-- Toggle Button -->
<button id="sidebarToggle" class="fixed top-4 left-4 z-50 p-2 rounded-lg bg-purple-700 hover:bg-purple-800 transition duration-200 text-white focus:outline-none">
    <!-- Hamburger Icon -->
    <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Sidebar -->
<aside id="sidebar"
    class="w-64 h-full bg-gradient-to-b from-purple-800 to-indigo-900 text-white fixed top-0 left-0 shadow-xl z-40 transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div class="p-4 text-2xl font-bold tracking-wide text-center border-b border-purple-600 neon-text">BoM 2024</div>

    <!-- isi ul dan list seperti sebelumnya -->
    <ul class="list space-y-2 p-4 text-sm">
        @if (!session('isGuest') && !session('isAdmin'))
        <li class="list-item">
            <a href="{{ route('session.index') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <polyline points="10 17 15 12 10 7" />
                        <line x1="15" x2="3" y1="12" y2="12" />
                    </svg>
                </i>
                <span class="link-name">Login</span>
            </a>
        </li>
        @else
        <form action="logout" method="POST" id="logoutform">
            @csrf
            <li class="list-item">
                <a href="#" onclick="document.getElementById('logoutform').submit(); return false;" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" x2="9" y1="12" y2="12" />
                        </svg>
                    </i>
                    <span class="link-name">Logout</span>
                </a>
            </li>
        </form>
        @endif

        <li class="list-item">
            <a href="{{ route('registration') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus">
                        <path d="M2 21a8 8 0 0 1 13.292-6" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M19 16v6" />
                        <path d="M22 19h-6" />
                    </svg>
                </i>
                <span class="link-name">Registration</span>
            </a>
        </li>

        <li class="list-item">
            <a href="/#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                        <rect width="7" height="9" x="3" y="3" rx="1" />
                        <rect width="7" height="5" x="14" y="3" rx="1" />
                        <rect width="7" height="9" x="14" y="12" rx="1" />
                        <rect width="7" height="5" x="3" y="16" rx="1" />
                    </svg>
                </i>
                <span class="link-name">Home</span>
            </a>
        </li>

        <li class="list-item">
            <a href="/#prizepool" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy">
                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                        <path d="M4 22h16" />
                        <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                        <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                        <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                    </svg>
                </i>
                <span class="link-name">Prizepool</span>
            </a>
        </li>

        <li class="list-item">
            <a href="/#timeline" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-clock">
                        <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                        <path d="M16 2v4" />
                        <path d="M8 2v4" />
                        <path d="M3 10h5" />
                        <path d="M17.5 17.5 16 16.3V14" />
                        <circle cx="16" cy="16" r="6" />
                    </svg>
                </i>
                <span class="link-name">Timeline</span>
            </a>
        </li>

        <li class="list-item">
            <a href="/#guide" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-text">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        <path d="M6 8h2" />
                        <path d="M6 12h2" />
                        <path d="M16 8h2" />
                        <path d="M16 12h2" />
                    </svg>
                </i>
                <span class="link-name">Guide</span>
            </a>
        </li>

        <li class="list-item">
            <a href="/#faq" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-question">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>
                </i>
                <span class="link-name">FAQ</span>
            </a>
        </li>

        @if (session('isGuest') || session('isAdmin'))
        <li class="list-item">
            <a href="{{ route('user.view') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path d="M18.4 2.6a2.17 2.17 0 0 1 3 3L16 11l-4 1 1-4Z" />
                    </svg>
                </i>
                <span class="link-name">Elimination</span>
            </a>
        </li>
        @endif

        <li class="list-item">
            <a href="/#footer" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-purple-700 transition duration-200">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-messages-square">
                        <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
                        <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                    </svg>
                </i>
                <span class="link-name">Contacts</span>
            </a>
        </li>
    </ul>
</aside>

<style>
    .neon-text {
        text-shadow: 0 0 5px #fff, 0 0 10px #a855f7, 0 0 20px #9333ea, 0 0 40px #7e22ce;
    }

    .link-name {
        transition: color 0.3s ease;
    }

    .list-item:hover .link-name {
        color: #fff;
    }
</style>


<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
</script>