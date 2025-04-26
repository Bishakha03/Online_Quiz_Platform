<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demo_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Admin Panel</title>
</head>

<body>

    <div class="conatiner main-body">
        <div class="row">
            <div class="col col-lg-2 left-part px-5 ">


                <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
                    <div class="container">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active fs-4 text-center" aria-current="page" href="#">Admin Panel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <hr class="line mt-1">

                

                <a href="exam_category.php" class="content"><p class="text-center">Add & Edit Exam</p></a>

                <a href="add_edit_exam_questions.php" class="content"><p class="text-center">Add & Edit Questions</p></a>

                <a href="old_exam_results_admin.php" class="content"><p class="text-center">Candidate's Results</p></a>
     
                <a href="logout.php" class="content"><p class="text-center">Logout</p></a>



            </div>
