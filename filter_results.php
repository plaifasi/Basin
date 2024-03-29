<?php
// Include your database connection file if not already included
include('condb.php');

// Check if the form is submitted with filter parameters
if(isset($_GET['province']) || isset($_GET['district']) || isset($_GET['joindate']) || isset($_GET['harvestdate'])) {
    // Retrieve filter parameters
    $province = isset($_GET['province']) ? $_GET['province'] : '';
    $district = isset($_GET['district']) ? $_GET['district'] : '';
    $joindate = isset($_GET['joindate']) ? $_GET['joindate'] : '';
    $harvestdate = isset($_GET['harvestdate']) ? $_GET['harvestdate'] : '';

    // Construct SQL query with filter conditions
    $sql = "SELECT plot.*, farmer.*
            FROM plot
            INNER JOIN farmer ON plot.id_farmer = farmer.id_farmer
            WHERE 1";

    if(!empty($province)) {
        // Adjust the column name according to your database structure
        $sql .= " AND farmer.id_provinces = '$province'";
    }

    // Add more conditions for other filter parameters as needed...

    // Execute the SQL query
    $result = mysqli_query($con, $sql);

    // Check if query execution was successful
    if($result) {
        // Display filtered results
        if(mysqli_num_rows($result) > 0) {
            echo '<div class="table-responsive custom-table-responsive">';
            echo '<table class="table custom-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">หมายเลข</th>';
            echo '<th scope="col">ชื่อเกษตรกร</th>';
            echo '<th scope="col">ภูมิภาค</th>';
            echo '<th scope="col">อุณหภูมิ</th>';
            echo '<th scope="col">อุณหภูมิใบ</th>';
            echo '<th scope="col">ความชื้น</th>';
            echo '<th scope="col">ความชื้นดิน</th>';
            echo '<th scope="col">อำเภอ</th>';
            echo '<th scope="col">จังหวัด</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<style>
                    /* CSS */
                    tr.row:hover {
                        background-color: #f5f5f5; /* Change to your desired hover color */
                        cursor: pointer; /* Change cursor to pointer on hover */
                    }
                </style>";
                echo "<tr class='row' onclick='handleRowClick(\"" . $row['id_plot'] . "\")'>";
                echo "<td>" . $row['id_plot'] . "</td>";
                echo "<td>" . $row['name_farmer'] . "</td>";
                echo "<td>" . $row['part_farmer_name'] . "</td>";
                echo "<td>" . $row['temp'] . "</td>";
                echo "<td>" . $row['temp_leaf'] . "</td>";
                echo "<td>" . $row['humidity'] . "</td>";
                echo "<td>" . $row['humidity_soil'] . "</td>";
                echo "<td>" . $row['amphures_name'] . "</td>";
                echo "<td>" . $row['provinces_name'] . "</td>";
                echo "</tr>";
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            // No results found
            echo "<p>No results found.</p>";
        }
    } else {
        // Error executing the query
        echo 'Error executing the query: ' . mysqli_error($con);
    }
} else {
    // No filter parameters provided
    // You may display a default message or handle it accordingly
    echo "<p>No filter parameters provided.</p>";
}

// Close the database connection
mysqli_close($con);
?>
