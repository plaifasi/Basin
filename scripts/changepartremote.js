function changepartremote(sectionId) {
    var contentparts = document.getElementsByClassName('remote-box');
    var selecteddisplay = document.getElementById(sectionId);

    // Hide the add button by default
    var editButton = document.getElementById('editbtn');
    if (editButton) {
        editButton.style.display = 'none';
    }

    // Remove all child elements from the .remote-box
    for (var i = 0; i < contentparts.length; i++) {
        contentparts[i].style.display = 'none';
    }

    // Show the selected display
    if (selecteddisplay) {
        selecteddisplay.style.display = 'flex';
    }

    // Show the edit button only when changing to 'remote-box-edit'
    if (sectionId === 'remote-box-edit' && editButton) {
        editButton.style.display = 'block';
    }
}
