function notification() {
    console.log('called')
    var overlay = document.getElementById('notiOverlay');
    var popup = document.getElementById('notificationPopup');
    if (overlay && popup) {
        overlay.style.display = 'flex';
        overlay.style.width = '100%';
        popup.classList.add("show");
    }
}

function hidePopup() {
    console.log('hide call')
    var overlay = document.getElementById('notiOverlay');
    var popup = document.getElementById('notificationPopup');
    if (overlay && popup) {
        overlay.style.display = 'none';
        popup.classList.remove("show");
    }
}

