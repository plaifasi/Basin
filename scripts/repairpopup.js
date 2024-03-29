// script.js
document.addEventListener('DOMContentLoaded', function () {
    const showPopupBtn = document.getElementById('showPopupBtn');
    const popupOverlay = document.getElementById('popupOverlay');
    const iconifyCloseBtn = document.getElementById('iconifyCloseBtn');

    showPopupBtn.addEventListener('click', function () {
        popupOverlay.style.display = 'flex';
    });

    iconifyCloseBtn.addEventListener('click', function () {
        closePopup();
    });

    // Close the popup if the overlay is clicked
    function closePopup() {
        popupOverlay.style.display = 'none';
    }
});




function setAlarm() {
    document.getElementById("popupBox").style.display = "block";
}

function closePopupAlarm() {
    document.getElementById("popupBox").style.display = "none";
}

function submitAlarm() {
    // Logic to submit the alarm data
    // You can implement this according to your requirements
    closePopupAlarm(); // Close the popup after setting the alarm
}


function showAlarm() {
    var popup = document.getElementById("setAlarm");
    popup.classList.add("show");
}

function hideAlarm() {
    var popup = document.getElementById("setAlarm");
    popup.classList.remove("show");
}

