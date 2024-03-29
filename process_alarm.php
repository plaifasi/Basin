<?php
include('condb.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["setalarm"])) {
    // Retrieve the alarm time and plot ID from the form
    $time_alarm = $_POST["setalarm"];
    $id_plot = isset($_POST["id_plot"]) ? $_POST["id_plot"] : null;

    // Validate id_plot (optional)
    if (!is_string($id_plot)) {
        // Display error message
        echo "<div class='error'>Error: id_plot is not a string.</div>";
        exit; // Stop further execution
    }

    // Ensure id_plot is not empty
    if ($id_plot !== "") {
        // Prepare and bind SQL statement
        $stmt = $con->prepare("INSERT INTO alarm (id_plot, time_alarm) VALUES (?, ?)");
        $stmt->bind_param("ss", $id_plot, $time_alarm); // Use "ss" for two string parameters

        // Execute the statement
        if ($stmt->execute()) {
            // Alarm set successfully
            echo "<div class='success'>Alarm set successfully.</div>";
        } else {
            // Error setting alarm
            echo "<div class='error'>Error: " . $stmt->error . "</div>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Display error message
        echo "<div class='error'>Error: id_plot is empty.</div>";
    }
}

// Close connection
?>
