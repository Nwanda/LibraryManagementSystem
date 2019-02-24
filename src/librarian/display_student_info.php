<?php
session_start();
//check if librarian is logged in, if not direct them to login page
if (!isset($_SESSION["librarian"])) {
    ?>
<script type="text/javascript">
window.location="login.php";
</script>
    <?php
}
include "header.php";
include "dbconfig.php";
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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <?php
$res = mysqli_query($link, "select *from user_registration");
echo "<table class='table table-bordered'>"; //display record in table format
echo "<tr>";
echo "<th>";
echo "Firstname";
echo "</th>"; //for heading
echo "<th>";
echo "Lastname";
echo "</th>";
echo "<th>";
echo "Username";
echo "</th>";
echo "<th>";
echo "user_number";
echo "</th>";
echo "<th>";
echo "DateOfBirth";
echo "</th>";
echo "<th>";
echo "Email";
echo "</th>";
echo "<th>";
echo "Telephone";
echo "</th>";
echo "<th>";
echo "Address";
echo "</th>";
echo "<th>";
echo "Gender";
echo "</th>";
echo "<th>";
echo "Status";
echo "</th>";
echo "<th>";
echo "Approved";
echo "</th>";
echo "<th>";
echo "Not Approved";
echo "</th>";
echo "</tr>";

while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>";
    echo $row["FirstName"];
    echo "</td>";
    echo "<td>";
    echo $row["LastName"];
    echo "</td>";
    echo "<td>";
    echo $row["Username"];
    echo "</td>";
    echo "<td>";
    echo $row["user_number"];
    echo "</td>";
    echo "<td>";
    echo $row["DateOfBirth"];
    echo "</td>";
    echo "<td>";
    echo $row["Email"];
    echo "</td>";
    echo "<td>";
    echo $row["Telephone"];
    echo "</td>";
    echo "<td>";
    echo $row["Address"];
    echo "</td>";
    echo "<td>";
    echo $row["Gender"];
    echo "</td>";
    echo "<td>";
    echo $row["Status"];
    echo "</td>";
    echo "<td>";?> <a href="approved.php?id=<?php echo $row["User_id"]; ?>">Approved</a> <?php echo "</td>";
    echo "<td>"; ?> <a href="NotApproved.php?id=<?php echo $row["User_id"]; ?>">Not Approved</a> <?php echo "</td>";
    echo "</tr>";

}
echo "</table>";
?>
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