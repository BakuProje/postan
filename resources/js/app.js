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

    if (sidebarPanel && sidebarPanel.classList.contains('right-0')) {
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
        ['mob-nav-home', 'mob-nav-info', 'mob-nav-contact'].forEach(id => {
            const link = document.getElementById(id);
            if (link) {
                link.addEventListener('click', closeSidebar);
            }
        });
    }
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


    if (sidebarPanel && sidebarPanel.classList.contains('left-0')) {
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
    }
});


// 5. KARYAWAN (Cashier Profile Image Preview) Script

document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('profile_picture');
    const previewImg = document.getElementById('avatar-preview');
    const placeholderSvg = document.getElementById('avatar-placeholder');

    if (fileInput && previewImg) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                    if (placeholderSvg) {
                        placeholderSvg.classList.add('hidden');
                        placeholderSvg.style.display = 'none';
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    }
});

// 6. KELOLA KASIR (Daftar & Konfirmasi Hapus) Script
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;
    const card = modal.querySelector('.bg-white');

    modal.classList.remove('pointer-events-none', 'opacity-0');
    modal.classList.add('pointer-events-auto', 'opacity-100');

    if (card) {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;
    const card = modal.querySelector('.bg-white');

    modal.classList.remove('pointer-events-auto', 'opacity-100');
    modal.classList.add('pointer-events-none', 'opacity-0');

    if (card) {
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
    }
}

function openEditModal(user) {
    const form = document.getElementById('edit-user-form');
    if (!form) return;
    form.action = `/dashboard/users/${user.id}`;

    const editUserIdField = document.getElementById('edit_user_id_field');
    if (editUserIdField) editUserIdField.value = user.id;

    const pageData = document.getElementById('users-page-data');
    let oldName = '', oldEmail = '', oldRole = '', oldShift = '', isEditError = false;
    if (pageData) {
        oldName = pageData.dataset.oldName || '';
        oldEmail = pageData.dataset.oldEmail || '';
        oldRole = pageData.dataset.oldRole || '';
        oldShift = pageData.dataset.oldShift || '';
        isEditError = pageData.dataset.oldEditUserId === String(user.id);
    }

    const editNameInput = document.getElementById('edit_name');
    const editEmailInput = document.getElementById('edit_email');
    const editRoleInput = document.getElementById('edit_role');
    const editShiftInput = document.getElementById('edit_shift');

    if (editNameInput) editNameInput.value = (isEditError && oldName) ? oldName : user.name;
    if (editEmailInput) editEmailInput.value = (isEditError && oldEmail) ? oldEmail : user.email;
    if (editRoleInput) editRoleInput.value = (isEditError && oldRole) ? oldRole : user.role;
    if (editShiftInput) editShiftInput.value = (isEditError && oldShift) ? oldShift : (user.shift || '');

    const preview = document.getElementById('edit-avatar-preview');
    const placeholder = document.getElementById('edit-avatar-placeholder');
    if (preview && placeholder) {
        if (user.profile_picture) {
            preview.src = `/${user.profile_picture}`;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
            placeholder.textContent = user.name.substring(0, 2).toUpperCase();
        }
    }

    const editPassInput = document.getElementById('edit_password');
    if (editPassInput) editPassInput.value = '';

    openModal('edit-user-modal');
}


function setupFilePreview(inputId, previewId, placeholderId) {
    const fileInput = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    if (placeholder) {
                        placeholder.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    }
}


function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    if (!input) return;

    const eyeShow = button.querySelector('.eye-show');
    const eyeHide = button.querySelector('.eye-hide');

    if (input.type === 'password') {
        input.type = 'text';
        if (eyeShow) eyeShow.classList.add('hidden');
        if (eyeHide) eyeHide.classList.remove('hidden');
    } else {
        input.type = 'password';
        if (eyeShow) eyeShow.classList.remove('hidden');
        if (eyeHide) eyeHide.classList.add('hidden');
    }
}

window.openModal = openModal;
window.closeModal = closeModal;
window.openEditModal = openEditModal;
window.togglePassword = togglePassword;

document.addEventListener('DOMContentLoaded', () => {
    const pageData = document.getElementById('users-page-data');
    if (!pageData) return;

    const hasErrors = pageData.dataset.hasErrors === 'true';
    const editUserId = pageData.dataset.oldEditUserId;
    const openCreateModalFlag = pageData.dataset.sessionOpenCreateModal === 'true';
    const openEditModalIdFlag = pageData.dataset.sessionOpenEditModalId;
    const users = JSON.parse(pageData.dataset.usersJson || '[]');

    if (hasErrors) {
        if (editUserId) {
            const userToEdit = users.find(u => u.id == editUserId);
            if (userToEdit) {
                openEditModal(userToEdit);
            }
        } else {
            openModal('create-user-modal');
        }
    } else if (openCreateModalFlag) {
        openModal('create-user-modal');
    } else if (openEditModalIdFlag) {
        const userToEdit = users.find(u => u.id == openEditModalIdFlag);
        if (userToEdit) {
            openEditModal(userToEdit);
        }
    }

    setupFilePreview('create_profile_picture', 'create-avatar-preview', 'create-avatar-placeholder');
    setupFilePreview('edit_profile_picture', 'edit-avatar-preview', 'edit-avatar-placeholder');
});


let formToSubmit = null;

function confirmDelete(event, name, formId) {
    event.preventDefault();
    formToSubmit = document.getElementById(formId);

    const deleteModal = document.getElementById('delete-modal');
    const card = document.getElementById('delete-modal-card');
    const nameSpan = document.getElementById('delete-modal-name');

    if (nameSpan) nameSpan.textContent = name;

    if (deleteModal && card) {
        deleteModal.classList.remove('opacity-0', 'pointer-events-none');
        deleteModal.classList.add('opacity-100', 'pointer-events-auto');
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    }
}

window.confirmDelete = confirmDelete;

document.addEventListener('DOMContentLoaded', () => {
    const cancelBtn = document.getElementById('delete-modal-cancel');
    const confirmBtn = document.getElementById('delete-modal-confirm');

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            const deleteModal = document.getElementById('delete-modal');
            const card = document.getElementById('delete-modal-card');

            if (deleteModal && card) {
                deleteModal.classList.remove('opacity-100', 'pointer-events-auto');
                deleteModal.classList.add('opacity-0', 'pointer-events-none');
                card.classList.remove('scale-100', 'opacity-100');
                card.classList.add('scale-95', 'opacity-0');
            }
            formToSubmit = null;
        });
    }

    if (confirmBtn) {
        confirmBtn.addEventListener('click', () => {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    }
});

// 7. REAL-TIME TRANSACTION SIMULATOR (Beranda)
document.addEventListener('DOMContentLoaded', () => {
    const salesEl = document.getElementById('realtime-sales');
    const percentEl = document.getElementById('realtime-percent');
    const txEl = document.getElementById('realtime-transactions');
    const custEl = document.getElementById('realtime-customers');
    const listEl = document.getElementById('realtime-list');

    if (salesEl || percentEl || txEl || custEl || listEl) {
        let currentSales = 2450000;
        let currentTx = 28;
        let currentCust = 8;
        let currentPercent = 12.5;

        function formatRupiah(num) {
            return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function simulateNewTransaction() {
            const amounts = [15000, 25000, 45000, 75000, 110000, 150000, 210000, 320000];
            const amount = amounts[Math.floor(Math.random() * amounts.length)];

            currentSales += amount;
            if (salesEl) {
                salesEl.textContent = formatRupiah(currentSales);
                salesEl.classList.add('scale-102', 'text-sky-500');
                setTimeout(() => {
                    salesEl.classList.remove('scale-102', 'text-sky-500');
                }, 500);
            }

            currentPercent += +(Math.random() * 0.4).toFixed(1);
            if (percentEl) {
                percentEl.textContent = '+' + currentPercent.toFixed(1) + '%';
            }

            currentTx += 1;
            if (txEl) {
                txEl.textContent = currentTx;
                txEl.classList.add('scale-110', 'text-sky-500');
                setTimeout(() => txEl.classList.remove('scale-110', 'text-sky-500'), 400);
            }

            if (Math.random() > 0.5) {
                currentCust += 1;
                if (custEl) {
                    custEl.textContent = currentCust;
                    custEl.classList.add('scale-110', 'text-sky-500');
                    setTimeout(() => custEl.classList.remove('scale-110', 'text-sky-500'), 400);
                }
            }

            if (listEl) {
                const now = new Date();
                const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                const txId = '#TRX-' + String(Math.floor(1000 + Math.random() * 9000));

                const newItem = document.createElement('div');
                newItem.className = 'flex items-center justify-between text-xs animate-mock-tx';
                newItem.innerHTML = `
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-1.5 w-1.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                        </span>
                        <span class="font-bold text-neutral-700">${txId}</span>
                        <span class="text-neutral-400">${timeStr}</span>
                    </div>
                    <p class="font-extrabold text-neutral-800">${formatRupiah(amount)}</p>
                `;

                listEl.insertBefore(newItem, listEl.firstChild);

                if (listEl.children.length > 3) {
                    listEl.removeChild(listEl.lastChild);
                }
            }
        }

        function scheduleNext() {
            const delay = 4000 + Math.random() * 6000;
            setTimeout(() => {
                simulateNewTransaction();
                scheduleNext();
            }, delay);
        }
        scheduleNext();
    }
});

// 8. GLOBAL TOAST AUTO-HIDE (Admin Layout)
document.addEventListener('DOMContentLoaded', () => {
    const toast = document.getElementById('toast-notification');
    if (toast) {
        setTimeout(() => {
            toast.classList.remove('-translate-y-4', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 100);

        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('-translate-y-4', 'opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 2100);
    }
});
