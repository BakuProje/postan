// 1. BERANDA (Landing Page) Script
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('main-header');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = {
        'home': document.getElementById('nav-home'),
        'info': document.getElementById('nav-info'),
        'contact': document.getElementById('nav-contact')
    };
    const mobileLinks = {
        'home': document.getElementById('mob-nav-home'),
        'info': document.getElementById('mob-nav-info'),
        'contact': document.getElementById('mob-nav-contact')
    };

    function handleScroll() {
        if (!header) return;

        if (window.scrollY > 20) {
            header.classList.remove('border-transparent', 'bg-transparent');
            header.classList.add('border-neutral-200/60', 'bg-white/95', 'backdrop-blur-md', 'shadow-[0_1px_3px_rgba(0,0,0,0.01)]');
        } else {
            header.classList.remove('border-neutral-200/60', 'bg-white/95', 'backdrop-blur-md', 'shadow-[0_1px_3px_rgba(0,0,0,0.01)]');
            header.classList.add('border-transparent', 'bg-transparent');
        }

        let currentSection = 'home';
        const scrollPos = window.scrollY + 120;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        Object.keys(navLinks).forEach(key => {
            const link = navLinks[key];
            if (link) {
                if (key === currentSection) {
                    link.classList.add('text-sky-600', 'bg-sky-50/50');
                    link.classList.remove('text-neutral-500', 'hover:text-neutral-900');
                } else {
                    link.classList.remove('text-sky-600', 'bg-sky-50/50');
                    link.classList.add('text-neutral-500', 'hover:text-neutral-900');
                }
            }
        });

        Object.keys(mobileLinks).forEach(key => {
            const link = mobileLinks[key];
            if (link) {
                if (key === currentSection) {
                    link.classList.add('text-sky-600', 'bg-sky-50/50');
                    link.classList.remove('text-neutral-700', 'hover:bg-neutral-50', 'hover:text-neutral-900');
                } else {
                    link.classList.remove('text-sky-600', 'bg-sky-50/50');
                    link.classList.add('text-neutral-700', 'hover:bg-neutral-50', 'hover:text-neutral-900');
                }
            }
        });
    }

    if (header) {
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    }

    const mobileSidebar = document.getElementById('mobile-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const sidebarPanel = document.getElementById('sidebar-panel');
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');

    function openSidebar() {
        if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
        mobileSidebar.classList.remove('pointer-events-none');
        sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        sidebarOverlay.classList.add('opacity-100', 'pointer-events-auto');
        sidebarPanel.classList.remove('translate-x-full');
        sidebarPanel.classList.add('translate-x-0');
    }

    function closeSidebar() {
        if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
        mobileSidebar.classList.add('pointer-events-none');
        sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
        sidebarPanel.classList.add('translate-x-full');
        sidebarPanel.classList.remove('translate-x-0');
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', openSidebar);
    }
    if (menuClose) {
        menuClose.addEventListener('click', closeSidebar);
    }
    if (sidebarOverlay) {
        // Disabled closing on overlay click as requested
        // sidebarOverlay.addEventListener('click', closeSidebar);
    }

    // Close when clicking nav link in mobile sidebar drawer
    ['mob-nav-home', 'mob-nav-info', 'mob-nav-contact'].forEach(id => {
        const link = document.getElementById(id);
        if (link) {
            link.addEventListener('click', closeSidebar);
        }
    });
});


// 2. LOGIN Script
document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('toggle-password');
    const eyeShow = document.getElementById('eye-show');
    const eyeHide = document.getElementById('eye-hide');

    if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                if (eyeShow) eyeShow.classList.add('hidden');
                if (eyeHide) eyeHide.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                if (eyeShow) eyeShow.classList.remove('hidden');
                if (eyeHide) eyeHide.classList.add('hidden');
            }
        });
    }
});


// 3. FORGOT PASSWORD Script
document.addEventListener('DOMContentLoaded', () => {

});


// 4. DASHBOARD (Admin POS) Script
document.addEventListener('DOMContentLoaded', () => {
    function updateTime() {
        const timeEl = document.getElementById('server-time');
        if (timeEl) {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIB';
            timeEl.textContent = timeString;
        }
    }

    const timeEl = document.getElementById('server-time');
    if (timeEl) {
        setInterval(updateTime, 1000);
        updateTime();
    }

    const mobileSidebar = document.getElementById('mobile-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const sidebarPanel = document.getElementById('sidebar-panel');
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');

    function openSidebar() {
        if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
        mobileSidebar.classList.remove('pointer-events-none');
        sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        sidebarOverlay.classList.add('opacity-100', 'pointer-events-auto');
        sidebarPanel.classList.remove('-translate-x-full');
        sidebarPanel.classList.add('translate-x-0');
    }

    function closeSidebar() {
        if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
        mobileSidebar.classList.add('pointer-events-none');
        sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
        sidebarPanel.classList.add('-translate-x-full');
        sidebarPanel.classList.remove('translate-x-0');
    }


    const dashboardHeaderBurger = document.querySelector('header #menu-toggle');
    if (dashboardHeaderBurger) {
        dashboardHeaderBurger.addEventListener('click', openSidebar);
    }
    if (menuClose) {
        menuClose.addEventListener('click', closeSidebar);
    }
    if (sidebarOverlay) {
        // Disabled closing on overlay click as requested
        // sidebarOverlay.addEventListener('click', closeSidebar);
    }
});
