<?php
include("header.php");
include("dbcon.php");
include_once './auth_user.php';


?>
<h4 style="padding-left: 500px;"><b> Attdence Percentage<br></b></h3>
<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Percent</th>
    </tr>
    <?php
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);

    $totalClassNumber = "SELECT COUNT(`id`) as num FROM atten WHERE id=1";
    $classNumber = mysqli_query($connection, $totalClassNumber);
    $TotalClass = mysqli_fetch_assoc($classNumber);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                    $id = $row['id'];
                    $totalClassQuery = "SELECT SUM(`status`) as count FROM atten WHERE id = $id";
                    $totalClassResult = mysqli_query($connection, $totalClassQuery);
                    $rowTotalClass = mysqli_fetch_assoc($totalClassResult);
                    $attendancePercentage = number_format((float)($rowTotalClass['count'] / $TotalClass['num']) * 100, 2, '.', '');
                    echo$attendancePercentage;
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<button type="button" class="btn btn-secondary" onclick="window.location.href = 'home.php';">Back to home</button>

