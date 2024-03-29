<?php  
session_start();
$main_css_file = "views/displayplot.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');
include('./includes/navbar.php'); 


?>


 <!--Start remote box in above page-->
 <section class="remote">
        <div class="box-remote">
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <p>Water compleate</p>
                </div>
            </div>
            <div class="remote-container">
                <div class="head-water">Remote Control</div>
                <div class="remote-box">
                    <form action="" class="remote-form">
                        <div class="water-box">
                            <div class="head-remote-water">
                                <div class="icon-water">
                                    <iconify-icon icon="fa-solid:water"></iconify-icon>
                                </div>
                                <div class="head-water">
                                    water
                                </div>
                            </div>
                            <div class="content-water">
                                <div class="input-water">
                                    <input type="number" placeholder="50" min="1">
                                </div>
                                <div class="more-content">
                                    <div class="icon-input-water">
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="unit-water">
                                        ลิตร/ไร่
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pui-box">  
                            <div class="head-remote-pui">
                                <div class="icon-pui">
                                    <iconify-icon icon="icon-park-outline:leaves"></iconify-icon>
                                </div>
                                <div class="head-pui">
                                    Fertilizer
                                </div>
                            </div>
                            <div class="content-pui">
                                <div class="input-pui">
                                    <input type="number" placeholder="50" min="1">
                                </div>
                                <div class="more-content">
                                    <div class="icon-input-pui">
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="unit-pui">
                                        ลิตร/ไร่
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
    </section>
    <!--End remote box in above page-->

<!--Start table for farmer list-->
<section class="display">
    <div class="display">
        <div class="display-container">
            <div class="box-display">
                <div class="search-box">
                    <?php include('search.php'); ?>
                    <div class="popup">
                        <button type="button" class="filter">
                            <i class="fa fa-filter" onclick="myFunction()" style="transform: translateX(-500%); color: #226D6F; font-size: 20px; "></i>
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
                <?php include('search_results.php'); ?>
            </div>
        </div>
    </div>
</section>
<!--End table for farmer list-->

<script>
    document.querySelector('.form-filter-btn').addEventListener('click', function() {
        // Get filter parameters
        var province = document.getElementById('province').value;
        var district = document.getElementById('district').value;
        var joindate = document.getElementById('joindate').value;
        var harvestdate = document.getElementById('harvestdate').value;

        // Construct the URL with filter parameters
        var url = 'filter_results.php?province=' + province + '&district=' + district + '&joindate=' + joindate + '&harvestdate=' + harvestdate;

        // Redirect to filter_results.php with filter parameters
        window.location.href = url;
    });
</script>

    <script src="scripts/filter.js"></script>
    <script src="scripts/hamburger.js"></script> <!--Script for hamburgur responsive-->
    <script src="scripts/updateDistricts.js"></script> <!--Script for Update district follw how user selected province-->
    <script src="scripts/notification.js"></script> <!--Script for Notifications menu-->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script> <!--Script for icon-->
<?php include('./includes/footer.php'); 
?>
