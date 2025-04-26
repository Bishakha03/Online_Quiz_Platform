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
    <p class="dash-heading">Select exam categories for Add and edit Question</p>
    <hr class="line mt-1" style="color: black;">
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
                        <th scope="col">Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $res = mysqli_query($link, "select * from exam_category");
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            </th>
                            <td><?php echo $row["category"] ?></td>
                            <td><?php echo $row["exam_time_in_minutes"] ?></td>
                            <td>
                                <a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>">
                                    <button type="button" class="btn btn-primary">Edit</button>
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






<?php
include "footer.php";
?>