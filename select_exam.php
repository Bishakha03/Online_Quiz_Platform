<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
?>

<?php
include "connection.php";
include "header.php";
?>


    <div class="container" style="height:400px">
        <div class="row">
            <div class="col col-lg-12">
                
                <?php
                $res=mysqli_query($link, "select * from exam_category");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" style="margin-top:10px; background-color:blue; coloe: white" onclick="set_exam_type_session(this.value)"> 
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    

<?php
include "footer.php";
?>



<script type="text/javascript">
    document.getElementById("select_exam").classList.add("active");
    function set_exam_type_session(exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                window.location="dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category="+ exam_category, true);
        xmlhttp.send(null);
    }
</script>

   