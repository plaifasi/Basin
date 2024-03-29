<?php  
session_start();
$main_css_file = "views/login.css";
include('condb.php');
include('./includes/header.php');
?>

<div class="login-page">
  <div class="form">
    <form class="login-form">
        <img src="src/iconbulk.png" alt="">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
    </form>
  </div>
</div>

<?php include('./includes/footer.php'); ?>