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

$id=$_GET["id"];
$res=mysqli_query($link, "select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_name=$row["category"];
    $exam_time=$row["exam_time_in_minutes"];
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
                <p class="dash-heading mx-2">Edit Exam</p>
                <hr class="line mt-1" style="color: black;">

                <form action="" name="form1" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="card border-dark mb-3">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="mt-1">Edit Exam Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col col-lg-12">
                                                    New Exam category
                                                    <input type="text" class="form-control mb-2.5 mt-2"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Add exam Category" name="examname" value="<?php echo $exam_name; ?>">
                                                </div>
                                                <div class="col col-lg-12 mt-4">
                                                    Exam Time in Minutes
                                                    <input type="text" class="form-control mb-2.5 mt-2"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Add exam Time in minutes" name="examtime" value="<?php echo $exam_time; ?>">
                                                </div>
                                                <div class="d-grid gap-2 col-4 mx-auto">
                                                    <button class="btn btn-success mt-4 " type="submit" name="submit1">Update
                                                        Exam</button>
                                                </div>
                                            </div>
                                        </div>
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
    mysqli_query($link, "update exam_category set category='$_POST[examname]', exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($link));

?>
<script type="text/javascript">
    alert("Exam edited successfully")
    window.location.href="exam_category.php";
</script>
<?php

 }
 ?>           

<?php
include "footer.php";
?>