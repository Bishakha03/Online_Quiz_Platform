<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="login_style.css">
</head>

<body style="background-color: rgba(34, 33, 33, 0.884);;">


    <div class="login" style="background-color: rgb(255, 255, 255);">

        <div class="heading">
            <h2>Login Form</h2>
        </div>
        <form action="" name="form1" method="post">
            <div class="contents">
                <div class="mb-3">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="username" name="username">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 buttons">
                <button class="btn btn-primary mt-4" type="submit" name="login">Login</button>
                <a class="btn btn-primary mt-2" type="submit" href="register.php">Register</a>
            </div>

            <div class="alert alert-danger mt-4" style="display:none" id="failure">
                <strong>Doesnot Match</strong> Invalid Username or Password
            </div>

        </form>

    </div>


    <?php
    if (isset($_POST["login"])) {
        $count = 0;
        $res = mysqli_query($link, "select * from registration where username='$_POST[username]' && password='$_POST[password]'");
        $count = mysqli_num_rows($res);

        if ($count == 0) {
            ?>

            <script type="text/javascript">
                document.getElementById("failure").style.display = "block";
            </script>

            <?php
        } else {

            $_SESSION["username"]=$_POST["username"];

            ?>
            <script type="text/javascript">
                window.location = "select_exam.php";
            </script>
            <?php
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>