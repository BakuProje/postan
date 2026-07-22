// Kelola Kasir Pages script (Create & Edit)
document.addEventListener('DOMContentLoaded', function() {
    const pinInput = document.getElementById('pin');
    const container = document.getElementById('is_pin_unlocked_container');
    
    if (pinInput && container) {
        const togglePinStatusVisibility = () => {
            if (pinInput.value.trim().length === 4) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        };
        
        pinInput.addEventListener('input', togglePinStatusVisibility);
        togglePinStatusVisibility();
    }
});
