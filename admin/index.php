<?php
session_start();
include "../connection.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link rel="stylesheet" href="login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="body-color">

    <div class="admin-page">
        <div class="heading">
            <h3>Admin Login</h3>
        </div>
        <div class="contents">

            <form action="" name="form1" method="post">

                <div class="container">
                    <div class="row">
                        <div class="col col-lg-11 mt-4 mx-auto">
                            <label for="exampleInputEmail1" class="form-label mb-2.5">Username</label>
                            <input type="text" class="form-control mb-2.5" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required name="username">
                        </div>
                        <div class="col col-lg-11 mx-auto">
                            <label for="exampleInputPassword1" class="form-label mb-2.5 mt-3">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-11 mx-auto">
                    <button class="btn btn-success mt-4" type="submit" name="submit1">SIGN IN</button>
                </div>

                <div class="alert alert-danger mb-5 mt-2 mx-auto" id="error" role="alert" style="display:none">
                    <p class="text-center"><strong>Error!</strong> Invalid Username or PassWord</p>
                </div>
            </form>

        </div>
    </div>

    <?php
    if (isset($_POST["submit1"])) {
        $username=mysqli_real_escape_string($link, $_POST["username"]);
        $password=mysqli_real_escape_string($link, $_POST["password"]);

        $res=mysqli_query($link, "select * from admin_login where username= '$username' && password= '$password'");
        $count=mysqli_num_rows($res);

        if($count==0)
        {
            ?>
            <script type="text/javascript">
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }
        else
        {
            $_SESSION["admin"]=$username;
            ?>
            <script type="text/javascript">
                window.location="exam_category.php"
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