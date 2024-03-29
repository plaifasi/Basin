// Set the default section id
var defaultSectionId = 'north-part';
var selectedMenuItem = null; // Declare selectedMenuItem variable

// Call the function when the page loads
window.onload = function() {
    // Set the default section as active
    changepartsection(defaultSectionId, document.querySelector('.menu-equipment li a[href="#' + defaultSectionId + '"]'));
};

function changepartsection(sectionId, menuItem) {
    var contentSections = document.getElementsByClassName('info-control');
    var selecteddisplay = document.getElementById(sectionId);

    // Remove all child elements from the .info-control
    for (var i = 0; i < contentSections.length; i++) {
        contentSections[i].style.display = 'none';
    }

    // Show the selected display
    if (selecteddisplay) {
        selecteddisplay.style.display = 'block';
    }

    // Remove the 'selected' class from the previously selected item
    if (selectedMenuItem) {
        selectedMenuItem.classList.remove('selected');
    }

    // Add the 'selected' class to the clicked menu item
    menuItem.classList.add('selected');
    selectedMenuItem = menuItem;
}
