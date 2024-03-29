<?php
    date_default_timezone_set("Asia/Bangkok");

?>


<!--Start nav bar-->
<nav class="sticky-nav">
                        <div class="nav-con">
                            <div class="hamburger" >
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                            <div class="logo">
                                <a href="dashboard.php"><img class="icon-profile" src="src/iconbulk.png" alt="Italian Trulli"></a>
                            </div>
                            
                            <ul class="nav-menu">
                                <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link">หน้าควบคุม</a>
                                </li>
                                <li class="nav-item">
                                    <a href="plot.php" class="nav-link">แปลงปลูก</a>
                                </li>
                                <li class="nav-item">
                                    <a href="equipment.php" class="nav-link">อุปกรณ์</a>
                                </li>
                                   <a href="setting.php" class="nav-link">ตั้งค่า</a>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="notification()" >แจ้งเตือน</a>                           
                                </li>
                                
                            </ul>
                            <div class="profile" id="profile">
                                <a href="#" onclick="filter('mytest1')">PS</a>
                                <span class="testtext" id="mytest1">
                                    <button href="" class="logout">ออกจากระบบ</button>
                                </span>
                            </div>

                            <div class="overlaynoti" id="notiOverlay">
                                <div class="popupnoti" id="notificationPopup">
                                    <div class="noti-head">
                                        <div class="text">แจ้งเตือน</div>
                                        <div class="close" onclick="hidePopup()"><i class="fa-solid fa-xmark" style="color: #5D616D; transform: translateX(35%);"></i></div>
                                    </div>
                                    <div class="content">
                                        <div class="timestamp">วันนี้</div>
                                        <div class="noti-box">
                                            <div class="icon" ><i class="fa-solid fa-screwdriver-wrench" style="color:#fff; transform: translateY(50%);"></i></div>
                                            <div class="right-noti-box">
                                                <div class="text-content">คำเดือนการซ่อมแซมเครื่องมือ</div>
                                                <div class="timetell">23นาทีก่อน</div>
                                            </div>
                                        </div>
                                        <span class="space"></span>
                                        <?php if (isset($alarm_notifications)) : ?>
                                            <?php echo $alarm_notifications; ?>
                                        <?php else : ?>
                                            <div class="no-notifications">ไม่มีการแจ้งเตือน</div>
                                        <?php endif; ?>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                </nav>
                <!--End nav bar-->