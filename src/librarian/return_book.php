<?php
include "dbconfig.php";
$id = $_GET["id"];
$a = date("d-m-Y");
$res = mysqli_query($link, "update issue_books set return_date='$a' where issue_id=$id");

$books_name = "";
$res = mysqli_query($link, "select *  from issue_books  where issue_id=$id");
while ($row = mysqli_fetch_array($res)) {
    $books_name = $row["book_name"];
}

mysqli_query($link, "update add_books set book_qty=book_qty+1 where title='$books_name'");
?>

<script type="text/javascript">
window.location="returned_books.php";
</script>
