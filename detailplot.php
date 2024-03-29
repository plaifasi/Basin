<?php  
session_start();
date_default_timezone_set("Asia/Bangkok");
$main_css_file = "views/detailplot.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');
include('./includes/navbar.php');

$id_plot = $_GET['id_plot'];



$stmt = $con->prepare("SELECT id_alarm, time_alarm FROM alarm WHERE id_plot = ?");
$stmt->bind_param("s", $id_plot);
$stmt->execute();
$result = $stmt->get_result();


?>

    <section class="progress-plot">
        <div class="progress-plot-container">
            <div class="progress-bar">
                <div class="progress-step active" data-progress-id="1">
                    <iconify-icon icon="tabler:seeding" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">พืชเล็ก</div>
                </div>
                <div class="progress-step" data-progress-id="2">
                    <iconify-icon icon="ph:tree-bold" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">ฟื้นต้น</div>
                </div>
                <div class="progress-step" data-progress-id="3">
                    <iconify-icon icon="fluent:food-grains-24-regular" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">สะสมอาหาร</div>
                </div>
                <div class="progress-step" data-progress-id="4">
                    <iconify-icon icon="ph:flower" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">สร้างดอก</div>
                </div>
                <div class="progress-step" data-progress-id="5">
                    <iconify-icon icon="carbon:carbon-for-salesforce" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">ขยายทรงผล</div>
                </div>
                <div class="progress-step" data-progress-id="6">
                    <iconify-icon icon="fa6-solid:plate-wheat" width="1.2em" height="1.2em"></iconify-icon>
                    <div class="step">สร้างคุณภาพเนื้อ</div>
                </div>

            </div>
        </div>
    </section>



    


    
    <!--Start Profile bar-->
    <section class="menu-profile">
        <div class="menubar-profile-container">
            <div class="menubar-profile-box">
                <?php 
                if (isset($_GET['id_plot'])) {
                    $id_plot = $_GET['id_plot'];
                    
                    // Prepare and execute the query to fetch farmer details based on id_plot
                    $stmt = $con->prepare("SELECT f.name_farmer, f.id_farmer, f.join_time 
                                        FROM farmer f
                                        INNER JOIN plot p ON f.id_farmer = p.id_farmer
                                        WHERE p.id_plot = ?");
                    $stmt->bind_param("s", $id_plot);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result && $result->num_rows > 0) {
                        // Fetch farmer details
                        $row = $result->fetch_assoc();
                        $name_farmer = $row['name_farmer'];
                        $id_farmer = $row['id_farmer'];
                        $join_time = $row['join_time'];
                ?>
                <div class="profile">
                    <div class="sep">
                    <div class="profile-pic"><?php echo mb_substr($name_farmer, 0, 1, 'UTF-8'); ?></div>
                        <a href="">
                            <div class="profile-info">
                                <div class="profile-name"><?php echo $name_farmer; ?></div>
                                <div class="id"><?php echo $id_farmer; ?></div>
                                <div class="join"><iconify-icon icon="ic:outline-calendar-month"></iconify-icon>Joined by <?php echo $join_time; ?></div>
                            </div>
                        </a>
                    </div>
                    <div class="btn-edit" id="btn-edit"><a href="index.php">Edit</a></div>
                </div>
                <?php
                } else {
                    echo "No farmer found for the given plot ID.";
                }
                } else {
                    echo "Plot ID not provided in the URL.";
                }
                ?>

                
                <div class="menubar">
                    <ul class="menu-equipment">
                        <li><a href="#" onclick="changeContent('remote-control-section')">Remote control</a></li>
                        <li><a href="#" onclick="changeContent('product-section')">Product</a></li>
                        <li><a href="#" onclick="changeContent('equipment-section')">Equipment</a></li>
                        <li><a href="#" onclick="changeContent('information-section')">Information</a></li>
                        <li><a href="#" onclick="changeContent('report-section')">Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--End Profile bar-->

    <!--Strat remote section-->
    <section id="remote-control-section" class="info-control">
        <div class="info-control-container">
            <!--Strat Parameter bar which is left side-->
            <div class="parameter-box">
                <div class="date-info">
                    <div>Date</div>
                    <button class="popup-btn" onclick="togglePopup('popup1')"><span class="date-info">1/01/2023</span></button>
                </div>
                
                <!--Start popup box for set alarm -->
                <div class="popup-container" id="popup1">
                        <div class="pop">
                            <div class="head-title">
                                <h2>Parameter History</h2>
                                <span class="close-btn" onclick="togglePopup('popup1')"><i class="fa-solid fa-xmark"></i></span>
                            </div>

                            <div class="display">
                                <div class="display-container">
                                    <div class="box-display">
                                        <div class="search-box">
                                            <form action="" class="search">
                                                <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                                                <button type="button" class="filter">
                                                    <i class="fa fa-filter" onclick="filter('myPopup4')"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                                                </button>
                                            </form>
                    
                                            <div class="popupfilter">
                                                <div class="popuptext" id="myPopup4">
                                                    <form action="" class="filter-plot">
                                                        <label for="province">Province</label>
                                                        <select name="province" id="province" onchange="updateDistricts()">
                                                            <option value="กรุงเทพ">กรุงเทพ</option>
                                                            <option value="จันทบุรี">จันทบุรี</option>
                                                            <option value="ชุมพร">ชุมพร</option>
                                                            <option value="ระยอง">ระยอง</option>
                                                        </select>
                                                        <label for="district">District</label>
                                                        <select name="district" id="district">
                                                            
                                                        </select>
                                                        <label for="joindate">Joined</label>
                                                        <input type="date" name="joindate" id="joindate">
                                                        <label for="harvestdate">Harvest date</label>
                                                        <input type="date" name="harvestdate" id="harvestdate">
                                        
                                                        <button type="button" class="form-filter-btn">Apply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                    
                    
                                        <div class="table-responsive custom-table-responsive">
                                            <table class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">วันที่</th>
                                                        <th scope="col">อุณหภูมิ</th>
                                                        <th scope="col">อุณหภูมิใบ</th>
                                                        <th scope="col">ความชื้น</th>
                                                        <th scope="col">ความชื้นดิน</th>
                                                        <th scope="col">VPD</th>
                                                        <th scope="col">ความเข้มแสง</th>
                                                        <th scope="col">Co2</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr class="row">
                                                            <th scope="row">01/12/2022</th>
                                                            <td>28°</td>
                                                            <td>24°</td>
                                                            <td>40%</td>
                                                            <td>60%</td>
                                                            <td>1.4</td>
                                                            <td>900</td>
                                                            <td>300</td>
                                                        </tr>
                                                        <tr class="spacer">
                                                            <td colspan="100"></td>
                                                        </tr>

                                                    </tbody>
                                                </thead>
                    
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                <!--End popup box for set alarm-->


                <!-- Start popup box for set alarm -->
                <div id="popupBox" class="popup">
                    <div class="popup-content">
                        <div class="error"  id="errorMessage" >
                    <!-- Error messages will be displayed here -->
                        </div>
                        <?php
                            require_once 'alarm_trigger.php';

                            $id_plot = isset($_GET['id_plot']) ? $_GET['id_plot'] : '';

                            // Call the function to trigger alarms for the specified plot
                            trigger_alarms($id_plot);
                        ?>
                        <div class="head-alarm">
                            <h2>Set Alarm</h2>
                            <button onclick="closePopupAlarm()"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <form id="alarmForm">
                            <input type="hidden" name="id_plot" value="<?php echo htmlspecialchars($id_plot); ?>">
                            <div class="set-content">
                                <label for="setalarm">Alarm Time:</label>
                                <div class="setalarm-right">
                                    <input type="time" name="setalarm" id="setalarm">  
                                </div>
                                <button type="submit">Set</button>
                            </div>
                        </form>
                        <div class="alarm-list" id="alarmList">
                            <!-- Existing alarms will be displayed here -->
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div class='display-alarm'>";
                                        echo "<div class='display-bok'>" . $row['time_alarm'] . "</div>";
                                        echo "<div class='buttom-opt'>";
                                        echo "<label class='switch'>";
                                        echo "<input type='checkbox'>";
                                        echo "<span class='slider round'></span>";
                                        echo "</label>";
                                        echo "<button id='delete-alarm' data-alarm-id='" . $row['id_alarm'] . "'><i class='fa-solid fa-trash-can'></i></button>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    // No rows found
                                    echo "No alarms found for id_plot = $id_plot";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End popup box for set alarm -->



                

                <div class="parameter-info-box">
                    <div class="temp-sur-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Temperature</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('TempsurDropdown')" class="dropbtn">เย็น<i id="angle"class="fa-solid fa-angle-down"></i></button> 
                            <div id="TempsurDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="temp-leaf-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Temperature leaf</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('TempleafDropdown')" class="dropbtn">อุ่น<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="TempleafDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="rh-sur-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Humidity</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('RHsurmyDropdown')" class="dropbtn">ชื้น<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="RHsurmyDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="rh-soil-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Humidity soil</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('RHsoilDropdown')" class="dropbtn">ชื้นมาก<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="RHsoilDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="vpd-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>VPD</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('VPDDropdown')" class="dropbtn">ปานกลาง<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="VPDDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div><div class="vpd-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Lux</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('VPDDropdown')" class="dropbtn">ปานกลาง<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="VPDDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div><div class="vpd-box">
                        <i class="fa fa-temperature-empty"></i>
                        <p>Co2</p>
                        <span>28</span>
                        <div class="dropdown">
                            <button onclick="myFunction('VPDDropdown')" class="dropbtn">ปานกลาง<i id="angle"class="fa-solid fa-angle-down"></i></button>
                            <div id="VPDDropdown" class="dropdown-content">
                              <a href="#">Link 1</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Parameter bar which is left side-->

            <!--Start Remote control which is right side-->
            <div class="remote-control-box">

                <div class="head-remote">
                    <span class="head-part">ภาคตะวันออก</span>
                    <div class="alarm" onclick="setAlarm()" onmouseover="showAlarm()" onmouseout="hideAlarm()"><iconify-icon icon="solar:alarm-outline"></iconify-icon>
                        <span class="textalarm" id="setAlarm">set alarm</span>
                      </div>
                </div>
                
                <!--Start popup box for set alarm -->
                <div id="popupBox" class="popup">
                    <div class="popup-content">
                        <div class="head-alarm">
                            <h2>Set Alarm</h2>
                            <button onclick="closePopupAlarm()"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <form id="alarmForm" action="process_alarm.php" method="post">
                            <div class="set-content">
                                <label for="setalarm">ตั้งเวลา:</label>
                                <div class="setalarm-right">
                                    <input type="time" name="setalarm" id="setalarm">
                                    
                                </div>
                            </div>
                            <div class="alarm-list" id="alarmList">
                            <?php
           
                                if ($result->num_rows > 0) {
                                    // Loop through each alarm and generate HTML elements
                                    while ($row = $result->fetch_assoc()) {
                                        // Display alarm time
                                        echo "<div class='display-alarm'>";
                                        echo "<div class='display-bok'>" . $row['time_alarm'] . "</div>";
                                        echo "<div class='buttom-opt'>";
                                        // Additional options for each alarm (e.g., delete button)
                                        echo "<button><i class='fa-solid fa-trash-can'></i></button>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    // Display a message if no alarms are found
                                    echo "No alarms found.";
                                }
                                ?>

                            </div>
                            <div class="btn-set">
                                <button type="submit">Set</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!--End popup box for set alarm-->
                

                

                <div class="remote-container">
                    <div class="remote-box">
                        <form action="" class="remote-form">
                            <div class="water-box">
                                <div class="head-remote-water">
                                    <div class="icon-water">
                                        <iconify-icon id="water-icon" icon="fa-solid:water"></iconify-icon>
                                    </div>
                                    <div class="head-water">
                                        water
                                    </div>
                                </div>
                                <div class="content-water">
                                    <div class="input-water">
                                        <input type="number" placeholder="50"  class="custom-input" min="1">
                                    </div>
                                    <div class="more-content">
                                        <div class="icon-input-water">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        <div class="unit-water">
                                            ลิตร/ต้น
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="pui-box">  
                                <div class="head-remote-pui">
                                    <div class="icon-pui">
                                        <iconify-icon id="pui-icon" icon="icon-park-outline:leaves"></iconify-icon>
                                    </div>
                                    <div class="head-pui">
                                        Fertilizer
                                    </div>
                                </div>
                                <div class="content-pui">
                                    <div class="input-pui">
                                        <input type="number" placeholder="50"  class="custom-input" min="1">
                                    </div>
                                    <div class="more-content">
                                        <div class="icon-input-pui">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        <div class="unit-pui">
                                            ลิตร/ต้น
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-form-remote">
                                <button class="btn-form-remote" type="submit">Apply</button>
                            </div> 
                        </form>
    
                    </div>    
                </div>
            </div>
            <!--End Remote control which is right side-->

        </div>
    </section>
    <!--End remote section-->

    <!--Start Product section-->
    <section id="product-section" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="search-box">
                        <form action="" class="search">
                            <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                            <button type="button" class="filter">
                                <i class="fa fa-filter" onclick="filter('myPopup1')"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                            </button>
                        </form>

                        <div class="popupfilter">
                            <div class="popuptext" id="myPopup1">
                                <form action="" class="filter-plot">
                                    <label for="joindate">วันที่ทำการบันทึก</label>
                                    <input type="date" name="joindate" id="joindate">
                                    <div class="repot-check">
                                        <label for="quantity">รายงาน</label>
                                        <input type="checkbox" id="" name="quantity">
                                    </div>
                                    <div class="slidecontainer">
                                        <p>จำนวน: <span id="sliderValue">500</span></p>
                                        <input type="range" min="1" max="1000" value="500" class="slider" id="myRange">
                                    </div>
                                    <script>
                                        var slider = document.getElementById("myRange");
                                        var output = document.getElementById("sliderValue");
                                        output.innerHTML = slider.value;

                                        slider.oninput = function() {
                                        output.innerHTML = this.value;
                                        }
                                    </script>
                    
                                    <button type="button" class="form-filter-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive custom-table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">หมายเลข</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">คุณภาพ</th>
                                    <th scope="col">รายงาน</th>
                                    <th scope="col">วันที่ทำการบันทึก</th>
                                </tr>
                                <tbody>
                                    <tr class="row">
                                        <th scope="row">PD14587</th>
                                        <td>500</td>
                                        <td>7.8</td>
                                        <td>ไม่มี</td>
                                        <td>14/11/2024</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                </tbody>
                            </thead>

                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--End Product section-->

    <!--Start equipment section-->
    <section id="equipment-section" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="search-box">
                        <form action="" class="search">
                            <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                            <button type="button" class="filter">
                                <i class="fa fa-filter" onclick="filter('myPopup2')"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                            </button>
                        </form>
                        
                        <div class="popupfilter">
                        <div class="popuptext" id="myPopup2">
                            <form action="" class="filter-plot">
                                <label for="quantity"><b>สถานะ</b></label>
                                <div class="repot-check">
                                    
                                    <label for="quantity">ปกติ</label>
                                    <input type="checkbox" id="" name="quantity">
                                    <label for="quantity">ผิดปกติ</label>
                                    <input type="checkbox" id="" name="quantity">
                                </div>    
                                <button type="button" class="form-filter-btn">Apply</button>
                            </form>
                        </div>
                        </div>
                    </div>

                    <div class="table-responsive custom-table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">หมายเลข</th>
                                    <th scope="col">ชื่ออุปกรณ์</th>
                                    <th scope="col"></th>
                                    <th scope="col">สถานะ</th>
                                </tr>
                                <tbody>
                                    <tr class="row">
                                        <th scope="row">E25848</th>
                                        <td>ปั๊มน้ำ</td>
                                        <td></td>
                                        <td>ปกติ</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                    <tr class="row">
                                        <th scope="row">E25977</th>
                                        <td>ระบบท่อ</td>
                                        <td></td>
                                        <td>ปกติ</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                    <tr class="row">
                                        <th scope="row">E98874</th>
                                        <td>ระบบท่อ</td>
                                        <td><button class="repair-button" id="showPopupBtn">repair</button></td>
                                        <td>ผิดปกติ</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                </tbody>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End equipment section-->


    <!--Start information section-->
    <section id="information-section" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="accordion">
                        <div class="topic">
                            <button class="accordion-btn" onclick="toggleAccordion('topic1a')">Analyse Predictive</button>
                            <div id="topic1a" class="accordion-content">
                                <div class="content-box">
                                    <div class="contentcontainer">
                                        <div class="graph">
                                            <canvas id="line-chart" width="400" height="400"></canvas>
                                        </div>
                                        <div class="drymatter">DRY MATTER
                                            <div class="num-drymatter">38%</div>
                                        </div>
                                        <div class="report">
                                            <div class="head-report">Report analyze </div>
                                            <div class="content-report">ในวันที่ 03/11/2023 เกิดพายุลูกเห็บอาจส่งผลให้เกิดรอยขีดข่วนที่ผลผลิตได้</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                

                <div class="box-display">
                    <div class="accordion">
                        <div class="topic">
                            <button class="accordion-btn" onclick="toggleAccordion('topic1b')">Farmer Information</button>
                            <div id="topic1b" class="accordion-content">
                                <div class="info-farmer">
                                    <div class="hedinfo">
                                        <div class="name">Name</div>
                                        <div class="birth">Birth Date</div>
                                        <div class="tell">Tell</div>
                                        <div class="email">Email</div>
                                        <div class="gender">Gender</div>
                                        <div class="address">Address</div>
                                        <div class="part">Part</div>
                                        <div class="size">Size</div>
                                        <div class="dateplant">Date of Plant</div>
                                    </div>
                                    <div class="value-info">
                                        <div class="Vname">จำจง ใจดี</div>
                                        <div class="Vbirth">20/12/1998</div>
                                        <div class="Vtell">0895148458</div>
                                        <div class="Vemail">jumjong_1988@gmail.com</div>
                                        <div class="Vgender">male</div>
                                        <div class="Vaddress">203-1 กรุงเทพ</div>
                                        <div class="Vpart">กลาง</div>
                                        <div class="Vsize">15</div>
                                        <div class="Vdateplant">1/1/2020</div>
                                    </div>
                                </div> 
                                <button class="edit-btn" onclick="editFarmerInfo()">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="box-display">
                    <div class="accordion">
                        <div class="topic">
                            <button class="accordion-btn" onclick="toggleAccordion('topic1c')">Plot Information</button>
                            <div id="topic1c" class="accordion-content">
                                <div class="info-plot">
                                    <div class="head-plot">
                                        <div class="headsoil">Soil</div>
                                        <div class="soiltex">Soil Texture</div>
                                        <div class="depth">Depth</div>
                                        <div class="ph">pH</div>
                                        <div class="soilsailt">Soil salinity</div>
                                        <div class="ec">EC</div>
                                        <div class="humidity">Humidity</div>
                                        <div class="headarea">Area</div>
                                        <div class="sea">Matres above sea level</div>
                                        <div class="slop">Slope</div>
                                    </div>
                                    <div class="value-plot">
                                        <div class="Vheadsoil">Soil</div>
                                        <div class="Vsoiltex">Soil Texture</div>
                                        <div class="Vdepth">Depth</div>
                                        <div class="Vph">pH</div>
                                        <div class="Vsoilsailt">Soil salinity</div>
                                        <div class="Vec">EC</div>
                                        <div class="Vhumidity">Humidity</div>
                                        <div class="Vheadarea">Area</div>
                                        <div class="Vsea">Matres above sea level</div>
                                        <div class="Vslop">Slope</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!--End information section-->

    <section id="report-section" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="search-box">
                        <form action="" class="search">
                            <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                            <button type="button" class="filter">
                                <i class="fa fa-filter" onclick="filter('myPopup5')"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                            </button>
                        </form>
                        
                        <div class="popupfilter">
                        <div class="popuptext" id="myPopup5">
                            <form action="" class="filter-plot">
                                <label for="joindate">วันที่ทำการบันทึก</label>
                                <input type="date" name="joindate" id="joindate">
                                <div class="repot-check">
                                    <label for="quantity">ตรวจสอบ</label>
                                    <input type="checkbox" id="" name="quantity">
                                    <label for="quantity">วัดผล</label>
                                    <input type="checkbox" id="" name="quantity">
                                </div> 
                                <button type="button" class="form-filter-btn">Apply</button>
                            </form>
                        </div>
                        </div>
                    </div>

                    <div class="table-responsive custom-table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">ชื่อการรายงาน</th>
                                    <th scope="col">ตรวจสอบ</th>
                                    <th scope="col">วัดผล</th>
                                    <th scope="col">อธิบาย</th>
                                    <th scope="col">วันที่ทำการบันทึก</th>
                                </tr>
                                <tbody>
                                    <tr class="row">
                                        <th scope="row">สารอนินทรีย์</th>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>แร่ธาตุครบ โครงสร้างดี</td>
                                        <td>2/12/2024</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                    <tr class="row">
                                        <th scope="row">อินทรีย์วัตถุ</th>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>โครงสร้างดี</td>
                                        <td>2/12/2024</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>
                                    <tr class="row">
                                        <th scope="row">ช่องว่างอากาศ</th>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>โครงสร้างดี</td>
                                        <td>2/12/2024</td>
                                    </tr>
                                    
                                </tbody>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Start Information in each equipment-->
    <section id="id01" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="search-box">
                        <form action="" class="search">
                            <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                            <button type="button" class="filter">
                                <i class="fa fa-filter" onclick="filter('myPopup3')"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                            </button>
                        </form>

                        <div class="popupfilter">
                            <div class="popuptext" id="myPopup3">
                                <form action="" class="filter-plot">
                                    <label for="province">Province</label>
                                    <select name="province" id="province" onchange="updateDistricts()">
                                        <option value="กรุงเทพ">กรุงเทพ</option>
                                        <option value="จันทบุรี">จันทบุรี</option>
                                        <option value="ชุมพร">ชุมพร</option>
                                        <option value="ระยอง">ระยอง</option>
                                    </select>
                                    <label for="district">District</label>
                                    <select name="district" id="district">
                                        
                                    </select>
                                    <label for="joindate">Joined</label>
                                    <input type="date" name="joindate" id="joindate">
                                    <label for="harvestdate">Harvest date</label>
                                    <input type="date" name="harvestdate" id="harvestdate">
                    
                                    <button type="button" class="form-filter-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-farmer">
                        <div class="head-table">
                            <div class="head-container">
                                <div class="head1">ID</div>
                                <div class="head2">Date of problem</div>
                                <div class="head3">Description</div>
                                <div class="head4">Date of fix</div>
                                <div class="head5">Description</div>
                            </div>
                        </div>
                        <div class="content-table">
                            <div class="head1">E21548561</div>
                            <div class="head2">4/11/2566,14.08.42</div>
                            <div class="head3">มอเตอร์ขัดข้อง</div>
                            <div class="head4">4/11/2566,16.18.02</div>
                            <div class="head5">เปลี่ยนมอเตอร์</div>
                        </div>
                        <div class="content-table">
                            <div class="head1">E21548561</div>
                            <div class="head2">4/11/2566,14.08.42</div>
                            <div class="head3">มอเตอร์ขัดข้อง</div>
                            <div class="head4"><button class="repair-btn" id="showPopupBtn" style="min-width: 350px;">repair</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Information in each equipment-->


    <!--Start popupbox for report equipment-->
    <div id="popupOverlay" class="overlay">
                <div id="popupContent" class="popuprepair">
                    <span id="closePopupBtn"></span>
                    <div class="headpopup">
                        <h2>Repair</h2>
                        <iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon>
                    </div>         
                    <form action="submit" class="repair-form">
                        <label for="daterepair">Date of repair</label>
                        <input type="date" name="daterepair" id="daterepair">
                        <label for="dascrip">Description</label>
                        <input type="text" name="dascrip" id="dascrip">
                        <label for="deadrepair">Deadline of repair</label>
                        <input type="date" name="deadrepair" id="deadrepair">
                        <button class="repair-form-btn">Done</button>
                    </form>
                    
                </div>
        </div>
    <!--End popupbox for report equipment-->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var alarmForm = document.getElementById('alarmForm');
        var alarmList = document.getElementById('alarmList');
        var errorDiv = document.querySelector('.error');

        // Function to fetch and update alarm list
        function updateAlarmList() {
            fetch('fetch_alarms.php?id_plot=<?php echo $id_plot; ?>')
                .then(response => response.text())
                .then(data => {
                    alarmList.innerHTML = data;
                })
                .catch(error => {
                    errorDiv.innerHTML = "<div class='error'>Error: " + error.message + "</div>";
                });
        }

        alarmForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = new FormData(alarmForm); // Collect form data
            fetch('process_alarm.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Parse response as text
            .then(data => {
                // Update error messages
                errorDiv.innerHTML = data;
                // Update alarm list
                updateAlarmList();
            })
            .catch(error => {
                // Display error message if fetch request fails
                errorDiv.innerHTML = "<div class='error'>Error: " + error.message + "</div>";
            });
        });

        // Get all delete buttons
        // Inside the click event listener for delete buttons
            button.addEventListener('click', function() {
                // Get the id_alarm from the data attribute
                var idAlarm = this.getAttribute('data-alarm-id');
                console.log('Deleting alarm with ID:', idAlarm);

                // Send AJAX request to delete_alarm.php
                fetch('delete_alarm.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id_alarm: idAlarm })
                })
                .then(response => response.text())
                .then(data => {
                    // Handle response from delete_alarm.php
                    console.log('Delete alarm response:', data); // Log response for debugging
                    // Update the alarm list in real-time
                    updateAlarmList();
                })
                .catch(error => {
                    // Handle error if fetch request fails
                    console.error('Error:', error);
                });
            });
        });

    </script>

     
    <script>
   
        document.addEventListener("DOMContentLoaded", function() {
            // Function to display error message and fade out after a delay
            function displayErrorMessage(message) {
                console.log("Displaying error message:", message);
                var errorMessage = document.getElementById("errorMessage");
                errorMessage.textContent = message;
                errorMessage.classList.add("show");

                // Fade out the error message after 5 seconds
                setTimeout(function() {
                    errorMessage.classList.remove("show");
                }, 5000); // Adjust the delay (in milliseconds) as needed
            }
        });
    </script>



    
    <script src="scripts/data-alarm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/hamburger.js"></script> <!--Script for hamburgur responsive-->
    <script src="scripts/filter.js"></script> <!--Script for popupbox to describe unit in option-->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script> <!--Script for icon-->
    <script src="scripts/dropdown.js"></script> <!--Script for dropdown option in parameter-->
    <script src="scripts/changecontent.js"></script> <!--Script for change section-->
    <script src="scripts/havestChart.js"></script> <!--Script for analize havestchart in information section-->
    <script src="scripts/repairpopup.js"></script> <!--Script for popupbox for report equipment-->
    <script src="scripts/info.js"></script> <!--Script for change topic in information section-->
    <script src="scripts/notification.js"></script> <!--Script for Notifications menu-->
    <script src="scripts/progressbar.js"></script>
    <script src="scripts/popup.js"></script>

<?php include('./includes/footer.php') ?>