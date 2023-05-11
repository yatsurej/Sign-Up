<?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require '../class/class_user.php';

        $classUser = new User();
        $resultUser=$classUser->login($email, $password);

        if($resultUser){
            header("location: ../pages/userpage.php");
        }
        else{
            echo "Error";
        }
    } 
?>