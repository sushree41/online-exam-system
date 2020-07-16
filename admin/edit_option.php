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
 $id =$_GET["id"];
 $id1 =$_GET["id1"];

 $questions="";
 $opt1="";
 $opt2="";
 $opt3="";
 $opt4="";
 $answer="";



 $res=mysqli_query($link,"select * from questions where id = $id");
 while($row=mysqli_fetch_array($res))
 {
      $question=$row["question"];
      $opt1=$row["opt1"];
      $opt2=$row["opt2"];
      $opt3=$row["opt3"];
      $opt4=$row["opt4"];
      $answer=$row["answer"];




 }









 ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
                    </div>
                </div>
            </div>




        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-12">   //col-lg-6 changed to col-lg-12 to increase width
                                  <form name="form1" action="" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header"><strong>Update questions with text</strong><small> Form</small></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">add question</label><input type="text" name="question" placeholder="add question" class="form-control" value="<?php echo $question; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">add opt1</label><input type="text" name="opt1" placeholder="add opt1" class="form-control" value="<?php echo $opt1; ?>" ></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">add opt2</label><input type="text" name="opt2" placeholder="add opt2" class="form-control"  value="<?php echo $opt2; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">add opt3</label><input type="text" name="opt3" placeholder="add opt3" class="form-control"  value="<?php echo $opt3; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">add opt4</label><input type="text" name="opt4" placeholder="add opt4" class="form-control"  value="<?php echo $opt4; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">answer</label><input type="text" name="answer" placeholder="add answer" class="form-control" value="<?php echo $answer; ?>" ></div>
                                                <div class="form-group">
                                                  <input type="submit" name="submit1" value="Update Question" class="btn btn-success">
                                                </div>
                            </div>

                        </div> <!-- .card -->

                        </form>

                    </div>
                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->

<?php
  if(isset($_POST["submit1"]))
  {
      mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id =$id ");

      ?>
      <script type ="text/javascript">
         window.location="add_edit_questions.php?id=<?php echo $id1 ?>";

       </script>
       <?php
  }

?>



<?php
include "footer.php";
 ?>
