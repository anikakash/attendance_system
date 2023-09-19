<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Attendance Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>


</head>
<body>
<div class="topbar sticky-top">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="./home.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <h1><p style="color: blue;">Attendance </p> <p style="color: red;">Management</p></h1>
                </a>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-primary" onclick="window.location.href = 'registration.php';">New Teacher</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = 'logout.php';" >Logout</button>
                </div>
            </header>
        </div>
</div>
            <!-- <h1 id="main_title">CRUD Application IN PHP</h1> -->
            <div class="container">
