<script type="text/javascript">
  // For Address 1
  $('#provinces1').change(function() {
    var id_province = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures1').html(data); 
          $('#districts1').html(' '); 
          $('#districts1').val(' ');  
          $('#zip_code1').val(' '); 
      }
    });
  });

  $('#amphures1').change(function() {
    var id_amphures = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts1').html(data);  
      }
    });
  });

   $('#districts1').change(function() {
    var id_districts= $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code1').val(data)
      }
    });
  
  });

  // For Address 2
  $('#provinces2').change(function() {
    var id_province = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures2').html(data); 
          $('#districts2').html(' '); 
          $('#districts2').val(' ');  
          $('#zip_code2').val(' '); 
      }
    });
  });

  $('#amphures2').change(function() {
    var id_amphures = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts2').html(data);  
      }
    });
  });

   $('#districts2').change(function() {
    var id_districts= $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code2').val(data)
      }
    });
  
  });
</script>
