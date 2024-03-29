<?php  
session_start();
$main_css_file = "views/dashboard.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');

$sql = "SELECT 
    pr.name_th AS province_name,
    GROUP_CONCAT(
        CONCAT_WS(',',
            p.id_plot, 
            f.name_farmer, 
            g.name, 
            v.temp, 
            v.temp_leaf, 
            v.humidity, 
            s.humidity_soil, 
            a.name_th, 
            pr.name_th
        ) 
        SEPARATOR '|'
    ) AS province_data
FROM 
    plot p
JOIN 
    farmer f ON p.id_farmer = f.id_farmer
JOIN 
    geographies g ON f.part_farmer = g.id
JOIN 
    whether w ON p.id_whether = w.id_whether
JOIN 
    vpd v ON w.id_vpd = v.id_vpd
JOIN 
    soil s ON p.id_soil = s.id_soil
JOIN 
    amphures a ON f.id_amphures = a.id
JOIN 
    provinces pr ON f.id_provinces = pr.id
GROUP BY 
    pr.name_th";
$result = mysqli_query($con, $sql);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<?php include('./includes/navbar.php'); ?>



<section class="content-whether">
                    <!--Start swiper-->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--Swiper content No.1-->
                            <?php
                                $chartIndex = 1;
                            // Loop through your data and generate a slide for each entry
                                while ($row = mysqli_fetch_assoc($result)) {
                                     $province_data = $row['province_data'];
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="whether">
                                            <div class="whether-container">
                                                <div class="head-box">
                                                    <div class="time-head">
                                                            01/11/2023 , 15:00:06
                                                    </div>
                                                    <div class="content-head-box">
                                                        
                                                        <div class="location-head">
                                                            <h1><?php echo $row['province_name']; ?></h1>
                                                            <h2>พระนคร</h2>
                                                        </div>
                                                        <div class="map-pic">
                                                            .
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rain">
                                                    <canvas id="rainChart<?php echo $chartIndex; ?>"></canvas>
                                                </div>
                                                <div class="temp">
                                                    <div class="head-temp">Temperature</div>
                                                    <div class="semi-donut margin" style="--percentage: 45; --fill: #DA2C38;">
                                                    </div>
                                                    <div class="des-weather"><span id="num-temp">28</span>Partly Cloudy</div>  
                                                    <div class="LH">
                                                        <div>L <span>24</span></div>
                                                        <div>H <span>30</span></div>
                                                    </div>
                                                </div>
                                                <div class="humidity">
                                                    <div class="head-temp">Relative Humidity</div>
                                                    <div class="semi-donut margin" style="--percentage: 45; --fill: #226F54;">
                                                    </div>
                                                    <div class="des-weather"><span id="num-humidity">62%</span></div>  
                                                    <div class="MN">
                                                        <div>0 </div>
                                                        <div>100 </div>
                                                    </div>
                                                </div>
                                                <div class="wind">
                                                    <div class="head-wind">Wind</div>
                                                    <div class="wind-content">
                                                    <div class="info-wind">
                                                        <div class="box-info-wind">
                                                            <div class="box-info-wind-above">
                                                                <div class="num-above">
                                                                    11
                                                                </div>
                                                                <div class="unit">
                                                                    <span>KM/H</span></br>Wind
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="compass" id="compass<?php echo $chartIndex; ?>">
                                                    <div class="scale" id="scale<?php echo $chartIndex; ?>"></div>
                                                    <div class="needle" id="needle<?php echo $chartIndex; ?>"></div>
                                                    <div class="mid-info" id="mid-info<?php echo $chartIndex; ?>">N</div>
                                                </div>
                                                    <!--<button onclick="rotateNeedle()">Rotate Needle</button>-->
                                                    </div>
                                                </div>
                                                <div class="uv">
                                                    <div class="head-uv">UV</div>
                                                    <div class="box-uv">
                                                        <div class="num-uv">3</div>
                                                        <div class="unit-uv">W m-2</div>
                                                    </div>
                                                </div>
                                                <div class="pressure">
                                                    <div class="head-pressure">Pressure</div>
                                                    <div class="semi-donut-compress margin" style="--percentage: 45; --fill: #DA2C38;">
                                                    </div>
                                                    <div class="des-weather"><span id="num-humidity">1009</span></div>  
                                                    <div class="MN">
                                                        <div>Low</div>
                                                        <div>height</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="list-container">
                                                <div class="head-list">
                                                    <h2>List for <?php echo $row['province_name']; ?></h2>
                                                    <a href="displayplot.php?province=<?php echo urlencode($row['province_name']); ?>">See all</a>
                                                </div>
                                                <div class="bage"></div>
                                                <div class="table-responsive custom-table-responsive">
                                                    <table class="table custom-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">หมายเลข</th>
                                                                <th scope="col">ชื่อเกษตรกร</th>
                                                                <th scope="col">ภูมิภาค</th>
                                                                <th scope="col">อุณหภูมิ</th>
                                                                <th scope="col">อุณหภูมิใบ</th>
                                                                <th scope="col">ความชื้น</th>
                                                                <th scope="col">ความชื้นดิน</th>
                                                                <th scope="col">อำเภอ</th>
                                                                <th scope="col">จังหวัด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            // Split the province_data by '|' to get individual data entries
                                                            $provinceEntries = explode('|', $province_data);
                                                            // Loop through each entry and split it by ',' to get individual values
                                                            foreach ($provinceEntries as $entry) {
                                                                $rowData = explode(',', $entry);
                                                            ?>      
                                                                    <style>
                                                                        tr.row:hover {
                                                                            background-color: #f5f5f5; /* Change to your desired hover color */
                                                                            cursor: pointer; /* Change cursor to pointer on hover */
                                                                        }
                                                                    </style>
                                                                    <tr class='row' onclick="handleRowClick(event, '<?php echo $rowData[0]; ?>')">
                                                                        <td><?php echo $rowData[0]; ?></td>
                                                                        <td><?php echo $rowData[1]; ?></td>
                                                                        <td><?php echo $rowData[2]; ?></td>
                                                                        <td><?php echo $rowData[3]; ?></td>
                                                                        <td><?php echo $rowData[4]; ?></td>
                                                                        <td><?php echo $rowData[5]; ?></td>
                                                                        <td><?php echo $rowData[6]; ?></td>
                                                                        <td><?php echo $rowData[7]; ?></td>
                                                                        <td><?php echo $rowData[8]; ?></td>
                                                                        
                                                                    </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $chartIndex++; ?>
                                <?php
                                }
                            ?>   
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!--End swiper-->
</section>







<!-- Include JavaScript files -->
<script src="scripts/swiper.js" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="scripts/notification.js"></script> <!-- Script for Notifications menu -->
<script src="scripts/filter.js"></script><!-- Scripts for Log out button -->
<script src="scripts/compress.js"></script><!-- Script for styles for compress in wind -->
<script src="scripts/chart.js"></script> <!-- Script for styles for chart in rain -->
<script src="scripts/hamburger.js"></script> <!-- Script for hamburger responsive -->
<script src="scripts/clicked.js"></script>
<?php include('./includes/footer.php'); ?>




