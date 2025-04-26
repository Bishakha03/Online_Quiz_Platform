<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="register_style.css">
</head>

<body>

    <div class="register">

        <div class="heading">
            <h2>Login Form</h2>
        </div>
        <form action="" name="form1" method="post">
            <div class="contents">
                <div class="mb-1">
                    <label for="staticEmail" class="col-sm-2 col-form-label">FirstName</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="FirstName"
                            name="firstname">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Lastname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" placeholder="Lastname"
                            name="lastname">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label">UserName</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" placeholder="UserName"
                            name="username">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password"
                            name="password">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputPassword" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contacts</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="inputPassword" placeholder="Contacts" name="contact">
                    </div>
                </div>
            </div>


            <div class="d-grid gap-2 button mt-0">
                <button class="btn btn-primary mt-2" type="submit" name="submit1">Register</button>
            </div>

            <div class="alert alert-success mt-4" style="display:none" id="success">
                <strong>Success!</strong>Account Registration Successful
            </div>

            <div class="alert alert-danger mt-4" style="display:none" id="failure">
                <strong>Already Exist!</strong>This Username is Already Registered
            </div>

        </form>

    </div>


    <?php
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "select * from registration where username = '$_POST[username]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);

        if ($count > 0) {

            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display = "none";
                document.getElementById("failure").style.display = "block";
            </script>
            <?php

        } else {
            mysqli_query($link, "insert into registration values(NULL,'$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]')");

            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display = "block";
                document.getElementById("failure").style.display = "none";
                window.location.href="index.php";
            </script>
            <?php
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous">
    </script>
</body>

</html>