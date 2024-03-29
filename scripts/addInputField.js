function addInputField() {
    const inputContainer = document.getElementById('inputContainer');

    // Hide all previous "Add" buttons
    const previousAddButtons = inputContainer.querySelectorAll('.add-button');
    previousAddButtons.forEach(button => {
        button.style.display = 'none';
    });

    // Create new input fields with a new "Add" button
    const newInput = document.createElement('div');
    newInput.innerHTML = `
        <label for="newOption">ตัวเลือก:</label>
        <input type="text" name="newOption" required>

        <label for="newMinValue">ต่ำสุด:</label>
        <input type="number" name="newMinValue" required>

        <label for="newMaxValue">สูงสุด</label>
        <input type="number" name="newMaxValue" required>

        <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>
    `;

    inputContainer.appendChild(newInput);
}
