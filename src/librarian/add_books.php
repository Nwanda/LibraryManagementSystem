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
                        <h3>Add books</h3>
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
                                <h2>Add books</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
<form name="form" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Title" name="bookName" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="f1" placeholder="Username"  required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="ISBN" name="isbn" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Pages" name="pages" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Author Name" name="authorName" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Publisher Name" name="pubName" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Purchase date" name="pubDate" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book price" name="bookPrice" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Total quantity" name="bookQty" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Available quantity" name="avalaibleQty" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit1" class="btn btn-defualt" value="insert"></td>
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
if (isset($_POST["submit1"])) {
    //this line copies the  image from teh source to the destination folder
    $tm = md5(time());
    $frm = $_FILES["f1"]["name"];
    $dest = "../assets/books_img/" . $tm . $frm;
    $dest1 = "../assets/books_img/" . $tm . $frm;
    move_uploaded_file($_FILES["f1"]["tmp_name"], $dest);

    mysqli_query($link, "insert into add_books values('','$_POST[bookName]','$dest1','$_POST[isbn]','$_POST[pages]','$_POST[authorName]','$_POST[pubName]','$_POST[pubDate]','$_POST[bookPrice]','$_POST[bookQty]','$_POST[avalaibleQty]',' $_SESSION[librarian]')");
    ?>
 <script type="text/javascript">
 alert("book succesfully uploaded");
 </script>
 <?php

}
?>


<?php
include "footer.php";
?>