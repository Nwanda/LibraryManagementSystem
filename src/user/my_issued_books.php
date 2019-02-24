<?php
session_start();
//check if user is logged in, if not direct them to login page
if (!isset($_SESSION["Username"])) {
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
                                <h2>My issued books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

    <table class="table table-bordered">
            <th>
                User Number
            </th>
            <th>
                Book Name
            </th>
            <th>
                Issue date
            </th>

            <?php
$res = mysqli_query($link, "select *  from issue_books where Username='$_SESSION[Username]'") or die(mysqli_error($link));

while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>";
    echo $row["user_number"];
    echo "</td>";
    echo "<td>";
    echo $row["book_name"];
    echo "</td>";
    echo "<td>";
    echo $row["issue_date"];
    echo "</td>";
    echo "</tr>";

}

?>
    </table>

<?php

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