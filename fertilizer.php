<?php  
session_start();
$main_css_file = "views/fertilizerstyles.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');
include('./includes/navbar.php'); 
?>

<!--Start remote box in above page-->
<section class="remote">
        <div class="box-remote">
            <div class="alarm-box">
                <div class="head-remote-alarm">
                    <div class="icon-alarm">
                        <iconify-icon icon="solar:alarm-outline"></iconify-icon>
                    </div>
                    <div class="head-alarm">
                        Alarm
                    </div>
                </div>
                <div class="content-alarm">
                    <div class="input-alarm">
                        <div class="value-remote">06 : 00</div>
                    </div>
                </div>
                <div class="menubar">
                    <ul class="menu-equipment">
                        <li><a href="#" onclick="changepartwaterpui('water-part', this)">น้ำ</a></li>
                        <li><a href="#" onclick="changepartwaterpui('soil-part', this)">ดิน</a></li>
                   </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End remote box in above page-->

    <section id="water-part" class="info-control" >
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="head">
                        <label for="stage">ช่วงของต้นไม้ในแปลง</label>
                        <select name="stagetree" id="stagetree">
                            <option value="small">ต้นเล็ก</option>
                            <option value="recovery">ฟื้นต้น</option>
                            <option value="accumulate">สะสมอาหาร</option>
                            <option value="blooming">สร้างดอก</option>
                            <option value="enlargement">ขยายทรงผล</option>
                            <option value="build">สร้างคุณภาพเนื้อ</option>
                        </select>
                    </div>
                    <div class="content">
                        <div class="box-content">
                            <div class="type">ปุ๋ย</div>
                            <div class="name-pui">มหาธาตุ1</div>
                            <div class="component">
                                <div class="model-pui">แคลเซียม <div class="value-unit-model">14</div><div class="unit-model">มิลลิลิตร</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

    
    <section id="soil-part" class="info-control" style="display: none;">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                        <div class="head">
                            <label for="stage">ช่วงของต้นไม้ในแปลง</label>
                            <select name="stagetree" id="stagetree">
                                <option value="small">ต้นเล็ก</option>
                                <option value="recovery">ฟื้นต้น</option>
                                <option value="accumulate">สะสมอาหาร</option>
                                <option value="blooming">สร้างดอก</option>
                                <option value="enlargement">ขยายทรงผล</option>
                                <option value="build">สร้างคุณภาพเนื้อ</option>
                            </select>
                        </div>
                        <div class="content">
                            <div class="box-content">
                                <div class="type">ปุ๋ย</div>
                                <div class="name-pui">จุลธาตุ1</div>
                                <div class="component">
                                    <div class="model-pui">โบรอน<div class="value-unit-model">14</div><div class="unit-model">มิลลิลิตร</div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>



    


    <script src="scripts/hamburger.js"></script> <!--Script for hamburgur responsive-->
    <script src="scripts/notification.js"></script> <!--Script for Notifications menu-->
    <script src="scripts/filter.js"></script> <!--Script for popupbox to กescribe unit in option-->
    <script src="scripts/hashtag.js"></script>


<?php include('./includes/footer.php') ?>