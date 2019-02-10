<?php
session_start();
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
                                <h2>Display books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                Add content to the page ...

<form name="form1" action="" method="post">
<input type="text" name="t1" class="form-control" placeholder="enter book name">
<input type="submit" name="submit1" value="search books" class="btn btn-default">

</form>



<?php
if(isset($_POST["submit1"]))
{
    $res=mysqli_query($link, "select * from add_books where title like ('$_POST[t1]%')");
    echo "<table class='table table-bordered'>";
    
    echo "<tr>";
    echo "<th>"; echo "Image"; echo "</th>";
    echo "<th>"; echo "Title"; echo "</th>";
    echo "<th>"; echo "ISBN"; echo "</th>";
    echo "<th>"; echo "Pages"; echo "</th>";
    echo "<th>"; echo "Author Name"; echo "</th>";
    echo "<th>"; echo "Publisher Name"; echo "</th>";
    echo "<th>"; echo "Publish Date"; echo "</th>";
    echo "<th>"; echo "Purchase Date"; echo "</th>";
    echo "<th>"; echo "Price"; echo "</th>";
    echo "<th>"; echo "Quantity"; echo "</th>";
    echo "</tr>";
    
    while($row=mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; ?> <img src="<?php echo $row["book_img"]  ?>" height="100" width="100"> <?php ; echo "</td>";
        echo "<td>"; echo $row["title"]; echo "</td>";
        echo "<td>"; echo $row["ISBN"]; echo "</td>";
        echo "<td>"; echo $row["pages"]; echo "</td>";
        echo "<td>"; echo $row["author_name"]; echo "</td>";
        echo "<td>"; echo $row["publisher_name"]; echo "</td>";
        echo "<td>"; echo $row["publish_date"]; echo "</td>";
        echo "<td>"; echo $row["purchase_date"]; echo "</td>";
        echo "<td>"; echo $row["book_price"]; echo "</td>";
        echo "<td>"; echo $row["book_qty"]; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else{

$res=mysqli_query($link, "select * from add_books");
echo "<table class='table table-bordered'>";

echo "<tr>";
echo "<th>"; echo "Image"; echo "</th>";
echo "<th>"; echo "Title"; echo "</th>";
echo "<th>"; echo "ISBN"; echo "</th>";
echo "<th>"; echo "Pages"; echo "</th>";
echo "<th>"; echo "Author Name"; echo "</th>";
echo "<th>"; echo "Publisher Name"; echo "</th>";
echo "<th>"; echo "Publish Date"; echo "</th>";
echo "<th>"; echo "Purchase Date"; echo "</th>";
echo "<th>"; echo "Price"; echo "</th>";
echo "<th>"; echo "Quantity"; echo "</th>";
echo "</tr>";

while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>"; ?> <img src="<?php echo $row["book_img"]  ?>" height="100" width="100"> <?php ; echo "</td>";
    echo "<td>"; echo $row["title"]; echo "</td>";
    echo "<td>"; echo $row["ISBN"]; echo "</td>";
    echo "<td>"; echo $row["pages"]; echo "</td>";
    echo "<td>"; echo $row["author_name"]; echo "</td>";
    echo "<td>"; echo $row["publisher_name"]; echo "</td>";
    echo "<td>"; echo $row["publish_date"]; echo "</td>";
    echo "<td>"; echo $row["purchase_date"]; echo "</td>";
    echo "<td>"; echo $row["book_price"]; echo "</td>";
    echo "<td>"; echo $row["book_qty"]; echo "</td>";
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