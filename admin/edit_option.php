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
$id1 = $_GET["id1"];

$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";

$res = mysqli_query($link, "select * from questions where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
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
    <p class="dash-heading">Edit Question</p>
    <hr class="line mt-1" style="color: black;">
    <form action="" name="form1" method="post">
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
                                    placeholder="Add Question" name="question" value="<?php echo $question; ?>">
                            </div>
                            <div class="col col-lg-12">
                                Option 1
                                <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                    placeholder="Add Option 1" name="opt1" value="<?php echo $opt1; ?>">
                            </div>
                            <div class="col col-lg-12">
                                Option 2
                                <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                    placeholder="Add Option 2" name="opt2" value="<?php echo $opt2; ?>">
                            </div>
                            <div class="col col-lg-12">
                                Option 3
                                <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                    placeholder="Add Option 3" name="opt3" value="<?php echo $opt3; ?>">
                            </div>
                            <div class="col col-lg-12">
                                Option 4
                                <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                    placeholder="Add Option 4" name="opt4" value="<?php echo $opt4; ?>">
                            </div>
                            <div class="col col-lg-12">
                                Answer
                                <input type="text" class="form-control mb-3 mt-2" aria-describedby="emailHelp"
                                    placeholder="Add Answer" name="answer" value="<?php echo $answer; ?>">
                            </div>

                            <div class="d-grid gap-2 col-4 mx-auto">
                                <button class="btn btn-success mt-4 " type="submit" name="submit1">Update
                                    Question</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST["submit1"])) {
    mysqli_query($link, "update questions set question='$_POST[question]', opt1='$_POST[opt1]', opt2='$_POST[opt2]', opt3='$_POST[opt3]', opt4='$_POST[opt4]', answer='$_POST[answer]' where id=$id") or die(mysqli_error($link));
    ?>

    <script type="text/javascript">
        window.location = "add_edit_questions.php?id=<?php echo $id1 ?>";
    </script>
    <?php
}
?>

<?php
include "footer.php";
?>