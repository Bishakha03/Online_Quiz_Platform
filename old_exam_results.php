<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location.href="login.php";
    </script>
    <?php
}
?>

<div class="container">
    <div class="card col-lg-10 mx-auto">
        <div class="card-body " style="height:400px">
        <center>
            <h2 class="mb-4">Old Exam Results</h2>
        </center>

        <?php

        $count=0;
        $res=mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc");
        $count=mysqli_num_rows($res);

        if($count==0)
        {
            ?>
            <center>
                <h3>No Results Found</h3>
            </center>
            <?php
        }
        else
        {
            echo "<table class='table-bordered mx-auto'>";
            echo "<tr>";
            echo "<th class='px-3'>"; echo "username"; echo "</th>";
            echo "<th class='px-3'>"; echo "exam type"; echo "</th>";
            echo "<th class='px-3'>"; echo "total question"; echo "</th>";
            echo "<th class='px-3'>"; echo "correct answer"; echo "</th>";
            echo "<th class='px-3'>"; echo "wrong answer"; echo "</th>";
            echo "<th class='px-3'>"; echo "exam time"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td class='px-3'>"; echo $row["username"]; echo "</td>";
                echo "<td class='px-3'>"; echo $row["exam_type"]; echo "</td>";
                echo "<td class='px-3'>"; echo $row["total_question"]; echo "</td>";
                echo "<td class='px-3'>"; echo $row["correct_answer"]; echo "</td>";
                echo "<th class='px-3'>"; echo $row["wrong_answer"]; echo "</td>";
                echo "<td class='px-3'>"; echo $row["exam_time"]; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

        }

        ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("old_exam_results").classList.add("active");
</script>

<?php
include "footer.php";
?>