<?php
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>

    <script type="text/javascript">
        window.location="index.php";
    </script>

    <?php
}
?>
            <div class="col col-lg-10 right-part">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col col-lg-11"></div>
                        <div class="col col-lg-1">
                            <nav aria-label="breadcrumb mt-2">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">User</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <hr class="line mt-1" style="color: black;">
                <p class="dash-heading mx-2">Add Exam</p>
                <hr class="line mt-1" style="color: black;">

                <form action="" name="form1" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="card border-dark mb-3">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="mt-1">Add Exam Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col col-lg-12">
                                                    New Exam category
                                                    <input type="text" class="form-control mb-2.5 mt-2"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Add exam Category" name="examname">
                                                </div>
                                                <div class="col col-lg-12 mt-4">
                                                    Exam Time in Minutes
                                                    <input type="text" class="form-control mb-2.5 mt-2"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Add exam Time in minutes" name="examtime">
                                                </div>
                                                <div class="d-grid gap-2 col-4 mx-auto">
                                                    <button class="btn btn-success mt-4 " type="submit" name="submit1">Add
                                                        Exam</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6">
                                <div class="card border-dark mb-3">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="mt-1">Exam Categories</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sl. No.</th>
                                                    <th scope="col">Exam Name</th>
                                                    <th scope="col">Exam time</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $count=1;
                                            $res=mysqli_query($link, "select * from exam_category");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                            ?>
                                                <tr>
                                                    <td scope="row"><?php echo $count; ?></td>
                                                    <td><?php echo $row["category"] ?></td>
                                                    <td><?php echo $row["exam_time_in_minutes"] ?></td>
                                                    <td>
                                                        <a href="edit_exam.php?id=<?php echo $row["id"]; ?>">
                                                        <button type="button" class="btn btn-primary">Edit</button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="delete.php?id=<?php echo $row["id"]; ?>">
                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

 <?php
 if(isset($_POST["submit1"]))
 {
    mysqli_query($link, "insert into exam_category values(NULL, '$_POST[examname]', '$_POST[examtime]')") or die(mysqli_error($link));

?>
<script type="text/javascript">
    alert("Exam added successfully")
    window.location.href=window.location.href
</script>
<?php

 }
 ?>           

<?php
include "footer.php";
?>