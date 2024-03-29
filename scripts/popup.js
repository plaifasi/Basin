function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup.style.visibility === "visible") {
        popup.style.visibility = "hidden";
    } else {
        popup.style.visibility = "visible";
    }
}