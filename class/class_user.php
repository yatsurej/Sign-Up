<?php
    require '../db-conn.php';
    if (!class_exists('User')){
        class User {
            // sign up function
            public function signup($fname, $lname, $bday, $address, $email, $password){
                $db = mysqli_connect('localhost', 'root', '', 'sign-up');
                $query = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) { // checks if email is taken
                    echo "This email address is already taken.";
                } else {
                    $db = mysqli_connect('localhost', 'root', '', 'sign-up');
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
                $db = mysqli_connect('localhost', 'root', '', 'sign-up');
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
?>