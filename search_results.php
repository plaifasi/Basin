<?php  
include('condb.php');

// Handle the search query
if(isset($_GET['search']) || isset($_GET['province'])) {
    // Check if a search term is provided
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    // Check if a province is selected
    $selectedProvince = isset($_GET['province']) ? $_GET['province'] : '';

    // Construct the SQL query based on the search term or selected province
    $sql = "SELECT plot.id_plot, farmer.name_farmer, geographies.name AS part_farmer_name, vpd.temp, vpd.temp_leaf, vpd.humidity, soil.humidity_soil, amphures.name_th AS amphures_name, provinces.name_th AS provinces_name 
            FROM plot 
            JOIN farmer ON plot.id_farmer = farmer.id_farmer 
            JOIN whether ON plot.id_whether = whether.id_whether 
            JOIN vpd ON whether.id_vpd = vpd.id_vpd 
            JOIN soil ON plot.id_soil = soil.id_soil 
            JOIN amphures ON farmer.id_amphures = amphures.id 
            JOIN provinces ON amphures.province_id = provinces.id
            JOIN geographies ON farmer.part_farmer = geographies.id
            WHERE 1"; // Start with a true condition

    // Add conditions based on search term or selected province
    if (!empty($searchTerm)) {
        $sql .= " AND (
                        plot.id_plot LIKE '%$searchTerm%' OR 
                        farmer.name_farmer LIKE '%$searchTerm%' OR 
                        geographies.name LIKE '%$searchTerm%' OR 
                        vpd.temp LIKE '%$searchTerm%' OR 
                        vpd.temp_leaf LIKE '%$searchTerm%' OR 
                        vpd.humidity LIKE '%$searchTerm%' OR 
                        soil.humidity_soil LIKE '%$searchTerm%' OR 
                        amphures.name_th LIKE '%$searchTerm%' OR 
                        provinces.name_th LIKE '%$searchTerm%'
                    )";
    }

    if (!empty($selectedProvince)) {
        $sql .= " AND provinces.name_th = '$selectedProvince'";
    }

    // Execute the SQL query
    $result = mysqli_query($con, $sql);

    // Check if query execution was successful
    if ($result === false) {
        // Display error message instead of terminating the script
        echo 'Error executing the query: ' . mysqli_error($con);
    }

    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {
        // Output the results
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

    // Close the database connection
    mysqli_close($con);
} else {
    // No search term or selected province provided, display default result
    // You can display a default result here or leave it blank
    echo "<p>No search term or selected province provided.</p>";
}
?>

<script src="scripts/clicked.js"></script>
