<nav class="sidebar">
    <div class="logo-menu">
        <svg class="ham ham6 toggle-btn" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
            <path class="line top" d="m 30,33 h 40 c 13.1,0 14.4,31.8 6.9,33.4 -24.6,5.3 9,-52.3 -12.8,-30.6 l -28.3,28.3" />
            <path class="line middle" d="m 70,50 c 0,0 -32.2,0 -40,0 -7.8,0 -6.4,-4.6 -6.4,-8.6 0,-5.9 6.1,-11.8 12.3,-5.6 6.2,6.2 28.3,28.3 28.3,28.3" />
            <path class="line bottom" d="m 69.6,67.1 h -40 c -13.1,0 -14.4,-31.8 -6.9,-33.4 24.6,-5.3 -9,52.3 12.8,30.6 l 28.3,-28.3" />
        </svg>
    </div>

    <ul class="list">
        @if (!session('isGuest') && !session('isAdmin'))
            <li class="list-item">
                <a href="{{ route('session.index') }}">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-log-in">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" x2="3" y1="12" y2="12" />
                        </svg>
                    </i>
                    <span class="link-name" style="--i:1">Login</span>
                </a>
            </li>
        @else
            <form action="logout" method="POST" id="logoutform">
                @csrf
                <li class="list-item">
                    <a href="#" onclick="document.getElementById('logoutform').submit(); return false;">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" x2="9" y1="12" y2="12" />
                            </svg>
                        </i>
                        <span class="link-name" style="--i:1">Logout</span>
                    </a>
                </li>
            </form>
        @endif
        <li class="list-item" id="register-item">
            <a href="{{ route('registration') }}">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-round-plus">
                        <path d="M2 21a8 8 0 0 1 13.292-6" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M19 16v6" />`
                        <path d="M22 19h-6" />
                    </svg>
                </i>
                <span class="link-name" style="--i:2">Registration</span>
            </a>
        </li>
        <li class="list-item">
            <a href="/#">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                        <rect width="7" height="9" x="3" y="3" rx="1" />
                        <rect width="7" height="5" x="14" y="3" rx="1" />
                        <rect width="7" height="9" x="14" y="12" rx="1" />
                        <rect width="7" height="5" x="3" y="16" rx="1" />
                    </svg></i>
                <span class="link-name" style="--i:2">Home</span>
            </a>
        </li>
        <li class="list-item">
            <a href="/#prizepool">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-trophy">
                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                        <path d="M4 22h16" />
                        <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                        <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                        <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                    </svg></i>
                <span class="link-name" style="--i:3">Prizepool</span>
            </a>

        </li>
        <li class="list-item">
            <a href="/#timeline">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-clock">
                        <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                        <path d="M16 2v4" />
                        <path d="M8 2v4" />
                        <path d="M3 10h5" />
                        <path d="M17.5 17.5 16 16.3V14" />
                        <circle cx="16" cy="16" r="6" />
                    </svg>
                </i>
                <span class="link-name" style="--i:4">Timeline</span>
            </a>
        </li>
        <li class="list-item">
            <a href="/#guide">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-book-open-text">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        <path d="M6 8h2" />
                        <path d="M6 12h2" />
                        <path d="M16 8h2" />
                        <path d="M16 12h2" />
                    </svg></i>
                <span class="link-name" style="--i:5">Guide</span>
            </a>
        </li>
        <li class="list-item">
            <a href="/#faq">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-message-circle-question">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>
                </i>
                <span class="link-name" style="--i:6">FAQ</span>
            </a>
        </li>
        @if (session('isGuest') || session('isAdmin'))
            <li class="list-item">
                <a href="{{ route('user.view') }}">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-notebook-pen">
                            <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                            <path d="M2 6h4" />
                            <path d="M2 10h4" />
                            <path d="M2 14h4" />
                            <path d="M2 18h4" />
                            <path d="M18.4 2.6a2.17 2.17 0 0 1 3 3L16 11l-4 1 1-4Z" />
                        </svg>
                    </i>
                    <span class="link-name" style="--i:7">Elimination</span>
                </a>
            </li>
        @endif
        <li class="list-item">
            <a href="/#footer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-messages-square">
                        <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
                        <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                    </svg>
                </i>
                <span class="link-name" style="--i:8">Contacts</span>
            </a>
        </li>
    </ul>
</nav>

<style>
.sidebar {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(145deg, #2b0a3d, #1c042b); /* ungu gelap modern */
    box-shadow: inset 0 0 60px #3a0ca3;
    transition: all 0.3s ease;
    overflow-y: auto;
    z-index: 1000;
}

.sidebar .list {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    list-style: none;
    padding: 2rem;
    margin: 0;
    justify-content: center;
}

.list-item {
    background-color: #3c096c;
    border: 2px solid #9d4edd;
    border-radius: 12px;
    padding: 1rem;
    text-align: center;
    min-width: 130px;
    min-height: 110px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 0 10px #9d4edd50;
}

.list-item:hover {
    transform: scale(1.07);
    box-shadow: 0 0 20px #c77dff, 0 0 40px #7b2cbf;
}

.list-item svg {
    margin-bottom: 0.5rem;
    color: #fff;
}

.list-item .link-name {
    color: #fff;
    font-weight: bold;
    font-size: 0.95rem;
}

/* Toggle class for active (hide/show behavior if diperlukan) */
.sidebar.active {
    transform: translateX(-100%);
    opacity: 0;
    pointer-events: none;
}
</style>

<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.toggle-btn');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
</script>
