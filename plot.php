<?php  
session_start();
$main_css_file = "views/equipment.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');
include('./includes/navbar.php'); 
?>

<!--Start table equipment in farmer list-->
<section id="equipment-section" class="info-control">
        <div class="display">
            <div class="display-container">
                <div class="box-display">
                    <div class="search-box">
                        <form action="" class="search">
                            <iconify-icon icon="gg:search" class="icon-search"></iconify-icon><input type="text"  placeholder="search">
                            
                        </form>
                        <div class="popup">
                            <button type="button" class="filter">
                                <i class="fa fa-filter" onclick="myFunction()"  style="transform: translateX(-300%); color: #226D6F; font-size: 20px; "></i>
                            </button>
                        <div class="popuptext" id="myPopup">
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
                    <div class="bage"></div>
                    <div class="table-responsive custom-table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">หมาย</th>
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
                                    
                                </tbody>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div class="notification">
        <label for=""></label>
        <input type="button" name="buttonnoti" value="">
    </div>


    <div class="geogomaltry">
        desaster
    </div>


    <!--End table equipment in farmer list-->

    <script src="scripts/hamburger.js"></script> <!--Script for hamburgur responsive-->
    <script src="scripts/notification.js"></script><!--Script for Notifications menu-->
    <script src="scripts/filter.js"></script>


<?php include('./includes/footer.php') ?>


