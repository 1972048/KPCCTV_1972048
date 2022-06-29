<?php
session_start();
include_once 'controller/VideoController.php';
if(!isset($_SESSION['my_session'])){
    $_SESSION['my_session'] = false;
  }
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-database.js"></script>

    <script src="js/index.js"></script>
    <script src="js/ApiService.js"></script>
    <script src="js/database.js"></script>
    <link rel="stylesheet" href="stylesa.css">
</head>
<body>
<?php
if($_SESSION['my_session']){
?>
<div class="navbar">
  <a href="?mn=home">Home</a>
  <a href="?mn=logout">Log Out</a>
</div>
<?php
$menu = filter_input(INPUT_GET,"mn");
switch($menu){
    case "home":
        $videoController=new VideoController();
        $videoController->index();
        break;
    case "up":
        $videoController=new VideoController();
        $videoController->update();
        break;
    case "logout":
        $videoController=new VideoController();
        $videoController->logout();
        break;
    default :
        $videoController=new VideoController();
        $videoController->index();
}
?>
</body>
<?php 
}else{
    include_once 'pages/login_page.php';
}
?>
</html>