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
    const editCategorySelect = document.getElementById('edit_product_category');
    const editPriceInput = document.getElementById('edit_product_price');
    const editStockInput = document.getElementById('edit_product_stock');

    if (editNameInput) editNameInput.value = (isEditError && oldName) ? oldName : product.name;
    if (editCategorySelect) editCategorySelect.value = (isEditError && oldCategoryId) ? oldCategoryId : product.category_id;
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
let activePaymentMethod = 'cash'; // 'cash' or 'qris'

function addProductToCart(element) {
    const id = parseInt(element.dataset.id);
    const name = element.dataset.name;
    const price = parseInt(element.dataset.price);
    const stock = parseInt(element.dataset.stock);
    const photo = element.dataset.photo || '';

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
    renderPosCart();
}

function renderPosCart() {
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
            badge.textContent = posCart.reduce((acc, i) => acc + i.quantity, 0);
        }

        posCart.forEach(item => {
            const itemRow = document.createElement('div');
            itemRow.className = 'pos-cart-item-row bg-white/45 backdrop-blur-md rounded-xl p-3 border border-white/20 flex items-center justify-between gap-3 text-sm';

            let imgHtml = '';
            if (item.photo && item.photo.trim() !== '') {
                imgHtml = `<img src="${item.photo}" class="h-10 w-10 rounded-lg object-cover border border-neutral-100 shrink-0 shadow-xs">`;
            } else {
                imgHtml = `<div class="h-10 w-10 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase shrink-0 select-none">${item.name.substring(0, 2)}</div>`;
            }

            itemRow.innerHTML = `
                <div class="flex items-center gap-2.5 flex-1 min-w-0">
                    ${imgHtml}
                    <div class="min-w-0">
                        <p class="font-bold text-neutral-800 truncate text-xs sm:text-sm">${item.name}</p>
                        <p class="text-xs text-neutral-400 mt-0.5">${formatRupiah(item.price)}</p>
                    </div>
                </div>
                <div class="flex items-center gap-1.5 shrink-0">
                    <button type="button" onclick="updateCartQty(${item.id}, -1)" class="h-7 w-7 rounded bg-white border border-neutral-200 hover:border-sky-400 hover:text-sky-600 flex items-center justify-center font-bold text-sm select-none cursor-pointer">-</button>
                    <span class="font-extrabold text-neutral-700 w-5 text-center text-xs sm:text-sm">${item.quantity}</span>
                    <button type="button" onclick="updateCartQty(${item.id}, 1)" class="h-7 w-7 rounded bg-white border border-neutral-200 hover:border-sky-400 hover:text-sky-600 flex items-center justify-center font-bold text-sm select-none cursor-pointer">+</button>
                </div>
                <div class="text-right min-w-[70px] shrink-0">
                    <span class="font-extrabold text-neutral-800 block text-xs sm:text-sm">${formatRupiah(item.price * item.quantity)}</span>
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

    const totalQty = posCart.reduce((sum, item) => sum + item.quantity, 0);
    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

    const qtyLabel = document.getElementById('total-qty-label');
    const priceLabel = document.getElementById('total-price-label');
    const openPaymentBtn = document.getElementById('btn-open-payment-modal');

    if (qtyLabel) qtyLabel.textContent = `${totalQty} Item`;
    if (priceLabel) priceLabel.textContent = formatRupiah(totalPrice);

    if (openPaymentBtn) {
        if (posCart.length > 0) {
            openPaymentBtn.disabled = false;
            openPaymentBtn.className = 'w-full rounded-xl py-4 text-sm font-black text-white bg-sky-500 hover:bg-sky-600 active:scale-98 transition duration-200 flex items-center justify-center gap-2 shadow-md cursor-pointer';
        } else {
            openPaymentBtn.disabled = true;
            openPaymentBtn.className = 'w-full rounded-xl py-4 text-sm font-bold text-neutral-400 bg-neutral-150 border border-neutral-250 pointer-events-none transition duration-200 flex items-center justify-center gap-2 shadow-sm';
        }
    }
}

function openPaymentModal() {
    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const totalLabel = document.getElementById('payment-modal-total-label');
    if (totalLabel) {
        totalLabel.textContent = formatRupiah(totalPrice);
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

        const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const rawInput = document.getElementById('pos-paid-input');
        if (rawInput) rawInput.value = totalPrice;

        const qrisAutoLabel = document.getElementById('qris-auto-price-label');
        if (qrisAutoLabel) qrisAutoLabel.textContent = formatRupiah(totalPrice);

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

    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

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

    if (paidVal >= totalPrice) {
        const change = paidVal - totalPrice;
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

    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const amount = value === 'pas' ? totalPrice : value;

    rawInput.value = amount;
    formattedInput.value = formatNumberWithDots(String(amount));

    calculateChange();
}

function checkoutTransaction() {
    if (posCart.length === 0) return;

    const rawInput = document.getElementById('pos-paid-input');
    const paidVal = parseInt(rawInput.value) || 0;
    const totalPrice = posCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

    if (activePaymentMethod === 'cash' && paidVal < totalPrice) {
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
            total_paid: activePaymentMethod === 'qris' ? totalPrice : paidVal
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
    document.getElementById('receipt-payment-method').textContent = txData.payment_method === 'qris' ? 'QRIS' : 'CASH / TUNAI';
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
    window.print();
}

window.addProductToCart = addProductToCart;
window.updateCartQty = updateCartQty;
window.removeCartItem = removeCartItem;
window.clearCart = clearCart;
window.openPaymentModal = openPaymentModal;
window.selectPaymentMethod = selectPaymentMethod;
window.setQuickCash = setQuickCash;
window.checkoutTransaction = checkoutTransaction;
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
