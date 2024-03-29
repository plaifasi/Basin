<?php
include('condb.php');

// Check if id_plot parameter is set
if(isset($_GET['id_plot'])) {
    // Retrieve id_plot from the query string
    $id_plot = $_GET['id_plot'];

    // Prepare and bind SQL statement
    $stmt = $con->prepare("SELECT * FROM alarm WHERE id_plot = ?");
    $stmt->bind_param("s", $id_plot);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any alarms found
    if($result->num_rows > 0) {
        // Start building the HTML markup for alarm list
        $output = '';

        // Loop through each alarm and append HTML markup
        while($row = $result->fetch_assoc()) {
            $output .= '<div class="display-alarm">';
            $output .= '<div class="display-bok">' . $row['time_alarm'] . '</div>';
            $output .= '<div class="buttom-opt">';
            $output .= '<label class="switch">';
            $output .= '<input type="checkbox">';
            $output .= '<span class="slider round"></span>';
            $output .= '</label>';
            $output .= '<button class="delete-alarm" data-alarm-id="' . $row['id_alarm'] . '"><i class="fa-solid fa-trash-can"></i></button>';
            $output .= '</div>';
            $output .= '</div>';
        }

        // Output the generated HTML markup
        echo $output;
    } else {
        // No alarms found for the specified id_plot
        echo "No alarms found for id_plot = $id_plot";
    }

    // Close statement
    $stmt->close();
} else {
    // id_plot parameter is not set
    echo "Error: id_plot parameter is not set.";
}

// Close connection
$con->close();
?>
