<?php

// Function to trigger alarms for a specific plot
function trigger_alarms($id_plot) {
    global $con; 
    
    $alarm_notifications = '';

    // Set the timezone to "Asia/Bangkok"
    date_default_timezone_set("Asia/Bangkok");

    // Fetch alarms for the specified plot that are due
    $current_time = date("Y-m-d H:i:s");
    $query = "SELECT * FROM alarm WHERE id_plot = '$id_plot' AND time_alarm <= '$current_time'";
    $result = $con->query($query);

    // Check for errors
    if (!$result) {
        // Query failed, handle the error
        die("Error executing query: " . $con->error);
    }

    // Process due alarms
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Append alarm notification HTML to the variable
            $alarm_notifications .= "<div class='noti-box'>";
            $alarm_notifications .= "<div class='icon'><i class='fa-solid fa-screwdriver-wrench' style='color:#fff; transform: translateY(50%);'></i></div>";
            $alarm_notifications .= "<div class='right-noti-box'>";
            $alarm_notifications .= "<div class='text-content'>เวลาการให้น้ำของ $id_plot</div>";
            $alarm_notifications .= "<div class='timetell'>$current_time</div>";
            $alarm_notifications .= "</div>";
            $alarm_notifications .= "</div>";
            $alarm_notifications .= "<span class='space'></span>";
        }
    } else {
        
    }

    // Return the alarm notifications
    return $alarm_notifications;
}
?>

