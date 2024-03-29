function openPopupalarm() {
    document.getElementById("overlayalarm").style.display = "flex";
}

function closePopupalarm() {
    document.getElementById("overlayalarm").style.display = "none";
}

function addCustomTime() {
    // Logic to add custom time to the select element
    // You can implement this according to your requirements
    closePopupalarm(); // Close the popup after adding the custom time
}

function checkOption(select) {
    if (select.value === "custom") {
        openPopupalarm();
    }
}


function showAddOptionForm() {
    document.getElementById('overlay').style.display = 'flex';
}

function hideAddOptionForm() {
    document.getElementById('overlay').style.display = 'none';
}
function closePopup() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
}
function addOptionWithValues(selectId) {
    var selectElement = document.getElementById(selectId);
    var newOptionValue = document.getElementById('newOption').value;
    var newMinValue = document.getElementById('newMinValue').value;
    var newMaxValue = document.getElementById('newMaxValue').value;

    // Create a new <option> element
    var option = document.createElement('option');
    option.value = newOptionValue;
    option.text = newOptionValue;

    // Append the new option to the select element
    selectElement.add(option);

    // Set corresponding min and max values
    document.querySelector(`.vmin-${selectId}`).textContent = newMinValue;
    document.querySelector(`.vmax-${selectId}`).textContent = newMaxValue;

    // Hide the form
    hideAddOptionForm();
}
function editOptionValues(selectId) {
    var selectElement = document.getElementById(selectId);
    var selectedOptionIndex = selectElement.selectedIndex;
    if (selectedOptionIndex !== -1) {
        var selectedOption = selectElement.options[selectedOptionIndex];

        // Set values in the form for editing
        document.getElementById('newOption').value = selectedOption.value;
        document.getElementById('newMinValue').value = document.querySelector(`.vmin-${selectId}`).textContent;
        document.getElementById('newMaxValue').value = document.querySelector(`.vmax-${selectId}`).textContent;

        // Delete the selected option
        selectElement.remove(selectedOptionIndex);

        // Show the form for editing
        showAddOptionForm(selectId);
    }
}

function deleteOption(selectId) {
    var selectElement = document.getElementById(selectId);
    var selectedOptionIndex = selectElement.selectedIndex;
    if (selectedOptionIndex !== -1) {
        // Delete the selected option
        selectElement.remove(selectedOptionIndex);

        // Reset min and max values
        document.querySelector(`.vmin-${selectId}`).textContent = '';
        document.querySelector(`.vmax-${selectId}`).textContent = '';
    }
}