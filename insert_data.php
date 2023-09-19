<?php
include 'dbcon.php';
include_once './auth_user.php';

if(isset($_POST['add_student'])){
    $id = $_POST['id'];
    $name  = $_POST['name'];

    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $chkID = mysqli_query($connection, $query);
    if(mysqli_num_rows($cros_chk_uni_info)>0){
        echo "<script>alert('ID already exists')</script>";
    }
    else{
        $query = "insert into `students` (`id`, `name`) values('$id', '$name')";
            
        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        else{
            header('location:home.php');
        }
    }
}
 ?>