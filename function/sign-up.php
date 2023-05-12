<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bday = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require '../class/class_user.php';

    $classUser = new User();
    $resultUser=$classUser->signup($fname, $lname, $bday, $address, $email, $password);

    if($resultUser){
        header("location: ../pages/login-page.php");
    }
?>