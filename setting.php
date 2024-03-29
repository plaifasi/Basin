<?php  
session_start();
$main_css_file = "views/setting.css";
$navbar_css_file = "views/navbar.css";
include('condb.php');
include('./includes/header.php');
include('./includes/navbar.php'); 
?>

<!--Start head setting bar-->
<section class="menu-profile">
            <div class="menubar-profile-container">
                <div class="menubar-profile-box">
                    <div class="headsetting">Setting</div>
                    <div class="menubar">
                        <ul class="menu-equipment">
                            <li><a href="#" onclick="changepartsection('north-part', this)">ภาคเหนือ</a></li>
                            <li><a href="#" onclick="changepartsection('west-part', this)">ภาคตะวันตก</a></li>
                            <li><a href="#" onclick="changepartsection('central-part', this)">ภาคกลาง</a></li>
                            <li><a href="#" onclick="changepartsection('northeast-part', this)">ภาคตะวันออกเฉียงเหนือ</a></li>
                            <li><a href="#" onclick="changepartsection('east-part', this)">ภาคตะวันออก</a></li>
                            <li><a href="#" onclick="changepartsection('south-part', this)">ภาคใต้</a></li>
                            <li><button class="add-btn" onclick="showPopup()"><i class="fa-solid fa-plus" style="color: #226F54;"></i>add</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End head setting bar-->


        


        <!--Start popupbox for add part options-->
        <div class="overlay" id="popupOverlay">
            <div class="popup" id="step1"> <!--Popupbox for input parameter options-->
                <div class="head">
                    <div class="text">More part</div>
                    <button class="close" onclick="hidePopupAdd()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <span class="line"></span>
                
                <div class="head-info" style="display: flex; flex-direction: row; align-items: center;">
                    <p class="title">Setting for plot information</p>
                
                    <div class="test">        
                        <i class="fa-regular fa-circle-question" onclick="FunctionPop('mytest1')" style="margin-left: 5px; font-size: 10px; text-align: center; "></i></p>
                        <span class="testtext" id="mytest1">A Simple Popup!</span>
                    </div>
                </div>
                <form action="" class="add-part-form"> <!--Form for add new part-->
                    <div class="title-new-part">
                    <label for="name-part">Name new part</label>
                    <input type="text">
                    </div>
                    <label for="label-for-new-opt">Temperature</label>
                    <div class="new-value">
                        <label for="new-opt">New option</label>
                        <input type="text" name="" id="">
                        <label for="min">Min</label>
                        <input type="number" name="" id="">
                        <label for="max">Max</label>
                        <input type="number" name="" id="">
                    </div>
                    <label for="label-for-new-opt">Temperature leaf</label>
                    <div class="new-value">
                        <label for="new-opt">New option</label>
                        <input type="text" name="" id="">
                        <label for="min">Min</label>
                        <input type="number" name="" id="">
                        <label for="max">Max</label>
                        <input type="number" name="" id="">
                    </div>
                    <label for="label-for-new-opt">Humidity</label>
                    <div class="new-value">
                        <label for="new-opt">New option</label>
                        <input type="text" name="" id="">
                        <label for="min">Min</label>
                        <input type="number" name="" id="">
                        <label for="max">Max</label>
                        <input type="number" name="" id="">
                    </div>
                    <label for="label-for-new-opt">Humidity soil</label>
                    <div class="new-value">
                        <label for="new-opt">New option</label>
                        <input type="text" name="" id="">
                        <label for="min">Min</label>
                        <input type="number" name="" id="">
                        <label for="max">Max</label>
                        <input type="number" name="" id="">
                    </div>
                    <label for="label-for-new-opt">Vpd</label>
                    <div class="new-value">
                        <label for="new-opt">New option</label>
                        <input type="text" name="" id="">
                        <label for="min">Min</label>
                        <input type="number" name="" id="">
                        <label for="max">Max</label>
                        <input type="number" name="" id="">
                    </div>
                    <div class="new-part-btn">
                        <button type="button" class="cancel-btn" onclick="nextStep()">Continue</button>
                    </div>
                </form>
            </div>    
            <div class="popup" id="step2" style="display: none;"> <!--Popup for input Remote control-->
                <div class="head">
                    <div class="text">More part</div>
                    <button class="close" onclick="hidePopup()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <span class="line"></span>
                <div class="head-info" style="display: flex; flex-direction: row; align-items: center;">
                    <p class="title">Setting for plot information</p>
                
                    <div class="test">        
                        <i class="fa-regular fa-circle-question" onclick="FunctionPop('mytest2')" style="margin-left: 5px; font-size: 10px; text-align: center; "></i></p>
                        <span class="testtext" id="mytest2">A Simple Popup!</span>
                    </div>
                </div>
                <div class="content-remote">
                    <label for="">Water</label>
                    <input type="number" min="1">
                    <label for="">Fertilizer</label>
                    <input type="number" min="1">
                </div>
                <div class="new-part-btn">
                    <button class="save-btn" onclick="prevStep()">Previous</button>
                    <button class="cancel-btn" onclick="hidePopup()">Finish</button>
                </div>
            </div>
        </div>
        <!--End popupbox for add part options-->



        <!--Start each part of setting section-->
        <section id="north-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="west-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">50</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="central-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">50</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="northeast-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">50</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="east-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">50</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="south-part" class="info-control" style="display: none;">
            <div class="display">
                <div class="display-container">
                    <div class="box-display">
                        <div class="headinfo">
                            <div class="textinfo">Plot Information</div>
                            <button class="addopt-button" id="addButton_tempsur" style="display: none;" onclick="showAddOptionForm('tempsur')"><i class="fa-solid fa-plus" id="plus">add</i></button>
                        </div>  
                        <div class="box-info-part" id="before" style="display: flex; justify-content: space-evenly; padding-bottom: 2rem;">
                            <div class="box" style="display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="label-tempsur">Tempurature</div>
                            <div class="label-templeaf">Tempurature leaf</div>
                            <div class="label-humidity">Humidity</div>
                            <div class="label-humiditysoil">Humidity soil</div>
                            <div class="label-vpd">VPD</div>
                            </div>

                            <div class="content">
                            <div class="Vtempsur">
                                
                                <select name="tempsur" id="tempsur">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-tempsur">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-tempsur">0</div>
                                <a href="#" onclick="changepart('edit-tempsur')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vtempleaf">
                                
                                <select name="templeaf" id="templeaf">
                                    <option value="เย็น">เย็น</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="อุ่น">อุ่น</option>
                                    <option value="ร้อน">ร้อน</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-templeaf">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-templeaf">0</div>
                                <a href="#" onclick="changepart('edit-templeaf')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumidity">
                                
                                <select name="humidity" id="humidity">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humidity">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humidity">0</div>
                                <a href="#" onclick="changepart('edit-humidity')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vhumiditysoil">
                                
                                <select name="humiditysoil" id="humiditysoil">
                                    <option value="ชื้นมาก">ชื้นมาก</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ชื้นน้อย">ชื้นน้อย</option>
                                    <option value="แห้ง">แห้ง</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-humiditysoil">-18</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-humiditysoil">0</div>
                                <a href="#" onclick="changepart('edit-humiditysoil')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="Vvpd">
                                
                                <select name="vpd" id="vpd">
                                    <option value="น้อย">น้อย</option>
                                    <option value="เหมาะสม">เหมาะสม</option>
                                    <option value="มาก">มาก</option>
                                    <option value="ไม่เหมาะสม">ไม่เหมาะสม</option>
                                </select>
                                <div class="min">ต่ำสุด</div>
                                <div class="vmin-vpd">50</div>
                                <div class="max">สูงสุด</div>
                                <div class="vmax-vpd">0</div>
                                <a href="#" onclick="changepart('edit-vpd')"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-tempsur" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-templeaf" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humidity" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-humiditysoil" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>

                        <div class="box-info-part" id="edit-vpd" style="display: none; flex-direction: column; padding-bottom: 2rem; align-items: center;">
                            <div class="form-edit-box">
                                <form action="" class="form-edit">
                                    <label for="option">เย็น</label>
                                    <label for="min">ต่ำสุด</label>
                                    <input type="number">
                                    <label for="min">สูงสุด</label>
                                    <input type="number">
                                    <button class="edit-button" id="editButton_tempsur"  onclick="editOptionValues('tempsur')"><i class="fa-solid fa-pen"></i></i></button>
                                    <button class="delete-button" id="deleteButton_tempsur"  onclick="deleteOption('tempsur')"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                               
                                
                                <!-- Add this to your HTML -->
                                <div class="overlay" id="overlay">
                                    <div class="popup-box" id="popupBox">
                                        <div class="headform">
                                            <div class="texthead">New options</div>
                                            <div class="closepopup" onclick="closePopup()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                        </div>
                                        
                                        <form id="optionForm">
                                            
                                            <div class="inputpart" id="inputContainer">
                                                
                                                <label for="newOption">ตัวเลือก:</label>
                                                <input type="text" id="newOption" name="newOption" required>

                                                <label for="newMinValue">ต่ำสุด:</label>
                                                <input type="number" id="newMinValue" name="newMinValue" required>

                                                <label for="newMaxValue">สูงสุด</label>
                                                <input type="number" id="newMaxValue" name="newMaxValue" required>

                                                <button type="button" class="add-button" onclick="addInputField()"><i class="fa-solid fa-plus" style="color: #226F54;">add</i></button>

                                            </div>
                                            
                                            <div class="buttonpart">
                                                <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                                <button class="canceladd" type="button" onclick="hideAddOptionForm()">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                
                              
                            </div> 
                            <div class="button-box">
                                <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-display"> <!--Remote box-->
                            <div class="head-remote">Remote Control
                                <select name="alarmset" id="alarmset" onchange="checkOption(this)">
                                    <option value="">พืชเล็ก</option>
                                    <option value="">ฟื้นต้น</option>
                                    <option value="">สะสมอาหาร</option>
                                    <option value="">สร้างดอก</option>
                                    <pption value="">ขยายทรงผล</option>
                                    <option value="">สร้างคุณภาพเนื้อ</option>
                                    <option value="custom">+add</option>
                                    
                                </select>
                            </div>


                            <div class="overlay" id="overlayalarm">
                                <div class="popup-box" id="popupBox">
                                    <div class="headform">
                                        <div class="texthead">New options</div>
                                        <div class="closepopup" onclick="closePopupalarm()"><iconify-icon id="iconifyCloseBtn" icon="charm:cross" width="25" height="25"></iconify-icon></div>
                                    </div>
                                    
                                    <form id="optionForm">
                                        
                                        <div class="inputpart" id="inputContainer">
                                            
                                            <label for="newalarm">ตั้งเวลา:</label>
                                            <input type="time" name="newalarm" id="newalarm" required>

                                        </div>
                                        
                                        <div class="buttonpart">
                                            <button class="saveadd" type="button" onclick="addOptionWithValues('tempsur')">save</button>
                                            <button class="canceladd" type="button" onclick="hideAddOptionForm()">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                            
                            <div class="remote-container">
                                
                                <div class="remote-box">
                                    <form action="" class="remote-form">
                                        <a href="fertilizer.php">
                                            <div class="wrapper">
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
                                                </div>
                                                <div class="layout-remote">
                                                <div class="water-box">
                                                    <div class="head-remote-water">
                                                        <div class="head-water">
                                                            water
                                                        </div>
                                                    </div>
                                                    <div class="content-water">
                                                        <div class="input-water">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-water">
                                                                ลิตร/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pui-box">  
                                                    <div class="head-remote-pui">
                                                        
                                                        <div class="head-pui">
                                                            Fertilizer
                                                        </div>
                                                    </div>
                                                    <div class="content-pui">
                                                        <div class="input-pui">
                                                            <div class="value-remote-down">50</div>
                                                        </div>
                                                        <div class="more-content">
                                                            <div class="unit-pui">
                                                                กิโลกรัม/ต้น
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        
                                        
                                        
                                        <!--<div class="btn-form-remote">
                                            <button class="editbtn" id="editbtn" onclick="changepartremote('remote-box-edit')">Edit</a></button>
                                        </div>-->
                                        
                                    </form>

                                </div> 
                                
                                
                                <div class="remote-box" id="remote-box-edit" style="display: none;"> <!--Edit remote box-->
                                    <form action="" class="remote-form">
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
                                                    <div class="value-remote"><input type="time" name="" id="" placeholder="Enter a time"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layout-remote">
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
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
                                                    <div class="value-remote"><input type="number" placeholder="60"></div>
                                                </div>
                                                <div class="more-content">
                                                    <div class="icon-input-pui">
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                    <div class="unit-pui">
                                                        กิโลกรัม/ไร่
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="btn-form-remote-edit">
                                            <button class="saveButton" id="saveButton_tempsur"  onclick="saveEdit('tempsur')">Save</button>
                                            <button class="cancelButton" id="cancelButton_tempsur"  onclick="cancelEdit('tempsur')">Cancel</button>
                                        </div> 
                                    </form>
                        
                                </div>  

                            </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End each part of setting section-->
        
    </div>
</div>

    <script> 
                        //Function for popup more information about unit in parameter options
                        function FunctionPop(targetElement) {
                            console.log("FunctionPop called");
                            var popup = document.getElementById(targetElement);
                            if (popup) {
                                popup.classList.toggle("show");
                            }
                        }
                        //Function for popup add new part section
                        let currentStep = 1;

                        function showPopup() {
                            // Reset currentStep to 1 when showing the popup
                            currentStep = 1;

                            // Show the overlay and initial step
                            document.getElementById('popupOverlay').style.display = 'flex';
                            document.getElementById('step1').style.display = 'block';
                            document.getElementById('step2').style.display = 'none';
                        }

                        function nextStep() {
                            // Hide the current step and show the next step
                            document.getElementById(`step${currentStep}`).style.display = 'none';
                            currentStep++;
                            document.getElementById(`step${currentStep}`).style.display = 'block';
                        }

                        function prevStep() {
                            // Hide the current step and show the previous step
                            document.getElementById(`step${currentStep}`).style.display = 'none';
                            currentStep--;
                            document.getElementById(`step${currentStep}`).style.display = 'block';
                        }

                        function hidePopupAdd() {
                            // Hide the overlay and reset the current step
                            document.getElementById('popupOverlay').style.display = 'none';
                        }
                       
    </script>




    
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script> <!--Script for icon-->
    <script src="scripts/changepartsection.js"></script> <!--Script for change part section-->
    <script src="scripts/changepart.js"></script> <!--Script for Edit parameter options-->
    <script src="scripts/addoption.js"></script> <!--Script for add more parameter options-->
    <script src="scripts/hamburger.js"></script> <!--Script for hamburgur responsive-->
    <script src="scripts/filter.js"></script>
    <script src="scripts/addInputField.js"></script> 
    <script src="scripts/changepartremote.js"></script>
    <script src="scripts/notification.js"></script>


<?php include('./includes/footer.php') ?>