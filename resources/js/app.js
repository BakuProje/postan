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
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
            mobileSidebar.classList.add('pointer-events-none');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
            sidebarPanel.classList.add('translate-x-full');
            sidebarPanel.classList.remove('translate-x-0');
            document.body.style.overflow = '';
        }

        if (menuToggle) {
            menuToggle.addEventListener('click', openSidebar);
        }
        if (menuClose) {
            menuClose.addEventListener('click', closeSidebar);
        }
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
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
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WITA';
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
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            if (!mobileSidebar || !sidebarOverlay || !sidebarPanel) return;
            mobileSidebar.classList.add('pointer-events-none');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
            sidebarPanel.classList.add('-translate-x-full');
            sidebarPanel.classList.remove('translate-x-0');
            document.body.style.overflow = '';
        }

        const dashboardHeaderBurger = document.querySelector('header #menu-toggle');
        if (dashboardHeaderBurger) {
            dashboardHeaderBurger.addEventListener('click', openSidebar);
        }
        if (menuClose) {
            menuClose.addEventListener('click', closeSidebar);
        }
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
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

function formatRupiah(num) {
    if (num === null || num === undefined) return '';
    return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
window.formatRupiah = formatRupiah;

function showToastNotification(message, type = 'success') {
    const existing = document.getElementById('toast-notification-dynamic');
    if (existing) existing.remove();

    const toast = document.createElement('div');
    toast.id = 'toast-notification-dynamic';
    toast.className = 'fixed top-6 left-1/2 z-50 transform -translate-x-1/2 -translate-y-4 opacity-0 transition-all duration-300 pointer-events-auto';

    const isSuccess = type === 'success';
    const borderClass = isSuccess ? 'border-emerald-200 bg-emerald-50 text-emerald-800' : 'border-rose-200 bg-rose-50 text-rose-800';
    const iconColor = isSuccess ? 'text-emerald-600' : 'text-rose-600';

    const svgIcon = isSuccess
        ? `<svg class="h-4.5 w-4.5 ${iconColor} shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
           </svg>`
        : `<svg class="h-4.5 w-4.5 ${iconColor} shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
           </svg>`;

    // Prevent HTML/XSS injection: create container and use textContent securely!
    const container = document.createElement('div');
    container.className = `flex items-center gap-3 rounded-xl border ${borderClass} px-4 py-3 max-w-sm bg-white/95 backdrop-blur-md`;
    container.innerHTML = svgIcon;

    const p = document.createElement('p');
    p.className = 'text-xs font-bold';
    p.textContent = message; // textContent automatically escapes XSS/HTML injections!

    container.appendChild(p);
    toast.appendChild(container);
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('-translate-y-4', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
    }, 100);

    setTimeout(() => {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('-translate-y-4', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}
window.showToastNotification = showToastNotification;

function printReceiptContent(elementId) {
    const element = document.getElementById(elementId);
    if (!element) return;

    const iframe = document.createElement('iframe');
    iframe.style.position = 'fixed';
    iframe.style.right = '0';
    iframe.style.bottom = '0';
    iframe.style.width = '0';
    iframe.style.height = '0';
    iframe.style.border = '0';
    document.body.appendChild(iframe);

    const doc = iframe.contentWindow.document;
    doc.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Cetak Struk</title>
            <style>
                @page {
                    size: 80mm auto;
                    margin: 0;
                }
                body {
                    font-family: 'Courier New', Courier, monospace;
                    font-size: 11px;
                    color: #000 !important;
                    background: #fff !important;
                    margin: 0;
                    padding: 8px;
                    width: 72mm;
                    box-sizing: border-box;
                }
                img {
                    max-height: 45px;
                    width: auto;
                    display: block;
                    margin: 0 auto 6px;
                    filter: grayscale(100%) !important;
                }
                .text-center { text-align: center; }
                .text-right { text-align: right; }
                .font-bold { font-weight: bold; }
                .flex-justify { display: flex; justify-content: space-between; }
                .border-dashed { border-bottom: 1px dashed #000; margin: 8px 0; }
                .text-uppercase { text-transform: uppercase; }
                /* Helper classes */
                .justify-between { display: flex; justify-content: space-between; }
                .flex { display: flex; }
                .gap-2 { gap: 8px; }
                .flex-1 { flex: 1; }
                .self-end { align-self: flex-end; }
                .space-y-1 > * + * { margin-top: 4px; }
                .space-y-2 > * + * { margin-top: 8px; }
                .space-y-1\\.5 > * + * { margin-top: 6px; }
                .font-medium { font-weight: 500; }
                .block { display: block; }
                .text-neutral-900 { color: #000 !important; }
                .text-neutral-800 { color: #000 !important; }
                .text-neutral-700 { color: #000 !important; }
                .text-neutral-600 { color: #000 !important; }
                .text-neutral-500 { color: #000 !important; }
                .text-neutral-400 { color: #000 !important; }
                .my-2 { margin-top: 8px; margin-bottom: 8px; }
                .py-1 { padding-top: 4px; padding-bottom: 4px; }
                .hidden { display: none !important; }
                div, span, p, h3, h4 {
                    color: #000 !important;
                }
            </style>
        </head>
        <body>
            <div>
                ${element.innerHTML}
            </div>
        </body>
        </html>
    `);
    doc.close();

    iframe.contentWindow.focus();
    setTimeout(() => {
        iframe.contentWindow.print();
        setTimeout(() => {
            iframe.remove();
        }, 1000);
    }, 500);
}
window.printReceiptContent = printReceiptContent;


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

// 10. KATEGORI MANAGEMENT MODALS (Kelola Kategori)
function openEditCategoryModal(category) {
    const form = document.getElementById('edit-category-form');
    if (!form) return;
    form.action = `/dashboard/categories/${category.id}`;

    const editCategoryIdField = document.getElementById('edit_category_id_field');
    if (editCategoryIdField) editCategoryIdField.value = category.id;

    const pageData = document.getElementById('categories-page-data');
    let oldName = '', isEditError = false;
    if (pageData) {
        oldName = pageData.dataset.oldName || '';
        isEditError = pageData.dataset.oldEditCategoryId === String(category.id);
    }

    const editNameInput = document.getElementById('edit_category_name');
    if (editNameInput) editNameInput.value = (isEditError && oldName) ? oldName : category.name;

    openModal('edit-category-modal');
}

window.openEditCategoryModal = openEditCategoryModal;

document.addEventListener('DOMContentLoaded', () => {
    const pageData = document.getElementById('categories-page-data');
    if (!pageData) return;

    const hasErrors = pageData.dataset.hasErrors === 'true';
    const editCategoryId = pageData.dataset.oldEditCategoryId;
    const openCreateModalFlag = pageData.dataset.sessionOpenCreateModal === 'true';
    const openEditModalIdFlag = pageData.dataset.sessionOpenEditModalId;
    const categories = JSON.parse(pageData.dataset.categoriesJson || '[]');

    if (hasErrors) {
        if (editCategoryId) {
            const categoryToEdit = categories.find(c => c.id == editCategoryId);
            if (categoryToEdit) {
                openEditCategoryModal(categoryToEdit);
            }
        } else {
            openModal('create-category-modal');
        }
    } else if (openCreateModalFlag) {
        openModal('create-category-modal');
    } else if (openEditModalIdFlag) {
        const categoryToEdit = categories.find(c => c.id == openEditModalIdFlag);
        if (categoryToEdit) {
            openEditCategoryModal(categoryToEdit);
        }
    }
});

// 11. PRODUK MANAGEMENT MODALS (Kelola Produk)
function toggleCustomDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const arrow = document.getElementById(dropdownId + '-arrow');
    if (!dropdown) return;

    document.querySelectorAll('[id$="-dropdown"]').forEach(el => {
        if (el.id !== dropdownId) {
            el.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            const otherArrow = document.getElementById(el.id + '-arrow');
            if (otherArrow) otherArrow.classList.remove('rotate-180');
        }
    });

    if (dropdown.classList.contains('pointer-events-none')) {
        dropdown.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
        if (arrow) arrow.classList.add('rotate-180');
    } else {
        dropdown.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        if (arrow) arrow.classList.remove('rotate-180');
    }
}

function selectCustomCategory(prefix, categoryId, categoryName) {
    const hiddenInput = document.getElementById(prefix + '_product_category_input');
    const label = document.getElementById(prefix + '-category-dropdown-label');
    const dropdown = document.getElementById(prefix + '-category-dropdown');
    const arrow = document.getElementById(prefix + '-category-dropdown-arrow');

    if (hiddenInput && label && dropdown) {
        hiddenInput.value = categoryId;
        label.textContent = categoryName;
        dropdown.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        if (arrow) arrow.classList.remove('rotate-180');
    }
}

window.toggleCustomDropdown = toggleCustomDropdown;
window.selectCustomCategory = selectCustomCategory;

// Close custom dropdowns if clicked outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('#create-category-dropdown-btn') && !e.target.closest('#create-category-dropdown')) {
        const createDrop = document.getElementById('create-category-dropdown');
        const createArrow = document.getElementById('create-category-dropdown-arrow');
        if (createDrop) {
            createDrop.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            if (createArrow) createArrow.classList.remove('rotate-180');
        }
    }
    if (!e.target.closest('#edit-category-dropdown-btn') && !e.target.closest('#edit-category-dropdown')) {
        const editDrop = document.getElementById('edit-category-dropdown');
        const editArrow = document.getElementById('edit-category-dropdown-arrow');
        if (editDrop) {
            editDrop.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            if (editArrow) editArrow.classList.remove('rotate-180');
        }
    }
});

function openEditProductModal(product) {
    const form = document.getElementById('edit-product-form');
    if (!form) return;
    form.action = `/dashboard/products/${product.id}`;

    const editProductIdField = document.getElementById('edit_product_id_field');
    if (editProductIdField) editProductIdField.value = product.id;

    const pageData = document.getElementById('products-page-data');
    let oldName = '', oldPrice = '', oldStock = '', oldCategoryId = '', isEditError = false;
    if (pageData) {
        oldName = pageData.dataset.oldName || '';
        oldPrice = pageData.dataset.oldPrice || '';
        oldStock = pageData.dataset.oldStock || '';
        oldCategoryId = pageData.dataset.oldCategoryId || '';
        isEditError = pageData.dataset.oldEditProductId === String(product.id);
    }

    const editNameInput = document.getElementById('edit_product_name');
    const editCategoryInput = document.getElementById('edit_product_category_input');
    const editCategoryLabel = document.getElementById('edit-category-dropdown-label');
    const editPriceInput = document.getElementById('edit_product_price');
    const editStockInput = document.getElementById('edit_product_stock');

    if (editNameInput) editNameInput.value = (isEditError && oldName) ? oldName : product.name;

    const selectedCategoryId = (isEditError && oldCategoryId) ? oldCategoryId : product.category_id;
    if (editCategoryInput) editCategoryInput.value = selectedCategoryId;
    if (editCategoryLabel) {
        const categoryBtn = document.querySelector(`button[onclick*="selectCustomCategory('edit', ${selectedCategoryId},"]`);
        if (categoryBtn) {
            editCategoryLabel.textContent = categoryBtn.textContent.trim();
        } else {
            editCategoryLabel.textContent = 'Pilih Kategori';
        }
    }

    if (editPriceInput) editPriceInput.value = formatNumberWithDots(String((isEditError && oldPrice) ? oldPrice : product.price));
    if (editStockInput) editStockInput.value = (isEditError && oldStock) ? oldStock : product.stock;

    const preview = document.getElementById('edit-photo-preview');
    const placeholder = document.getElementById('edit-photo-placeholder');
    if (preview && placeholder) {
        if (product.photo) {
            preview.src = `/${product.photo}`;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
            placeholder.textContent = product.name.substring(0, 2).toUpperCase();
        }
    }

    openModal('edit-product-modal');
}

window.openEditProductModal = openEditProductModal;

document.addEventListener('DOMContentLoaded', () => {
    const pageData = document.getElementById('products-page-data');
    if (!pageData) return;

    const hasErrors = pageData.dataset.hasErrors === 'true';
    const editProductId = pageData.dataset.oldEditProductId;
    const openCreateModalFlag = pageData.dataset.sessionOpenCreateModal === 'true';
    const openEditModalIdFlag = pageData.dataset.sessionOpenEditModalId;
    const products = JSON.parse(pageData.dataset.productsJson || '[]');

    // Restore old create category on validation error
    const createCategoryId = pageData.dataset.oldCategoryId;
    if (createCategoryId) {
        const createCategoryInput = document.getElementById('create_product_category_input');
        const createCategoryLabel = document.getElementById('create-category-dropdown-label');
        if (createCategoryInput) createCategoryInput.value = createCategoryId;
        if (createCategoryLabel) {
            const categoryBtn = document.querySelector(`button[onclick*="selectCustomCategory('create', ${createCategoryId},"]`);
            if (categoryBtn) {
                createCategoryLabel.textContent = categoryBtn.textContent.trim();
            }
        }
    }

    if (hasErrors) {
        if (editProductId) {
            const productToEdit = products.find(p => p.id == editProductId);
            if (productToEdit) {
                openEditProductModal(productToEdit);
            }
        } else {
            openModal('create-product-modal');
        }
    } else if (openCreateModalFlag) {
        openModal('create-product-modal');
    } else if (openEditModalIdFlag) {
        const productToEdit = products.find(p => p.id == openEditModalIdFlag);
        if (productToEdit) {
            openEditProductModal(productToEdit);
        }
    }
    setupFilePreview('create_photo', 'create-photo-preview', 'create-photo-placeholder');
    setupFilePreview('edit_photo', 'edit-photo-preview', 'edit-photo-placeholder');
});

// 12. POS CASHIER TRANSACTION MANAGEMENT
let posCart = [];
let activeVoucher = null;
let activePaymentMethod = 'cash'; // 'cash' or 'qris'

try {
    const savedCart = localStorage.getItem('pos_cart');
    if (savedCart) {
        posCart = JSON.parse(savedCart);
    }
    const savedVoucher = localStorage.getItem('pos_active_voucher');
    if (savedVoucher) {
        activeVoucher = JSON.parse(savedVoucher);
    }
} catch (e) {
    console.error('Failed to restore POS cart state:', e);
}

function addProductToCart(element) {
    if (!element) return;
    const id = parseInt(element.dataset.id || 0);
    const name = element.dataset.name || 'Produk';
    const price = parseInt(element.dataset.price || 0);
    const stock = parseInt(element.dataset.stock || 0);
    const photo = (element.dataset.photo && typeof element.dataset.photo === 'string') ? element.dataset.photo : '';

    if (stock <= 0) {
        showToastNotification('Stok produk habis.', 'error');
        return;
    }

    const existing = posCart.find(item => item.id === id);
    if (existing) {
        if (existing.quantity >= stock) {
            showToastNotification('Tidak bisa menambahkan lebih banyak, batas stok tercapai.', 'error');
            return;
        }
        existing.quantity += 1;
    } else {
        posCart.push({ id, name, price, stock, photo, quantity: 1 });
    }

    renderPosCart();
}

function updateCartQty(id, change) {
    const item = posCart.find(i => i.id === id);
    if (!item) return;

    const newQty = item.quantity + change;
    if (newQty <= 0) {
        removeCartItem(id);
        return;
    }

    if (newQty > item.stock) {
        showToastNotification('Batas stok maksimal tercapai.', 'error');
        return;
    }

    item.quantity = newQty;
    renderPosCart();
}

function removeCartItem(id) {
    posCart = posCart.filter(item => item.id !== id);
    renderPosCart();
}

function clearCart() {
    posCart = [];
    activeVoucher = null;
    const codeInput = document.getElementById('pos-voucher-code');
    if (codeInput) codeInput.value = '';
    const inputGrp = document.getElementById('pos-voucher-input-group');
    if (inputGrp) inputGrp.classList.remove('hidden');
    const appliedVch = document.getElementById('pos-applied-voucher');
    if (appliedVch) appliedVch.classList.add('hidden');
    renderPosCart();
}

function renderPosCart() {
    try {
        const container = document.getElementById('cart-items-container');
        const emptyPlaceholder = document.getElementById('cart-empty-placeholder');
        const badge = document.getElementById('cart-badge');

        if (!container) return;

        const oldItems = container.querySelectorAll('.pos-cart-item-row');
        oldItems.forEach(el => el.remove());

        if (posCart.length === 0) {
            if (emptyPlaceholder) emptyPlaceholder.classList.remove('hidden');
            if (badge) badge.classList.add('hidden');
        } else {
            if (emptyPlaceholder) emptyPlaceholder.classList.add('hidden');
            if (badge) {
                badge.classList.remove('hidden');
                badge.textContent = posCart.reduce((acc, i) => acc + (i.quantity || 0), 0);
            }

            posCart.forEach(item => {
                const itemRow = document.createElement('div');
                itemRow.className = 'pos-cart-item-row bg-white/45 backdrop-blur-md rounded-xl p-3 border border-white/20 flex items-center justify-between gap-3 text-sm';

                let imgHtml = '';
                const photoUrl = (item.photo && typeof item.photo === 'string') ? item.photo.trim() : '';
                if (photoUrl !== '') {
                    imgHtml = `<img src="${photoUrl}" class="h-10 w-10 rounded-lg object-cover border border-neutral-100 shrink-0 shadow-xs">`;
                } else {
                    const shortName = (item.name && typeof item.name === 'string') ? item.name.substring(0, 2) : 'PR';
                    imgHtml = `<div class="h-10 w-10 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase shrink-0 select-none">${shortName}</div>`;
                }

                itemRow.innerHTML = `
                    <div class="flex items-center gap-2.5 flex-1 min-w-0">
                        ${imgHtml}
                        <div class="min-w-0">
                            <p class="font-bold text-neutral-800 truncate text-xs sm:text-sm">${item.name}</p>
                            <p class="text-xs text-neutral-400 mt-0.5 whitespace-nowrap">${formatRupiah(item.price)}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0">
                        <button type="button" onclick="updateCartQty(${item.id}, -1)" class="h-7 w-7 rounded bg-white border border-neutral-200 hover:border-sky-400 hover:text-sky-600 flex items-center justify-center font-bold text-sm select-none cursor-pointer">-</button>
                        <span class="font-extrabold text-neutral-700 w-5 text-center text-xs sm:text-sm">${item.quantity}</span>
                        <button type="button" onclick="updateCartQty(${item.id}, 1)" class="h-7 w-7 rounded bg-white border border-neutral-200 hover:border-sky-400 hover:text-sky-600 flex items-center justify-center font-bold text-sm select-none cursor-pointer">+</button>
                    </div>
                    <div class="text-right min-w-[70px] shrink-0">
                        <span class="font-extrabold text-neutral-800 block text-xs sm:text-sm whitespace-nowrap">${formatRupiah(item.price * item.quantity)}</span>
                    </div>
                    <button type="button" onclick="removeCartItem(${item.id})" class="text-neutral-400 hover:text-rose-500 transition shrink-0 cursor-pointer">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                container.appendChild(itemRow);
            });
        }

        try {
            localStorage.setItem('pos_cart', JSON.stringify(posCart));
            if (activeVoucher) {
                localStorage.setItem('pos_active_voucher', JSON.stringify(activeVoucher));
            } else {
                localStorage.removeItem('pos_active_voucher');
            }
        } catch (e) {
            console.error('Failed to save POS cart state:', e);
        }

        const totalQty = posCart.reduce((sum, item) => sum + (item.quantity || 0), 0);
        const originalPrice = posCart.reduce((sum, item) => sum + ((item.price || 0) * (item.quantity || 0)), 0);
        let discount = 0;

        if (typeof activeVoucher !== 'undefined' && activeVoucher) {
            if (activeVoucher.type === 'discount_percent') {
                discount = Math.floor(originalPrice * ((activeVoucher.value || 0) / 100));
            } else {
                discount = activeVoucher.value || 0;
            }
            discount = Math.min(discount, originalPrice);
        }

        const finalPrice = Math.max(0, originalPrice - discount);

        const qtyLabel = document.getElementById('total-qty-label');
        const priceLabel = document.getElementById('total-price-label');
        const openPaymentBtn = document.getElementById('btn-open-payment-modal');

        if (qtyLabel) qtyLabel.textContent = `${totalQty} Item`;
        if (priceLabel) priceLabel.textContent = formatRupiah(finalPrice);

        // Update Voucher Discount Row
        const discountRow = document.getElementById('pos-voucher-discount-row');
        const discountDesc = document.getElementById('pos-voucher-discount-desc');
        const discountLabel = document.getElementById('pos-voucher-discount-label');
        if (discountRow && discountDesc && discountLabel) {
            if (discount > 0 && typeof activeVoucher !== 'undefined' && activeVoucher) {
                discountRow.classList.remove('hidden');
                discountDesc.textContent = activeVoucher.discount_desc || (activeVoucher.type === 'discount_percent' ? `${activeVoucher.value}%` : formatRupiah(activeVoucher.value));
                discountLabel.textContent = `- ${formatRupiah(discount)}`;
            } else {
                discountRow.classList.add('hidden');
            }
        }

        if (openPaymentBtn) {
            if (posCart.length > 0) {
                openPaymentBtn.disabled = false;
                openPaymentBtn.classList.remove('opacity-50', 'pointer-events-none', 'bg-neutral-150', 'text-neutral-400');
                openPaymentBtn.className = 'w-full rounded-xl py-4 text-sm font-black text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-2 shadow-md cursor-pointer';
            } else {
                openPaymentBtn.disabled = true;
                openPaymentBtn.className = 'w-full rounded-xl py-4 text-sm font-bold text-neutral-400 bg-neutral-150 border border-neutral-250 pointer-events-none transition duration-200 flex items-center justify-center gap-2 shadow-sm';
            }
        }
    } catch (err) {
        console.error("Error in renderPosCart:", err);
    }
}

function openPaymentModal() {
    const originalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    let discount = 0;
    if (activeVoucher) {
        if (activeVoucher.type === 'discount_percent') {
            discount = Math.floor(originalPrice * (activeVoucher.value / 100));
        } else {
            discount = activeVoucher.value;
        }
        discount = Math.min(discount, originalPrice);
    }
    const finalPrice = originalPrice - discount;

    const totalLabel = document.getElementById('payment-modal-total-label');
    if (totalLabel) {
        totalLabel.textContent = formatRupiah(finalPrice);
    }

    const rawInput = document.getElementById('pos-paid-input');
    const formattedInput = document.getElementById('pos-paid-input-formatted');
    if (rawInput) rawInput.value = 0;
    if (formattedInput) formattedInput.value = '';

    openModal('payment-method-modal');
    selectPaymentMethod('cash');
}

function selectPaymentMethod(method) {
    activePaymentMethod = method;
    const cashBtn = document.getElementById('pay-select-cash-btn');
    const qrisBtn = document.getElementById('pay-select-qris-btn');
    const cashPanel = document.getElementById('payment-cash-panel');
    const qrisPanel = document.getElementById('payment-qris-panel');

    if (method === 'cash') {
        if (cashBtn) cashBtn.className = 'flex flex-col items-center justify-center p-4 rounded-xl border-2 border-sky-500 bg-sky-50/50 text-sky-600 font-extrabold transition cursor-pointer';
        if (qrisBtn) qrisBtn.className = 'flex flex-col items-center justify-center p-4 rounded-xl border border-neutral-200 hover:border-sky-400 hover:bg-neutral-50/40 text-neutral-500 font-extrabold transition cursor-pointer';
        if (cashPanel) cashPanel.classList.remove('hidden');
        if (qrisPanel) qrisPanel.classList.add('hidden');
        calculateChange();
    } else {
        if (qrisBtn) qrisBtn.className = 'flex flex-col items-center justify-center p-4 rounded-xl border-2 border-sky-500 bg-sky-50/50 text-sky-600 font-extrabold transition cursor-pointer';
        if (cashBtn) cashBtn.className = 'flex flex-col items-center justify-center p-4 rounded-xl border border-neutral-200 hover:border-sky-400 hover:bg-neutral-50/40 text-neutral-500 font-extrabold transition cursor-pointer';
        if (qrisPanel) qrisPanel.classList.remove('hidden');
        if (cashPanel) cashPanel.classList.add('hidden');

        const originalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        let discount = 0;
        if (activeVoucher) {
            if (activeVoucher.type === 'discount_percent') {
                discount = Math.floor(originalPrice * (activeVoucher.value / 100));
            } else {
                discount = activeVoucher.value;
            }
            discount = Math.min(discount, originalPrice);
        }
        const finalPrice = originalPrice - discount;

        const rawInput = document.getElementById('pos-paid-input');
        if (rawInput) rawInput.value = finalPrice;

        const qrisAutoLabel = document.getElementById('qris-auto-price-label');
        if (qrisAutoLabel) qrisAutoLabel.textContent = formatRupiah(finalPrice);

        const checkoutBtn = document.getElementById('btn-checkout');
        if (checkoutBtn) {
            checkoutBtn.disabled = false;
            checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-1.5 shadow-md cursor-pointer';
        }
    }
}

function formatNumberWithDots(val) {
    return val.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function calculateChange() {
    const rawInput = document.getElementById('pos-paid-input');
    const changeLabel = document.getElementById('change-label');
    const checkoutBtn = document.getElementById('btn-checkout');

    if (!rawInput || !changeLabel || !checkoutBtn) return;

    const originalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    let discount = 0;
    if (activeVoucher) {
        if (activeVoucher.type === 'discount_percent') {
            discount = Math.floor(originalPrice * (activeVoucher.value / 100));
        } else {
            discount = activeVoucher.value;
        }
        discount = Math.min(discount, originalPrice);
    }
    const finalPrice = originalPrice - discount;

    if (activePaymentMethod === 'qris') {
        changeLabel.textContent = 'Rp 0';
        checkoutBtn.disabled = false;
        checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-1.5 shadow-md cursor-pointer';
        return;
    }

    const paidVal = parseInt(rawInput.value) || 0;

    if (posCart.length === 0) {
        changeLabel.textContent = 'Rp 0';
        checkoutBtn.disabled = true;
        checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 opacity-50 pointer-events-none transition duration-200 flex items-center justify-center gap-1.5 shadow-sm';
        return;
    }

    if (paidVal >= finalPrice) {
        const change = paidVal - finalPrice;
        changeLabel.textContent = formatRupiah(change);
        checkoutBtn.disabled = false;
        checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-1.5 shadow-md cursor-pointer';
    } else {
        changeLabel.textContent = 'Rp 0';
        checkoutBtn.disabled = true;
        checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 opacity-50 pointer-events-none transition duration-200 flex items-center justify-center gap-1.5 shadow-sm';
    }
}

function setQuickCash(value) {
    const rawInput = document.getElementById('pos-paid-input');
    const formattedInput = document.getElementById('pos-paid-input-formatted');
    if (!rawInput || !formattedInput) return;

    const originalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    let discount = 0;
    if (activeVoucher) {
        if (activeVoucher.type === 'discount_percent') {
            discount = Math.floor(originalPrice * (activeVoucher.value / 100));
        } else {
            discount = activeVoucher.value;
        }
        discount = Math.min(discount, originalPrice);
    }
    const finalPrice = originalPrice - discount;
    const amount = value === 'pas' ? finalPrice : value;

    rawInput.value = amount;
    formattedInput.value = formatNumberWithDots(String(amount));

    calculateChange();
}

function applyVoucher() {
    const codeInput = document.getElementById('pos-voucher-code');
    if (!codeInput) return;
    const code = codeInput.value.trim();
    if (!code) {
        showToastNotification('Harap masukkan kode voucher.', 'error');
        return;
    }

    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    if (totalPrice === 0) {
        showToastNotification('Keranjang belanja masih kosong.', 'error');
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch('/dashboard/vouchers/check', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ code: code, total_price: totalPrice })
    })
        .then(async response => {
            const resData = await response.json();
            if (!response.ok) {
                throw new Error(resData.message || 'Voucher tidak valid.');
            }
            return resData;
        })
        .then(res => {
            activeVoucher = res.data;
            showToastNotification(res.message || 'Voucher berhasil digunakan!');

            document.getElementById('pos-voucher-input-group')?.classList.add('hidden');
            const appliedVoucherEl = document.getElementById('pos-applied-voucher');
            if (appliedVoucherEl) appliedVoucherEl.classList.remove('hidden');
            const appliedLabel = document.getElementById('pos-applied-voucher-label');
            if (appliedLabel) appliedLabel.textContent = `Voucher: ${activeVoucher.code}`;

            renderPosCart();
        })
        .catch(err => {
            showToastNotification(err.message || 'Gagal menerapkan voucher.', 'error');
        });
}

function removeVoucher() {
    activeVoucher = null;
    const codeInput = document.getElementById('pos-voucher-code');
    if (codeInput) codeInput.value = '';

    document.getElementById('pos-voucher-input-group')?.classList.remove('hidden');
    document.getElementById('pos-applied-voucher')?.classList.add('hidden');

    renderPosCart();
    showToastNotification('Voucher dihapus.');
}

function checkoutTransaction() {
    if (posCart.length === 0) return;

    const customerInput = document.getElementById('pos-customer-input');
    const customerVal = customerInput ? customerInput.value.trim() : '';

    if (!customerVal) {
        showToastNotification('Nama customer wajib diisi sebelum melanjutkan checkout.', 'error');
        if (customerInput) customerInput.focus();
        return;
    }

    const rawInput = document.getElementById('pos-paid-input');
    const paidVal = parseInt(rawInput.value) || 0;

    const originalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    let discount = 0;
    if (activeVoucher) {
        if (activeVoucher.type === 'discount_percent') {
            discount = Math.floor(originalPrice * (activeVoucher.value / 100));
        } else {
            discount = activeVoucher.value;
        }
        discount = Math.min(discount, originalPrice);
    }
    const finalPrice = originalPrice - discount;

    if (activePaymentMethod === 'cash' && paidVal < finalPrice) {
        showToastNotification('Uang pembayaran tidak mencukupi.', 'error');
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const checkoutBtn = document.getElementById('btn-checkout');
    if (checkoutBtn) {
        checkoutBtn.disabled = true;
        checkoutBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Proses...
        `;
    }

    fetch('/dashboard/transactions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            cart: posCart,
            payment_method: activePaymentMethod,
            total_paid: activePaymentMethod === 'qris' ? finalPrice : paidVal,
            customer_name: customerVal,
            voucher_code: activeVoucher ? activeVoucher.code : null
        })
    })
        .then(async response => {
            const resData = await response.json();
            if (!response.ok) {
                throw new Error(resData.message || 'Terjadi kesalahan sistem.');
            }
            return resData;
        })
        .then(data => {
            closeModal('payment-method-modal');
            showToastNotification(data.message || 'Transaksi berhasil disimpan!');
            posCart = [];
            activeVoucher = null;
            try {
                localStorage.removeItem('pos_cart');
                localStorage.removeItem('pos_active_voucher');
            } catch (e) {}
            openReceiptModal(data.data);
        })
        .catch(error => {
            showToastNotification(error.message || 'Gagal memproses transaksi.', 'error');
            if (checkoutBtn) {
                checkoutBtn.disabled = false;
                checkoutBtn.className = 'w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-1.5 shadow-md cursor-pointer';
                checkoutBtn.innerHTML = 'Selesaikan Transaksi';
            }
        });
}

function openReceiptModal(txData) {
    document.getElementById('receipt-code').textContent = txData.transaction_code;
    document.getElementById('receipt-date').textContent = txData.created_at;
    document.getElementById('receipt-cashier').textContent = txData.cashier_name;
    const customerEl = document.getElementById('receipt-customer');
    if (customerEl) {
        customerEl.textContent = txData.customer_name || '-';
    }
    document.getElementById('receipt-payment-method').textContent = txData.payment_method === 'qris' ? 'QRIS' : 'CASH';
    document.getElementById('receipt-total').textContent = formatRupiah(txData.total_price);
    document.getElementById('receipt-paid').textContent = formatRupiah(txData.total_paid);
    document.getElementById('receipt-change').textContent = formatRupiah(txData.total_change);

    const list = document.getElementById('receipt-items-list');
    list.innerHTML = '';

    txData.items.forEach(item => {
        const row = document.createElement('div');
        row.className = 'text-[10px] text-neutral-600 flex justify-between gap-2';
        row.innerHTML = `
            <div class="flex-1">
                <span class="font-medium text-neutral-800 block">${item.product_name}</span>
                <span class="text-neutral-400 block">${item.quantity} x ${formatRupiah(item.price)}</span>
            </div>
            <span class="font-bold text-neutral-700 self-end">${formatRupiah(item.subtotal)}</span>
        `;
        list.appendChild(row);
    });

    openModal('receipt-modal');
}

function closeReceiptModal() {
    closeModal('receipt-modal');
    window.location.reload();
}

function printReceipt() {
    printReceiptContent('print-area');
}

window.addProductToCart = addProductToCart;
window.updateCartQty = updateCartQty;
window.removeCartItem = removeCartItem;
window.clearCart = clearCart;
window.openPaymentModal = openPaymentModal;
window.selectPaymentMethod = selectPaymentMethod;
window.setQuickCash = setQuickCash;
window.checkoutTransaction = checkoutTransaction;
window.applyVoucher = applyVoucher;
window.removeVoucher = removeVoucher;
window.closeReceiptModal = closeReceiptModal;
window.printReceipt = printReceipt;

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('pos-search');
    const productCards = document.querySelectorAll('.pos-product-card');
    const emptyState = document.getElementById('pos-empty-state');

    function filterProducts() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const activeCatBtn = document.querySelector('.pos-category-btn.bg-sky-50');
        const activeCatId = activeCatBtn ? activeCatBtn.dataset.categoryId : 'all';

        let visibleCount = 0;

        productCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const catId = card.dataset.categoryId;

            const matchesQuery = name.includes(query);
            const matchesCat = (activeCatId === 'all') || (catId === activeCatId);

            if (matchesQuery && matchesCat) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterProducts);
    }

    const catBtns = document.querySelectorAll('.pos-category-btn');
    catBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            catBtns.forEach(b => {
                b.className = 'pos-category-btn shrink-0 rounded-lg px-3 py-1.5 text-[10px] font-bold border border-neutral-200/80 bg-white text-neutral-600 transition hover:bg-neutral-50 hover:text-neutral-800';
            });
            this.className = 'pos-category-btn shrink-0 rounded-lg px-3 py-1.5 text-[10px] font-extrabold border border-sky-150 bg-sky-50 text-sky-600 transition';
            filterProducts();
        });
    });

    const tabProductsBtn = document.getElementById('tab-products-btn');
    const tabCartBtn = document.getElementById('tab-cart-btn');
    const sectorProducts = document.getElementById('sector-products');
    const sectorCart = document.getElementById('sector-cart');

    if (tabProductsBtn && tabCartBtn && sectorProducts && sectorCart) {
        tabProductsBtn.addEventListener('click', () => {
            tabProductsBtn.className = 'flex-1 py-2.5 text-center text-xs font-black text-neutral-700 bg-white rounded-lg shadow-sm border border-neutral-250 transition';
            tabCartBtn.className = 'flex-1 py-2.5 text-center text-xs font-black text-neutral-500 hover:text-neutral-700 transition relative';
            sectorProducts.classList.remove('hidden');
            sectorCart.classList.add('hidden');
        });

        tabCartBtn.addEventListener('click', () => {
            tabCartBtn.className = 'flex-1 py-2.5 text-center text-xs font-black text-neutral-700 bg-white rounded-lg shadow-sm border border-neutral-250 transition relative';
            tabProductsBtn.className = 'flex-1 py-2.5 text-center text-xs font-black text-neutral-500 hover:text-neutral-700 transition';
            sectorCart.classList.remove('hidden');
            sectorProducts.classList.add('hidden');
        });
    }

    const formattedPaidInput = document.getElementById('pos-paid-input-formatted');
    const rawPaidInput = document.getElementById('pos-paid-input');

    if (formattedPaidInput && rawPaidInput) {
        formattedPaidInput.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, "");
            rawPaidInput.value = value ? parseInt(value) : 0;
            this.value = formatNumberWithDots(value);
            calculateChange();
        });
    }


    const priceFormatInputs = document.querySelectorAll('.price-format-input');
    priceFormatInputs.forEach(input => {
        input.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, "");
            this.value = formatNumberWithDots(value);
        });
    });

    renderPosCart();
});

document.addEventListener('DOMContentLoaded', () => {
    const aside = document.getElementById('desktop-sidebar');
    const toggleBtn = document.getElementById('sidebar-collapse-btn');
    const collapseIcon = document.getElementById('collapse-icon');

    if (aside && toggleBtn) {
        const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
        if (isCollapsed) {
            aside.classList.add('sidebar-collapsed');
            if (collapseIcon) {
                collapseIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />`;
            }
        }

        toggleBtn.addEventListener('click', () => {
            const collapsedNow = aside.classList.toggle('sidebar-collapsed');
            localStorage.setItem('sidebar-collapsed', collapsedNow ? 'true' : 'false');
            if (collapseIcon) {
                if (collapsedNow) {
                    collapseIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />`;
                } else {
                    collapseIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />`;
                }
            }
        });
    }
});

// 13. PRODUCT STANDALONE CREATE/EDIT IMAGE PREVIEW
document.addEventListener('DOMContentLoaded', () => {
    setupFilePreview('photo', 'photo-preview', 'photo-placeholder');
});

// 14. LAYOUT CLOCK & NOTIFICATION TOGGLE
document.addEventListener('DOMContentLoaded', () => {
    function updateNavbarClock() {
        const dateEl = document.getElementById('live-navbar-date');
        const timeEl = document.getElementById('live-navbar-time');
        if (!dateEl || !timeEl) return;

        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        const dayName = days[now.getDay()];
        const dateNum = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        dateEl.textContent = `${dayName}, ${dateNum} ${monthName} ${year}`;
        timeEl.textContent = `${hours}:${minutes} WITA`;
    }
    setInterval(updateNavbarClock, 1000);
    updateNavbarClock();

    const bellBtn = document.getElementById('notification-bell-btn');
    const panel = document.getElementById('notification-panel');
    if (bellBtn && panel) {
        bellBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            panel.classList.toggle('hidden');
        });
        document.addEventListener('click', (e) => {
            if (!panel.contains(e.target) && !bellBtn.contains(e.target)) {
                panel.classList.add('hidden');
            }
        });
    }
});

// 15. DASHBOARD CHART INITIALIZATION
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('salesChart');
    const chartDataEl = document.getElementById('sales-chart-data');
    if (!ctx || !chartDataEl) return;

    const chartLabels = JSON.parse(chartDataEl.dataset.labels || '[]');
    const chartSales = JSON.parse(chartDataEl.dataset.sales || '[]');

    const gradientSales = ctx.getContext('2d').createLinearGradient(0, 0, 0, 220);
    gradientSales.addColorStop(0, 'rgba(14, 165, 233, 0.25)');
    gradientSales.addColorStop(1, 'rgba(14, 165, 233, 0.00)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Total Pemasukan',
                data: chartSales,
                borderColor: '#0ea5e9',
                borderWidth: 3,
                backgroundColor: gradientSales,
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#0ea5e9',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: '#ffffff',
                pointHoverBorderColor: '#0ea5e9',
                pointHoverBorderWidth: 3,
                pointHitRadius: 10,
                clip: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            layout: {
                padding: {
                    top: 15,
                    bottom: 5,
                    left: 20,
                    right: 25
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#171717',
                    padding: 10,
                    titleFont: {
                        size: 10,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 10
                    },
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || '';
                            if (label) label += ': ';
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    maximumFractionDigits: 0
                                }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    min: 0,
                    beginAtZero: true,
                    suggestedMax: 100000,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.03)',
                        drawBorder: false
                    },
                    ticks: {
                        padding: function (context) {
                            return (context.chart.width < 500 || window.innerWidth < 640) ? 3 : 8;
                        },
                        font: function (context) {
                            const isMobile = (context.chart.width < 500) || (window.innerWidth < 640);
                            return {
                                size: isMobile ? 8 : 9,
                                family: "'Inter', sans-serif"
                            };
                        },
                        color: '#a3a3a3',
                        callback: function (value) {
                            const isMobile = window.innerWidth < 640 || (this.chart && this.chart.width < 480);
                            const formatted = value >= 1000000 ? (value / 1000000) + 'jt' : (
                                value >= 1000 ? (value / 1000) + 'rb' : value);
                            return isMobile ? formatted : 'Rp ' + formatted;
                        }
                    }
                },
                x: {
                    offset: false,
                    grid: {
                        display: false
                    },
                    ticks: {
                        autoSkip: false,
                        align: 'center',
                        maxRotation: 0,
                        minRotation: 0,
                        padding: 6,
                        font: function (context) {
                            const isMobile = (context.chart.width < 500) || (window.innerWidth < 640);
                            return {
                                size: isMobile ? 8.5 : 9,
                                family: "'Inter', sans-serif",
                                weight: 'bold'
                            };
                        },
                        color: '#404040',
                        callback: function (val, index) {
                            const rawLabel = this.getLabelForValue(val);
                            if (typeof rawLabel === 'string' && rawLabel.includes('(')) {
                                const dayName = rawLabel.split(' ')[0].substring(0, 3);
                                const match = rawLabel.match(/\((.*?)\)/);
                                if (match && match[1]) {
                                    const datePart = match[1]; // e.g. "15/07"
                                    if (window.innerWidth < 480 || this.chart.width < 420) {
                                        return datePart; // "15/07" or day number
                                    } else if (window.innerWidth < 640 || this.chart.width < 520) {
                                        return datePart; // "15/07"
                                    }
                                    return `${dayName} (${datePart})`; // "Rab (15/07)"
                                }
                            }
                            return rawLabel;
                        }
                    }
                }
            }
        }
    });
});

// 16. TRANSACTION HISTORY DETAILS MODAL
function showTxDetail(btn) {
    const modal = document.getElementById('transaction-detail-modal');
    const content = document.getElementById('modal-content');
    if (!modal || !content) return;

    const code = btn.getAttribute('data-code');
    const date = btn.getAttribute('data-date');
    const cashier = btn.getAttribute('data-cashier');
    const customer = btn.getAttribute('data-customer');
    const method = btn.getAttribute('data-method');
    const total = btn.getAttribute('data-total');
    const paid = btn.getAttribute('data-paid');
    const change = btn.getAttribute('data-change');
    const items = JSON.parse(btn.getAttribute('data-items') || '[]');

    document.getElementById('modal-invoice-code').textContent = code;
    document.getElementById('modal-invoice-cashier').textContent = cashier;
    document.getElementById('modal-invoice-customer').textContent = customer;
    document.getElementById('modal-invoice-date').textContent = date;
    document.getElementById('modal-invoice-method').textContent = method;
    document.getElementById('modal-invoice-total').textContent = total;
    document.getElementById('modal-invoice-paid').textContent = paid;
    document.getElementById('modal-invoice-change').textContent = change;

    document.getElementById('print-receipt-code').textContent = code;
    document.getElementById('print-receipt-date').textContent = date;
    document.getElementById('print-receipt-cashier').textContent = cashier;
    document.getElementById('print-receipt-customer').textContent = customer;
    document.getElementById('print-receipt-payment-method').textContent = method;
    document.getElementById('print-receipt-total').textContent = total;
    document.getElementById('print-receipt-paid').textContent = paid;
    document.getElementById('print-receipt-change').textContent = change;

    const container = document.getElementById('modal-invoice-items');
    container.innerHTML = '';

    const printList = document.getElementById('print-receipt-items-list');
    printList.innerHTML = '';

    items.forEach(item => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center border-b border-neutral-100 pb-2 last:border-0 last:pb-0';
        row.innerHTML = `
            <div class="min-w-0 pr-2">
                <p class="font-bold text-neutral-800 truncate">${item.name}</p>
                <p class="text-[9px] text-neutral-400 font-semibold mt-0.5">${item.qty} x ${item.price}</p>
            </div>
            <span class="font-bold text-neutral-855 shrink-0">${item.subtotal}</span>
        `;
        container.appendChild(row);

        const printRow = document.createElement('div');
        printRow.className = 'text-[10px] text-neutral-600 flex justify-between gap-2';
        printRow.style.display = 'flex';
        printRow.style.justifyContent = 'space-between';
        printRow.style.fontSize = '10px';
        printRow.innerHTML = `
            <div style="flex: 1;">
                <span style="font-weight: 500; color: #000; display: block;">${item.name}</span>
                <span style="color: #666; display: block;">${item.qty} x ${item.price}</span>
            </div>
            <span style="font-weight: bold; color: #000; align-self: flex-end;">${item.subtotal}</span>
        `;
        printList.appendChild(printRow);
    });

    modal.classList.remove('hidden');
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeTxDetail() {
    const modal = document.getElementById('transaction-detail-modal');
    const content = document.getElementById('modal-content');
    if (!modal || !content) return;

    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 250);
}

function printHistoryReceipt() {
    if (window.printReceiptContent) {
        window.printReceiptContent('print-area-history');
    } else {
        alert('Fungsi cetak tidak tersedia.');
    }
}

window.showTxDetail = showTxDetail;
window.closeTxDetail = closeTxDetail;
window.printHistoryReceipt = printHistoryReceipt;

document.addEventListener('DOMContentLoaded', () => {
    const historyModal = document.getElementById('transaction-detail-modal');
    if (historyModal) {
        historyModal.addEventListener('click', function (e) {
            if (e.target === this) {
                closeTxDetail();
            }
        });
    }
});

// Admin Sidebar Navigation & Export Menu Functions
window.toggleDashboardTree = function (button) {
    const group = button.closest('.dashboard-tree-group');
    if (!group) return;
    const submenu = group.querySelector('.dashboard-tree-submenu');
    const chevron = group.querySelector('.dashboard-tree-chevron');
    if (submenu) submenu.classList.toggle('hidden');
    if (chevron) chevron.classList.toggle('rotate-180');
};

window.toggleInventaris = function (button) {
    const group = button.closest('.inventaris-group');
    if (!group) return;
    const submenu = group.querySelector('.inventaris-submenu');
    const chevron = group.querySelector('.inventaris-chevron');
    if (submenu) submenu.classList.toggle('hidden');
    if (chevron) chevron.classList.toggle('rotate-180');
};

window.toggleLaporanTree = function (button) {
    const group = button.closest('.laporan-tree-group');
    if (!group) return;
    const submenu = group.querySelector('.laporan-tree-submenu');
    const chevron = group.querySelector('.laporan-tree-chevron');
    if (submenu) submenu.classList.toggle('hidden');
    if (chevron) chevron.classList.toggle('rotate-180');
};

window.toggleSubmenu = function (id) {
    const submenu = document.getElementById(id);
    if (!submenu) return;
    submenu.classList.toggle('hidden');
    const arrowId = id.replace('-submenu', '-arrow');
    const arrow = document.getElementById(arrowId);
    if (arrow) arrow.classList.toggle('rotate-180');
};

window.toggleExportMenu = function (event) {
    event.stopPropagation();
    const menu = document.getElementById('export-menu');
    if (menu) menu.classList.toggle('hidden');
};

document.addEventListener('click', function (e) {
    const container = document.getElementById('export-dropdown-container');
    const menu = document.getElementById('export-menu');
    if (container && menu && !container.contains(e.target)) {
        menu.classList.add('hidden');
    }
});

// 7. LAPORAN PENJUALAN (Reports Page) Script

window.openExportReportModal = function () {
    const modal = document.getElementById('export-report-modal');
    if (modal) modal.classList.remove('hidden');
};

window.closeExportReportModal = function () {
    const modal = document.getElementById('export-report-modal');
    if (modal) modal.classList.add('hidden');
};

window.updateExportFormat = function (type) {
    const form = document.getElementById('export-form');
    const excelLabel = document.getElementById('label-excel-opt');
    const pdfLabel = document.getElementById('label-pdf-opt');

    if (type === 'pdf') {
        if (form) form.action = "/dashboard/reports/export/pdf";
        if (pdfLabel) pdfLabel.className = "flex items-center justify-between p-3.5 rounded-2xl border border-sky-500 bg-sky-50/40 cursor-pointer transition";
        if (excelLabel) excelLabel.className = "flex items-center justify-between p-3.5 rounded-2xl border border-neutral-200 bg-white hover:bg-neutral-50 cursor-pointer transition";
    } else {
        if (form) form.action = "/dashboard/reports/export/excel";
        if (excelLabel) excelLabel.className = "flex items-center justify-between p-3.5 rounded-2xl border border-sky-500 bg-sky-50/40 cursor-pointer transition";
        if (pdfLabel) pdfLabel.className = "flex items-center justify-between p-3.5 rounded-2xl border border-neutral-200 bg-white hover:bg-neutral-50 cursor-pointer transition";
    }
};

window.showChartTooltip = function (evt, dateLabel, amountLabel, x, y) {
    const tooltip = document.getElementById('chart-tooltip');
    const dateEl = document.getElementById('tooltip-date');
    const valEl = document.getElementById('tooltip-val');
    if (!tooltip || !dateEl || !valEl) return;

    dateEl.innerText = dateLabel;
    valEl.innerText = amountLabel;

    const leftPercent = (x / 700) * 100;
    const topPercent = (y / 200) * 100;

    tooltip.style.left = leftPercent + '%';
    tooltip.style.top = (topPercent - 8) + '%';
    tooltip.classList.remove('hidden');
};

window.hideChartTooltip = function () {
    const tooltip = document.getElementById('chart-tooltip');
    if (tooltip) tooltip.classList.add('hidden');
};

// 8. VOUCHER BELANJA (Vouchers Page) Script
function formatVoucherValueInput(prefix) {
    const typeEl = document.getElementById(`${prefix}-type`);
    const displayInput = document.getElementById(`${prefix}-value-display`);
    const rawInput = document.getElementById(`${prefix}-value`);
    if (!displayInput || !rawInput) return;

    let cleanVal = displayInput.value.replace(/\D/g, '');

    if (typeEl && typeEl.value === 'discount_percent') {
        let num = parseInt(cleanVal) || 0;
        if (num > 100) num = 100;
        cleanVal = num ? String(num) : '';
        displayInput.value = cleanVal;
        rawInput.value = cleanVal;
    } else {
        if (cleanVal) {
            let formatted = cleanVal.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            displayInput.value = formatted;
            rawInput.value = cleanVal;
        } else {
            displayInput.value = '';
            rawInput.value = '';
        }
    }
}

function updateValueHelperText(prefix) {
    const selectEl = document.getElementById(`${prefix}-type`);
    const helperEl = document.getElementById(`${prefix}-value-helper`);
    if (!selectEl || !helperEl) return;

    if (selectEl.value === 'discount_percent') {
        helperEl.textContent = 'Masukkan angka persentase diskon (contoh: 20 untuk diskon 20%)';
    } else {
        helperEl.textContent = 'Masukkan nominal potongan harga (contoh: 222.222 untuk potongan Rp222.222)';
    }

    formatVoucherValueInput(prefix);
}

function openVoucherModalById(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    const card = modal.querySelector('.bg-white');

    modal.classList.remove('hidden', 'pointer-events-none', 'opacity-0');
    modal.classList.add('pointer-events-auto', 'opacity-100');

    if (card) {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    }
}

function closeVoucherModalById(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    const card = modal.querySelector('.bg-white');

    modal.classList.remove('pointer-events-auto', 'opacity-100');
    modal.classList.add('hidden', 'pointer-events-none', 'opacity-0');

    if (card) {
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
    }

    const menus = document.querySelectorAll('[id^="dropdown-menu-"]');
    menus.forEach(menu => menu.classList.add('hidden'));
}

window.openCreateVoucherModal = function () {
    const displayInput = document.getElementById('create-value-display');
    const rawInput = document.getElementById('create-value');
    if (displayInput) displayInput.value = '';
    if (rawInput) rawInput.value = '';
    updateValueHelperText('create');
    openVoucherModalById('create-voucher-modal');
};

window.openEditVoucherModalFromBtn = function (btn) {
    try {
        const rawData = btn.getAttribute('data-voucher');
        if (!rawData) return;
        const v = typeof rawData === 'string' ? JSON.parse(rawData) : rawData;
        window.openEditVoucherModal(v);
    } catch (err) {
        console.error("Error parsing voucher data:", err);
    }
};

window.openEditVoucherModal = function (v) {
    const menus = document.querySelectorAll('[id^="dropdown-menu-"]');
    menus.forEach(menu => menu.classList.add('hidden'));

    const form = document.getElementById('edit-voucher-form');
    if (!form) return;
    form.action = `/dashboard/vouchers/${v.id}`;

    if (document.getElementById('edit-code')) document.getElementById('edit-code').value = v.code || '';
    if (document.getElementById('edit-type')) document.getElementById('edit-type').value = v.type || 'discount_percent';

    const displayInput = document.getElementById('edit-value-display');
    const rawInput = document.getElementById('edit-value');
    const numVal = Math.round(v.value || 0);
    if (rawInput) rawInput.value = numVal;
    if (displayInput) {
        if (v.type === 'discount_percent') {
            displayInput.value = numVal;
        } else {
            displayInput.value = String(numVal).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    }

    if (document.getElementById('edit-description')) document.getElementById('edit-description').value = v.description || '';

    if (v.end_date && document.getElementById('edit-end_date')) {
        const cleanDate = String(v.end_date).split('T')[0].split(' ')[0];
        document.getElementById('edit-end_date').value = cleanDate;
    }

    updateValueHelperText('edit');
    openVoucherModalById('edit-voucher-modal');
};

window.openEditVoucherModalDirect = function (e, id, code, type, value, endDate, description) {
    if (e) {
        e.preventDefault();
        e.stopPropagation();
    }

    const menus = document.querySelectorAll('[id^="dropdown-menu-"]');
    menus.forEach(menu => menu.classList.add('hidden'));

    const form = document.getElementById('edit-voucher-form');
    if (form) form.action = `/dashboard/vouchers/${id}`;

    if (document.getElementById('edit-code')) document.getElementById('edit-code').value = code || '';
    if (document.getElementById('edit-type')) document.getElementById('edit-type').value = type || 'discount_percent';

    const displayInput = document.getElementById('edit-value-display');
    const rawInput = document.getElementById('edit-value');
    const numVal = Math.round(value || 0);
    if (rawInput) rawInput.value = numVal;
    if (displayInput) {
        if (type === 'discount_percent') {
            displayInput.value = numVal;
        } else {
            displayInput.value = String(numVal).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    }

    if (document.getElementById('edit-description')) document.getElementById('edit-description').value = description || '';

    if (endDate && document.getElementById('edit-end_date')) {
        const cleanDate = String(endDate).split('T')[0].split(' ')[0];
        document.getElementById('edit-end_date').value = cleanDate;
    }

    updateValueHelperText('edit');
    openVoucherModalById('edit-voucher-modal');
};

window.confirmDeleteVoucher = function (id, code) {
    const form = document.getElementById('confirm-delete-form');
    if (form) form.action = `/dashboard/vouchers/${id}`;
    const codeEl = document.getElementById('delete-voucher-code');
    if (codeEl) codeEl.textContent = code;
    openVoucherModalById('delete-confirmation-modal');
};

window.toggleDropdownMenu = function (e, id) {
    if (e) e.stopPropagation();
    const menus = document.querySelectorAll('[id^="dropdown-menu-"]');
    menus.forEach(menu => {
        if (menu.id !== id) menu.classList.add('hidden');
    });
    const target = document.getElementById(id);
    if (target) target.classList.toggle('hidden');
};

window.formatVoucherValueInput = formatVoucherValueInput;
window.updateValueHelperText = updateValueHelperText;

// 9. KATEGORI & PRODUK INVENTARIS Script
window.toggleSubCategories = function (btn) {
    const group = btn.closest('.category-item-group');
    if (!group) return;
    const subList = group.querySelector('.sub-category-list');
    const svg = btn.querySelector('svg');
    if (subList) subList.classList.toggle('hidden');
    if (svg) svg.classList.toggle('-rotate-90');
};

window.filterCategoriesTree = function () {
    const query = (document.getElementById('category-search-input')?.value || '').toLowerCase().trim();
    const groups = document.querySelectorAll('.category-item-group');
    groups.forEach(group => {
        const name = group.getAttribute('data-name') || '';
        if (!query || name.includes(query)) {
            group.style.display = '';
        } else {
            group.style.display = 'none';
        }
    });
};

window.filterProductsTable = function () {
    const searchVal = (document.getElementById('product-search-input')?.value || '').toLowerCase().trim();
    const categoryVal = (document.getElementById('product-category-filter')?.value || '').toLowerCase();
    const statusVal = (document.getElementById('product-status-filter')?.value || '').toLowerCase();

    const rows = document.querySelectorAll('.product-row');
    rows.forEach(row => {
        const name = row.getAttribute('data-name') || '';
        const sku = row.getAttribute('data-sku') || '';
        const category = row.getAttribute('data-category') || '';
        const status = row.getAttribute('data-status') || '';

        const matchesSearch = !searchVal || name.includes(searchVal) || sku.includes(searchVal);
        const matchesCategory = !categoryVal || category === categoryVal;
        const matchesStatus = !statusVal || status === statusVal;

        if (matchesSearch && matchesCategory && matchesStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
};

// 10. KELOLA KARYAWAN & SHIFT Script
window.autoFillShiftHours = function (selectElem, targetInputId) {
    const targetInput = document.getElementById(targetInputId);
    if (!targetInput) return;
    const val = selectElem.value;
    if (val === 'Pagi') {
        targetInput.value = '06:00 - 14:00';
    } else if (val === 'Siang') {
        targetInput.value = '14:00 - 22:00';
    } else if (val === 'Malam') {
        targetInput.value = '22:00 - 06:00';
    } else if (val === '') {
        targetInput.value = '';
    }
};

window.filterUsersTable = function () {
    const searchVal = (document.getElementById('user-search-input')?.value || '').toLowerCase().trim();
    const roleVal = (document.getElementById('user-role-filter')?.value || '').toLowerCase().trim();
    const shiftVal = (document.getElementById('user-shift-filter')?.value || '').toLowerCase().trim();
    const statusVal = (document.getElementById('user-status-filter')?.value || '').toLowerCase().trim();

    const rows = document.querySelectorAll('.user-row');
    rows.forEach(row => {
        const name = row.getAttribute('data-name') || '';
        const email = row.getAttribute('data-email') || '';
        const role = row.getAttribute('data-role') || '';
        const shift = row.getAttribute('data-shift') || '';
        const status = row.getAttribute('data-status') || '';

        const matchesSearch = !searchVal || name.includes(searchVal) || email.includes(searchVal);
        const matchesRole = !roleVal || role === roleVal;
        const matchesShift = !shiftVal || shift.includes(shiftVal);
        const matchesStatus = !statusVal || status === statusVal;

        if (matchesSearch && matchesRole && matchesShift && matchesStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
};

window.openEditModal = function (user) {
    const modal = document.getElementById('edit-user-modal');
    if (!modal) return;
    const form = document.getElementById('edit-user-form');
    if (form) form.action = `/dashboard/users/${user.id}`;
    if (document.getElementById('edit_user_id_field')) document.getElementById('edit_user_id_field').value = user.id;
    if (document.getElementById('edit_name')) document.getElementById('edit_name').value = user.name || '';
    if (document.getElementById('edit_email')) document.getElementById('edit_email').value = user.email || '';
    if (document.getElementById('edit_role')) document.getElementById('edit_role').value = user.role || 'kasir';
    if (document.getElementById('edit_shift')) document.getElementById('edit_shift').value = user.shift || '';

    const placeholder = document.getElementById('edit-avatar-placeholder');
    const preview = document.getElementById('edit-avatar-preview');
    if (user.profile_picture) {
        if (preview) {
            preview.src = `/${user.profile_picture}`;
            preview.classList.remove('hidden');
        }
        if (placeholder) placeholder.classList.add('hidden');
    } else {
        if (preview) preview.classList.add('hidden');
        if (placeholder) {
            placeholder.classList.remove('hidden');
            placeholder.textContent = user.name ? user.name.substring(0, 2).toUpperCase() : '';
        }
    }

    if (window.openModal) window.openModal('edit-user-modal');
};

window.openEditShiftModal = function (shift) {
    if (window.closeModal) window.closeModal('manage-shifts-modal');
    const modal = document.getElementById('edit-shift-modal');
    if (!modal) return;
    const form = document.getElementById('edit-shift-form');
    if (form) form.action = `/dashboard/shifts/${shift.id}`;
    if (document.getElementById('edit_shift_name')) document.getElementById('edit_shift_name').value = shift.name || '';
    if (document.getElementById('edit_shift_start_time')) document.getElementById('edit_shift_start_time').value = shift.start_time || '';
    if (document.getElementById('edit_shift_end_time')) document.getElementById('edit_shift_end_time').value = shift.end_time || '';
    if (window.openModal) window.openModal('edit-shift-modal');
};


