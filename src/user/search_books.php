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
                                <h2>Search book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">



<form name="form1" action="" method="POST">
<table class="table">
<tr>

<td> <input type="text" name="t1" placeholder="Enter book name" required class="form-control"> </td>
<td> <input type="submit" name="submit1" value="search book" class="form-control btn btn-default"> </td>
</tr>
</table>
</form>

                                <?php

if (isset($_POST["submit1"])) {
    $rowNumber = 0;
    $res = mysqli_query($link, "select * from add_books where title like ('%$_POST[t1]%')");
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    while ($row = mysqli_fetch_array($res)) {$rowNumber = $rowNumber + 1;
        echo "<td>";
        ?> <img src="<?php echo $row["book_img"]; ?>" height="100" width="100">  <?php
echo "<br>";
        echo "<b>" . $row["title"] . "</b>";
        echo "<br>";
        echo "<b>" . "Available" . $row["book_qty"] . "</b>";
        if ($rowNumber == 4) {
            echo "</tr>";
            echo "<tr>";
            $rowNumber = 0;
        }

        echo "</td>";

    }
    echo "</tr>";
    echo "</table>";

} else {
    $rowNumber = 0;
    $res = mysqli_query($link, "select * from add_books ");
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    while ($row = mysqli_fetch_array($res)) {$rowNumber = $rowNumber + 1;
        echo "<td>";
        ?> <img src="<?php echo $row["book_img"]; ?>" height="100" width="100">  <?php
echo "<br>";
        echo "<b>" . $row["title"] . "</b>";
        echo "<br>";
        echo "<b>" . "Available" . $row["book_qty"] . "</b>";
        if ($rowNumber == 4) {
            echo "</tr>";
            echo "<tr>";
            $rowNumber = 0;
        }

        echo "</td>";

    }
    echo "</tr>";
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