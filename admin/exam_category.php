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
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add exam</h1>
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
                                        <div class="card-header"><strong>Add  exam</strong><small> Form</small></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">New exam category</label><input type="text" name="examname" placeholder="add exam category" class="form-control"></div>
                                                <div class="form-group"><label for="vat" class=" form-control-label">exam time in minutes</label><input type="text" name="examtime" placeholder="add exam time in minutes" class="form-control"></div>
                                                <div class="form-group">
                                                  <input type="submit" name="submit1" value="Add exam" class="btn btn-success">
                                                </div>
                            </div>

                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">exam categories</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">exam name</th>
                                            <th scope="col">exam time</th>
                                            <th scope="col">edit</th>
                                            <th scope="col">delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                       $count=0;
                                      $res=mysqli_query($link,"select * from exam_category");
                                      while($row=mysqli_fetch_array($res))
                                      {
                                          $count=$count+1;
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                            <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">delete</a></td>
                                        </tr>
                                        <?php
                                      }
                                       ?>


                                    </tbody>
                                </table>
                            </div>
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
  mysqli_query($link,"insert into exam_category values (NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));
  ?>
<script type="text/javascript">
  alert("exam added successfully");
  window.location.href=window.location.href;
</script>
  <?php
}
 ?>




<?php
include "footer.php";
 ?>
