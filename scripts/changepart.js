

function changepart(sectionId) {
    var contentparts = document.getElementsByClassName('box-info-part');
    var selecteddisplay = document.getElementById(sectionId);

    // Hide the add button by default
    var addButton = document.getElementById('addButton_tempsur');
    if (addButton) {
        addButton.style.display = 'none';
    }

    // Remove all child elements from the .box-info-part
    for (var i = 0; i < contentparts.length; i++) {
        contentparts[i].style.display = 'none';
    }

    // Show the selected display
    selecteddisplay.style.display = 'flex';

    // Show the add button only when changing to 'test1'
    if (sectionId === 'edit-tempsur' && addButton) {
        addButton.style.display = 'block';
    }
}




function changepartalarm(sectionId) {
    var contentparts = document.getElementsByClassName('wrapper');
    var selecteddisplay = document.getElementById(sectionId);

    console.log(sectionId)

    // Remove all child elements from the .box-info-part
    for (var i = 0; i < contentparts.length; i++) {
        contentparts[i].style.display = 'none';
    }

    // Show the selected display
    selecteddisplay.style.display = 'flex';
}

