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
$res=mysqli_query($link,"select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
  $exam_name=$row["category"];
  $exam_time=$row["exam_time_in_minutes"];
}
 ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit exam</h1>
                    </div>
                </div>
            </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          <form name="form1" action="" method="post">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit  exam</strong><small> Form</small></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">New exam category</label><input type="text" name="examname" placeholder="add exam category" class="form-control" value="<?php echo $exam_name; ?>"></div>
                                                <div class="form-group"><label for="vat" class=" form-control-label">exam time in minutes</label><input type="text" name="examtime" placeholder="add exam time in minutes" class="form-control" value="<?php echo $exam_time; ?>"></div>
                                                <div class="form-group">
                                                  <input type="submit" name="submit1" value="Update exam" class="btn btn-success">
                                                </div>
                            </div>

                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                        </div>
                      </form>
                    </div>


                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->

<?php
if(isset($_POST["submit1"]))
{
  mysqli_query($link,"update exam_category set category='$_POST[examname]',exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($link));
  ?>
<script type="text/javascript">
  window.location="exam_category.php";
</script>
  <?php
}
 ?>




<?php
include "footer.php";
 ?>
