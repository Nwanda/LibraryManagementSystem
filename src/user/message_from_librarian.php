<?php
session_start();
//check if user is logged in, if not direct them to login page
if(!isset($_SESSION["Username"]))
{
    ?>
<script type="text/javascript">
window.location="login.php";
</script>
    <?php
}
include "dbconfig.php";
include "header.php";
mysqli_query($link,"update lib_messages set read_1='y' where dest_username='$_SESSION[Username]'");
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Messages</h3>
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
                                <h2>My Messages</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              
                              
<table class="table table-bordered">
<tr>
<th>Name of librarian</th>

<th>subject</th>
<th>message</th>
</tr>

<?php
$res=mysqli_query($link,"select * from lib_messages where dest_username='$_SESSION[Username]' order by msg_id desc");
while($row=mysqli_fetch_array($res))
{
    $res1=mysqli_query($link,"select * from librarian_registration where Username='$row[src_username]'");
    while($row1=mysqli_fetch_array($res1))
    {
$fullname=$row1["FirstName"]." ".$row1["LastName"];
    }

    echo "<tr>";
    echo "<td>"; echo $fullname; echo "</td>";
    echo "<td>"; echo $row["subject"]; echo "</td>";
    echo "<td>"; echo $row["msg"]; echo "</td>";
    echo "</tr>";
}
?>


</table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>