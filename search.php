<?php
$main_css_file = "views/displayplot.css";
if(isset($_POST['submit-search'])) {
    $searchTerm = $_POST['searchField'];
    header("Location: displayplot.php?search=" . urlencode($searchTerm));
    exit();
}
?>
<form action="search.php" class="search" method="post" id="searchform">
    
    <input type="text" name="searchField" placeholder="Search">
    <button type="submit" name="submit-search" class="serach-button"><iconify-icon icon="material-symbols:search" class="icon-search"></iconify-icon></button>
</form>
