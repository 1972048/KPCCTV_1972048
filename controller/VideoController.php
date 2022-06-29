<?php

class VideoController{

    public function index(){
        include_once 'pages/adminhome.php';
    }

    public function update(){
        include_once 'pages/update.php';
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location:indexadmin.php');
    }
}
?>