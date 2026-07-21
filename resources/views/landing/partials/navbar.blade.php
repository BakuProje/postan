<header id="main-header"
    class="sticky top-0 z-50 transition-all duration-300 border-b border-transparent bg-white/30 backdrop-blur-md h-20">
    <nav class="mx-auto flex h-full max-w-7xl items-center justify-between px-6 lg:px-8" aria-label="Navigasi utama">
        <a href="{{ route('beranda.index') }}" data-target="home"
            class="flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-250 hover:scale-[1.01]">
            <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-10 w-auto">
            <span class="font-extrabold tracking-widest text-sm">POSTAN</span>
        </a>

        <div class="flex items-center gap-6">
            <div class="hidden items-center gap-1 md:flex">
                <a href="{{ route('beranda.index') }}" id="nav-home" data-target="home"
                    class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-sky-600 bg-sky-50/70">Home</a>
                <a href="{{ route('info.index') }}" id="nav-info" data-target="info"
                    class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900">Info</a>
                <a href="{{ route('showcase.index') }}" id="nav-showcase" data-target="showcase"
                    class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900">Showcase</a>
                <a href="{{ route('contact.index') }}" id="nav-contact" data-target="contact"
                    class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900">Contact</a>
            </div>

            <button id="menu-toggle"
                class="md:hidden cursor-pointer rounded-lg border border-neutral-200 bg-white p-2.5 text-neutral-700 transition hover:border-neutral-400 hover:text-neutral-900 focus:outline-none">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            @auth
                <a href="{{ route('dashboard') }}"
                    class="hidden md:inline-flex rounded-lg bg-sky-500 px-5 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="hidden md:inline-flex rounded-lg bg-neutral-900 px-5 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2">Login</a>
            @endauth
        </div>
    </nav>
</header>
