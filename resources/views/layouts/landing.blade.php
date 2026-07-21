<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Postan - Sistem Kasir Modern')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-50/50 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white">

    <!-- HEADER NAVBAR -->
    @include('landing.partials.navbar')

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    {{-- @include('landing.partials.footer') --}}

    <!-- MOBILE SIDEBAR DRAWER -->
    @include('landing.partials.mobile_sidebar')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('main-header');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    header.classList.add('bg-white/50', 'backdrop-blur-md', 'border-b',
                        'border-neutral-200/40', 'shadow-2xs');
                    header.classList.remove('bg-white/30', 'border-transparent');
                } else {
                    header.classList.remove('bg-white/50', 'border-neutral-200/40', 'shadow-2xs');
                    header.classList.add('bg-white/30', 'border-transparent');
                }
            });

            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const sidebarPanel = document.getElementById('sidebar-panel');

            function openSidebar() {
                mobileSidebar.classList.remove('pointer-events-none');
                sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                sidebarOverlay.classList.add('opacity-100');
                sidebarPanel.classList.remove('translate-x-full');
            }

            function closeSidebar() {
                sidebarOverlay.classList.remove('opacity-100');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                sidebarPanel.classList.add('translate-x-full');
                setTimeout(() => {
                    mobileSidebar.classList.add('pointer-events-none');
                }, 300);
            }

            if (menuToggle) menuToggle.addEventListener('click', openSidebar);
            if (menuClose) menuClose.addEventListener('click', closeSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);

            const sections = document.querySelectorAll('section[id]');
            const navLinks = {
                'home': document.getElementById('nav-home'),
                'info': document.getElementById('nav-info'),
                'showcase': document.getElementById('nav-showcase'),
                'contact': document.getElementById('nav-contact')
            };
            const mobNavLinks = {
                'home': document.getElementById('mob-nav-home'),
                'info': document.getElementById('mob-nav-info'),
                'showcase': document.getElementById('mob-nav-showcase'),
                'contact': document.getElementById('mob-nav-contact')
            };

            function setActiveNav(activeId) {
                Object.keys(navLinks).forEach(id => {
                    const link = navLinks[id];
                    const mobLink = mobNavLinks[id];

                    if (id === activeId) {
                        if (link) {
                            link.className =
                                'rounded-md px-3.5 py-2 text-sm font-extrabold tracking-wide transition-all duration-200 text-sky-600 bg-sky-50/70 border border-transparent';
                        }
                        if (mobLink) {
                            mobLink.className =
                                'rounded-md px-3.5 py-2.5 text-sm font-bold tracking-wide transition-all duration-200 text-sky-600 bg-sky-50/70';
                        }
                    } else {
                        if (link) {
                            link.className =
                                'rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900 hover:bg-neutral-100/40 border border-transparent';
                        }
                        if (mobLink) {
                            mobLink.className =
                                'rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900';
                        }
                    }
                });
            }

            let isManualScroll = false;

            const observerOptions = {
                root: null,
                rootMargin: '-20% 0px -40% 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                if (isManualScroll) return;
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const activeId = entry.target.id;
                        setActiveNav(activeId);
                        const targetPath = activeId === 'home' ? '/' : '/' + activeId;
                        if (history.replaceState && window.location.pathname !== targetPath) {
                            history.replaceState(null, null, targetPath);
                        }
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));

            document.querySelectorAll('a[data-target]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        isManualScroll = true;
                        setActiveNav(targetId);
                        closeSidebar();

                        const newPath = targetId === 'home' ? '/' : '/' + targetId;
                        if (history.pushState) {
                            history.pushState(null, null, newPath);
                        }

                        targetSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        setTimeout(() => {
                            isManualScroll = false;
                        }, 800);
                    }
                });
            });

            const path = window.location.pathname;
            let initialTarget = 'home';
            if (path.includes('info')) initialTarget = 'info';
            else if (path.includes('showcase')) initialTarget = 'showcase';
            else if (path.includes('contact')) initialTarget = 'contact';

            setActiveNav(initialTarget);
            const initialSection = document.getElementById(initialTarget);
            if (initialSection && initialTarget !== 'home') {
                setTimeout(() => {
                    initialSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            }
        });
    </script>
</body>

</html>
