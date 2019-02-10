<?php
include "dbconfig.php";
$id=$_GET["id"];
mysqli_query($link,"update user_registration set Status='yes' where User_id=$id");
?>

<script type="text/javascript">
window.location="display_student_info.php";
</script>