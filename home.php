<?php

include("header.php");
include("dbcon.php");
include_once './auth_user.php';

if (isset($_POST['submit'])) {

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $status_array = $_POST['status'];

    // Loop through the status array and update the database for each student
    for ($i = 0; $i < count($status_array); $i++) {
        $student_id = $_POST['student_id'][$i];
        $student_name = $_POST['student_name'][$i];
        $status = $status_array[$i];

        // Prepare the SQL statement
        $query = "INSERT INTO atten (id, name, status) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);

        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, "iss", $student_id, $student_name, $status);

        if (mysqli_stmt_execute($stmt)) {
            // echo "<script>alert('Successfully Saved')</script>";
            header('location:home.php');
        } 
    }

    // Close the statement and connection
    mysqli_close($connection);
}

$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

?>
<div class="box1">
<h4 style="padding-left: 400px;"><b> Date : <?php echo date("l jS \of F Y ") . "<br>";?></b></h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD DATA</button>
    </div>
<form action="#" method="post">
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <select name="status[]">
                        <option value="0">Absent</option>
                        <option value="1">Present</option>
                    </select>
                </td>
                <input type="hidden" name="student_id[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="student_name[]" value="<?php echo $row['name']; ?>">
            </tr>
            <?php
        }
        ?>
    </table>
    <button type="submit" style="margin-left: 500px;" class="btn btn-success" name="submit">Save</button>
</form>
<button type="submit"  class="btn btn-info" name="submit" onclick="window.location.href = 'report.php';">Report Card</button>


<!-- Modal Form -->
<form action="#" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" name="id" class="form-control">
            </div>
            <div class="form-group">
                <label for="uniName">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_student" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<?php
if(isset($_POST['add_student'])){
    $id = $_POST['id'];
    $name  = $_POST['name'];

    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $chkID = mysqli_query($connection, $query);
    if(mysqli_num_rows($chkID)>0){
        echo "<script>alert('ID already exists')</script>";
    }
    else{
        $query = "insert into `students` (`id`, `name`) values('$id', '$name')";
            
        $result = mysqli_query($connection,$query);
        echo "<script>alert('Success')</script>";
    }
}
 ?>

<?php include("footer.php"); ?>
