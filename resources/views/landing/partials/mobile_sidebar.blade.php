<div id="mobile-sidebar" class="fixed inset-0 z-[999] pointer-events-none transition-all duration-300">
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-neutral-950/50 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none z-[999]">
    </div>

    <div id="sidebar-panel"
        class="fixed top-0 right-0 bottom-0 h-full w-72 max-w-[80vw] bg-white p-6 border-l border-neutral-200 shadow-2xl translate-x-full transition-transform duration-300 pointer-events-auto z-[1000] flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between pb-6 border-b border-neutral-100">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                    <span class="font-extrabold tracking-widest text-xs">POSTAN</span>
                </div>
                <button id="menu-close"
                    class="rounded-md p-1.5 text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="mt-6 flex flex-col gap-2">
                <a href="{{ route('beranda.index') }}" id="mob-nav-home" data-target="home"
                    class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Home</a>
                <a href="{{ route('info.index') }}" id="mob-nav-info" data-target="info"
                    class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Info</a>
                <a href="{{ route('showcase.index') }}" id="mob-nav-showcase" data-target="showcase"
                    class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Showcase</a>
                <a href="{{ route('contact.index') }}" id="mob-nav-contact" data-target="contact"
                    class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Contact</a>
            </nav>
        </div>

        <div class="border-t border-neutral-100 pt-6">
            @auth
                <a href="{{ route('dashboard') }}"
                    class="block w-full text-center rounded-lg bg-sky-500 px-4 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-sky-600">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full text-center rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-neutral-800">Login</a>
            @endauth
        </div>
    </div>
</div>
