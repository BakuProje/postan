// Profile Page Scripts

window.previewAvatar = function(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('avatar-preview');
            const placeholder = document.getElementById('avatar-placeholder');
            if (previewImg) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
            }
            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

window.openChangePinModal = function() {
    const modal = document.getElementById('change-pin-modal');
    const card = document.getElementById('change-pin-modal-card');
    if (modal && card) {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    }
}

window.closeChangePinModal = function() {
    const modal = document.getElementById('change-pin-modal');
    const card = document.getElementById('change-pin-modal-card');
    if (modal && card) {
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        modal.classList.add('opacity-0', 'pointer-events-none');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
    }
}

window.handleStopShiftFromProfile = function(isShiftActive) {
    if (!isShiftActive) {
        if (window.showToastNotification) {
            window.showToastNotification('Tidak ada shift yang sedang berjalan.', 'error');
        } else {
            alert('Tidak ada shift yang sedang berjalan.');
        }
    } else {
        if (window.handleStopShift) {
            window.handleStopShift();
        }
    }
}

// Auto open change PIN modal on pin error
document.addEventListener('DOMContentLoaded', () => {
    if (window.hasPinErrors) {
        window.openChangePinModal();
    }
});
