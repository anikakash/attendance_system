<?php
// session_start();
include_once "dbcon.php";
// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $f_name = $_POST['fname'];
        $u_name = $_POST['uname'];
        $password = $_POST['password'];
        $passwordHash = $password;
        if ($f_name && $u_name && $passwordHash) {
            $query = "INSERT into `admin` (fname, uname, password) VALUES ('$f_name', '$u_name', '$passwordHash')";
            mysqli_query($connection, $query);
            include_once './home.php';
        }
    

?>