<?php include("header.php");?>
<?php include("dbcon.php");?>

    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
        <h1 class="text-center">
            Registration to our portal
        </h1>
        <form method="POST" action="#">
        <div class="mb-3 ">
                <label for="fname" class="form-label">Name</label>
                <input type="text" class="form-control" name="fname" id="exampleInputText1">
            </div>
            <div class="mb-3 ">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="exampleInputText1">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">

            </div>
            <input type="hidden" name="action" value="add">
            <button type="submit" class="btn btn-primary" name="add_user">Sign UP</button>
        </form>
    </div>
<?php 
if(isset($_POST['add_student'])){
    $f_name = $_POST['fname'];
        $u_name = $_POST['uname'];
        $password = $_POST['password'];
        $passwordHash = $password;
        if ($f_name && $u_name && $passwordHash) {
            $query = "INSERT into `admin` (fname, uname, password) VALUES ('$f_name', '$u_name', '$passwordHash')";
            mysqli_query($connection, $query);
            echo "<script>alert('Teacher created')</script>";
        }
}

?>
<?php include("footer.php"); ?>