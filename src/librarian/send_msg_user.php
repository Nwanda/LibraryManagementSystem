<?php
session_start();
//check if librarian is logged in, if not direct them to login page
if(!isset($_SESSION["librarian"]))
{
    ?>
<script type="text/javascript">
window.location="login.php";
</script>
    <?php
}
include "dbconfig.php";
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Send Message to user</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                             
                            <form name="form" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                    <select class="form-control" name="dest_user">
                                    
                                    <?php
$res=mysqli_query($link,"select * from user_registration");
while($row=mysqli_fetch_array($res)){

   ?><option value="<?php echo $row["Username"]?>">
<?php
echo $row["Username"]."(".$row["user_number"].")";
?>

   </option><?php
}


                                    ?>
                                    
                                    </select>
                                    </td>
                                </tr>
<tr>
<td> <input type="text" class="form-control" name="subject" placeholder="Enter subject"></td>
</tr>
<tr>
<td>  <textarea name="msg" class="form-control" placeholder="enter message" cols="30" rows="10"></textarea>  </td>
</tr>
<tr>
<td><input type="submit" name="submit1" value="send message">  </td>

</tr>


                                </table>
                                </form>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
if(isset($_POST["submit1"]))
{
mysqli_query($link,"insert into lib_messages values('','$_SESSION[librarian]','$_POST[dest_user]','$_POST[subject]','$_POST[msg]','n')") or die(mysqli_error($link)) ;
?>

<script type="text/javascript">
alert("message sent succesfully");
</script>
<?php

}

?>
<?php
include "footer.php";
?>

