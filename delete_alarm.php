<?php
include('condb.php');

// Check if the request method is POST and if the id_alarm parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_alarm"])) {
    $id_alarm = $_POST["id_alarm"];

    // Prepare and execute the DELETE statement
    $stmt = $con->prepare("DELETE FROM alarm WHERE id_alarm = ?");
    $stmt->bind_param("i", $id_alarm);

    if ($stmt->execute()) {
        // Return a success message upon successful deletion
        echo "success";
    } else {
        // Return an error message upon deletion failure
        echo "Error deleting alarm: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Return an invalid request message if the request method is not POST or id_alarm parameter is not set
    echo "Invalid request.";
}
?>
