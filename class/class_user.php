<?php
    require '../db-conn.php';
    if (!class_exists('User')){
        class User {
            // sign up function
            public function signup($fname, $lname, $bday, $address, $email, $password){
                $db = mysqli_connect('sql106.epizy.com', 'epiz_34189503', 'J01E5JIVt4bmK4O', 'epiz_34189503_sign_up'); //db from infinityfree
                $query = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) { // checks if email is taken
                    echo "<script>alert('Email is already taken');window.location.href='../pages/sign-up-page.php';</script>"; 
                } else {
                    $db = mysqli_connect('sql106.epizy.com', 'epiz_34189503', 'J01E5JIVt4bmK4O', 'epiz_34189503_sign_up');
                    $query = "INSERT INTO user(fname, lname, bday, address, email, password) 
                    VALUES ('$fname', '$lname', '$bday', '$address', '$email', '$password')";
                    if ($db->query($query)) {
                        echo "Sign Up Successful";
                        return $db;
                    } else {
                        echo $db->error;
                    }
                }
            }
            // login function
            public function login($email, $password){
                $db = mysqli_connect('sql106.epizy.com', 'epiz_34189503', 'J01E5JIVt4bmK4O', 'epiz_34189503_sign_up'); //db from infinityfree
                $query = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) == 0) { // checks if login is valid
                    echo "<script>alert('Invalid login details');window.location.href='../pages/login-page.php';</script>";
                } else {
                    $db = mysqli_connect('sql106.epizy.com', 'epiz_34189503', 'J01E5JIVt4bmK4O', 'epiz_34189503_sign_up');
                    $query = "SELECT email, password FROM user WHERE email = '$email' AND password = '$password'";
                    
                    if ($db->query($query)) {
                        echo "Login Successful";
                        return $db;
                    } else {
                        echo $db->error;
                    }
                }
            }
        }
    }
?>