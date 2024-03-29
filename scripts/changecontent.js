var defaultSectionId = 'remote-control-section';

    // Call the function when the page loads
    window.onload = function() {
        // Set the default section as active
        changeContent(defaultSectionId);
    };

function changeContent(sectionId) {
    // Remove 'active' class from all content sections
    var contentSections = document.getElementsByClassName('info-control');
    for (var i = 0; i < contentSections.length; i++) {
        contentSections[i].classList.remove('active');
    }

    // Add 'active' class to the selected content section
    var selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.add('active');
    }
}




