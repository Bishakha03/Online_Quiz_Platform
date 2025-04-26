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
                <p class="dash-heading mx-2">Candidate Exam Results</p>
                <hr class="line mt-1" style="color: black;">


<div class="col col-lg-10 right-part">
    <div class="container">
        <div class="col-lg-12 mx-auto mt-1">
            <div class="body" style="height:400px">
                <center>
                    <h3 class="mb-4">Candidate's Results</h3>
                </center>

                <?php

                $count = 0;
                $res = mysqli_query($link, "select * from exam_results order by correct_answer desc");
                $count = mysqli_num_rows($res);

                if ($count == 0) {
                    ?>
                    <center>
                        <h3>No Results Found</h3>
                    </center>
                    <?php
                } else {
                    echo "<table class='table-bordered mx-auto'>";
                    echo "<tr>";
                    echo "<th class='px-3'>";
                    echo "username";
                    echo "</th>";
                    echo "<th class='px-3'>";
                    echo "exam type";
                    echo "</th>";
                    echo "<th class='px-3'>";
                    echo "total question";
                    echo "</th>";
                    echo "<th class='px-3'>";
                    echo "correct answer";
                    echo "</th>";
                    echo "<th class='px-3'>";
                    echo "wrong answer";
                    echo "</th>";
                    echo "<th class='px-3'>";
                    echo "exam time";
                    echo "</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td class='px-3'>";
                        echo $row["username"];
                        echo "</td>";
                        echo "<td class='px-3'>";
                        echo $row["exam_type"];
                        echo "</td>";
                        echo "<td class='px-3'>";
                        echo $row["total_question"];
                        echo "</td>";
                        echo "<td class='px-3'>";
                        echo $row["correct_answer"];
                        echo "</td>";
                        echo "<td class='px-3'>";
                        echo $row["wrong_answer"];
                        echo "</td>";
                        echo "<td class='px-3'>";
                        echo $row["exam_time"];
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                }

                ?>

            </div>
        </div>
    </div>
</div> 
