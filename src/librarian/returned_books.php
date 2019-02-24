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
                                <h2>Returned Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                Add content to the page ...
                                <form name="form1" action="" method="POST">

                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select name="user_number" class="form-control">
                                            <?php

$res = mysqli_query($link, "select user_number from issue_books where return_date='' ");
while ($row = mysqli_fetch_array($res)) {
    echo "<option>";
    echo $row["user_number"];

    echo "</option>";
}
?>

                                            </select>
                                        </td>
                                        <td>
                                        <input type="submit" name="submit1" value="search" class="form-control" style="background-color:blue; color:white;">
                                        </td>
                                    </tr>

                                </table>
                                </form>

<?php
if (isset($_POST["submit1"])) {
    $res = mysqli_query($link, "select * from issue_books where user_number='$_POST[user_number]' ");
    echo "<table class=table table-bordered>";
    echo "<tr>";
    echo "<th>";
    echo "user number";
    echo "</th>";
    echo "<th>";
    echo "First Name";
    echo "</th>";
    echo "<th>";
    echo "Last number";
    echo "</th>";
    echo "<th>";
    echo "Username";
    echo "</th>";
    echo "<th>";
    echo "Telephone";
    echo "</th>";
    echo "<th>";
    echo "Email";
    echo "</th>";
    echo "<th>";
    echo "Book name";
    echo "</th>";
    echo "<th>";
    echo "Issue date";
    echo "</th>";
    echo "<th>";
    echo "return book";
    echo "</th>";

    echo "</tr>";

    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>";
        echo $row["user_number"];
        echo "</td>";
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
        echo $row["Telephone"];
        echo "</td>";
        echo "<td>";
        echo $row["Email"];
        echo "</td>";
        echo "<td>";
        echo $row["book_name"];
        echo "</td>";
        echo "<td>";
        echo $row["issue_date"];
        echo "</td>";
        echo "<td>";?> <a href="return_book.php?id=<?php echo $row["issue_id"]; ?>">Return book</a> <?php echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
}

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