<?php
      $con= mysqli_connect("localhost","root","","basin") or die("Error: " . mysqli_error($con));
      mysqli_query($con, "SET NAMES 'utf8' ");
      error_reporting( error_reporting() & ~E_NOTICE );
      date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>select by.devtai.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($con, $sql_provinces);
?>

<div class="container">
  <h2>ข้อมูลส่วนตัว</h2>
  <div class="box-container">
    
    <form class="information-farmer">
    <div class="form-group">
        <div class="account">
            <div class="account-label">บัญชี</div>
            <div class="account-info">
                <label for="name">ชื่อ-นามสกุล</label>
                <div class="name-box">
                    <input type="text" name="name" id="firstname" class="form-control">
                    <input type="text" name="name" id="lastname" class="form-control">
                </div>
                <label for="email">อีเมลล์</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="tell">เบอร์โทรศัพท์</label>
                <input type="tel" id="phone" name="phone" pattern="[+]{1}[0-9]{11,14}" class="form-control" required>
                <div class="bron-head">
                    <label for="gender" id="gender">เพศ</label>
                    <label for="birthdate">วันเกิด</label>
                </div>
                <div class="bron">
                    <select name="gender" id="gender" class="form-control">
                        <option value="" selected disabled>-กรุณาเลือกเพศ-</option>
                        <option value="male">ผู้ชาย</option>
                        <option value="female">ผู้หญิง</option>
                    </select>
                    <input type="date" name="birthdate" id="birthdate" class="form-control">
                </div>  
            </div>
        </div>

        <div class="address">
            <div class="address-label">ที่อยู่เกษตรกร</div>
            <div class="address-info">
                <label for="address">ที่อยู่</label>
                <input type="text" name="address" id="address1" class="form-control">
                <label for="sel1">จังหวัด:</label>
                <select class="form-control" name="Ref_prov_id" id="provinces1">
                    <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                    <?php foreach ($query as $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                    <?php } ?>
                </select>
                <br>

                <label for="sel1">อำเภอ:</label>
                <select class="form-control" name="Ref_dist_id" id="amphures1">
                </select>
                <br>

                <label for="sel1">ตำบล:</label>
                <select class="form-control" name="Ref_subdist_id" id="districts1">
                </select>
                <br>

                <label for="sel1">รหัสไปรษณีย์:</label>
                <input type="text" name="zip_code" id="zip_code1" class="form-control">
                
            </div>
        </div>

        <div class="addressplot">
            <div class="addressplot-label">ที่อยู่แปลงเกษตร</div>
            <div class="addressplot-info">
                <label for="address">ที่อยู่1</label>
                <input type="text" name="address" id="address2" class="form-control">
                <label for="sel1">จังหวัด:</label>
                <select class="form-control" name="Ref_prov_id" id="provinces2">
                    <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                    <?php foreach ($query as $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                    <?php } ?>
                </select>
                <br>

                <label for="sel1">อำเภอ:</label>
                <select class="form-control" name="Ref_dist_id" id="amphures2">
                </select>
                <br>

                <label for="sel1">ตำบล:</label>
                <select class="form-control" name="Ref_subdist_id" id="districts2">
                </select>
                <br>

                <label for="sel1">รหัสไปรษณีย์:</label>
                <input type="text" name="zip_code" id="zip_code2" class="form-control">
                
                <label for="startplotdate">วันที่เริ่มปลูก</label>
                <input type="date" name="startplotdate" id="startplotdate2"  class="form-control">

                <label for="size">ขนาดแปลงปลูก</label>
                <input type="number" name="size" min="1" class="form-control">

                <label for="type">พันธุ์ทุเรียน</label>
                <select name="type" id="type2" class="form-control">
                    <option value="" selected disabled>-กรุณาเลือกพันธุ์ทุเรียน-</option>
                    <option value="p01">ก้านยาว</option>
                    <option value="p02">หมอนทอง</option>
                    <option value="p03">ชะนี</option>
                </select>
            </div>
        </div>
       
        <br>

            <a href="#"> <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button></a>
        </div>
    </form>




  </div>
</div>


</body>
</html>

<?php include('script.php');?>



