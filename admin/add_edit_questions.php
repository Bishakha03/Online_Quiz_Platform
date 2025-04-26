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

$id = $_GET["id"];
$exam_category = '';
$res = mysqli_query($link, "select * from exam_category where id = $id");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
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
    <p class="dash-heading">Add Question Inside <?php echo $exam_category ?></p>
    <hr class="line mt-1" style="color: black;">


    <form action="" name="form1" method="post">
        <div class="container">
            <div class="row">
                <div class="col col-lg-9">
                    <div class="card border-dark mb-3">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mt-1">Add New Questions</h5>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        Question
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Question" name="question">
                                    </div>
                                    <div class="col col-lg-12">
                                        Option 1
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Option 1" name="opt1">
                                    </div>
                                    <div class="col col-lg-12">
                                        Option 2
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Option 2" name="opt2">
                                    </div>
                                    <div class="col col-lg-12">
                                        Option 3
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Option 3" name="opt3">
                                    </div>
                                    <div class="col col-lg-12">
                                        Option 4
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Option 4" name="opt4">
                                    </div>
                                    <div class="col col-lg-12">
                                        Answer
                                        <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                            placeholder="Add Answer" name="answer">
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

            </div>
        </div>
    </form>

    <div class="col col-lg-12">
        <div class="card border-dark mb-3">
            <div class="card-header bg-dark text-white">
                <h5 class="mt-1">Added Questions</h5>
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Q No.</th>
                        <th scope="col">Question</th>
                        <th scope="col">Opt1</th>
                        <th scope="col">Opt2</th>
                        <th scope="col">Opt3</th>
                        <th scope="col">Opt4</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                

            <?php

            $res=mysqli_query($link, "select * from questions where category = '$exam_category' order by question_no asc");
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["question_no"]; echo "</td>";
                echo "<td>"; echo $row["question"]; echo "</td>";
                echo "<td>"; echo $row["opt1"]; echo "</td>";
                echo "<td>"; echo $row["opt2"]; echo "</td>";
                echo "<td>"; echo $row["opt3"]; echo "</td>";
                echo "<td>"; echo $row["opt4"]; echo "</td>";
                echo "<td>"; 
                ?>
                <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">
                                                        <button type="button" class="btn btn-primary">Edit</button>
                                                        </a>
                <?php
                echo "</td>";
                echo "<td>"; 
                ?>
                <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">
                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                        </a>
                <?php
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>

</div>



<?php
if (isset($_POST['submit1'])) {
    $count = 0;
    $res = mysqli_query($link, "select * from questions
                                 where category= '$exam_category' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {

    } else {
        while ($row = mysqli_fetch_array(($res))) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop' where id=$row[id]");
        }
    }
    $loop = $loop + 1;

    mysqli_query($link, "insert into questions values(NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error(($link)));

    ?>
    <script type="text/javascript">
        alert("Question added successfully");
        window.location.href = window.location.href;
    </script>
    <?php


}
?>

<?php
include "footer.php";
?>