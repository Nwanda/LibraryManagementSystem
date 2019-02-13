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
                                <h2>Issued books</h2>
                             
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
<form name="form1" action="" method="post">
<table>
<tr>
<td>
<select name="userNumber" class="form-control selectpicker">
<?php
$res=mysqli_query($link, "select user_number from user_registration");
while($row=mysqli_fetch_array($res))
{
    echo "<option>";
echo $row["user_number"];
    echo "</option>";
}

?>
</select>

</td>
<td>
    <input type="submit" value="search" name="submit1" class="form-control btn btn-default" style="margin-top:5px;">
</td>
</tr>
</table>


<?php
if(isset($_POST["submit1"])){
  $res=mysqli_query($link,"select *  from user_registration where user_number='$_POST[userNumber]'");
  while ($row5=mysqli_fetch_array($res))
  {
      $firstname=$row5["FirstName"];
      $lastname=$row5["LastName"];
      $username=$row5["Username"];
      $email=$row5["Email"];
      $telephone=$row5["Telephone"];
      $address=$row5["Address"];
      $gender=$row5["Gender"];
      $date_of_birth=$row5["DateOfBirth"];
      $user_number=$row5["user_number"];
      $_SESSION["user_number"]=  $user_number;
      $_SESSION["U_username"]=$username;
  }
?>
  <table class="table table-bordered">
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="User Number" name="user_number" value="<?php echo $user_number;  ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="First Name" name="FirstName" value="<?php echo $firstname;  ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Last Name" name="LastName" value="<?php echo $lastname;  ?>">
                </td>
            </tr>
           
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Date Of Birth" name="DateOfBirth" value="<?php echo $date_of_birth;  ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Email" name="Email" value="<?php echo $email;  ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Telephone" name="Telephone" value="<?php echo $telephone;  ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo $address;  ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Gender" name="Gender" value="<?php echo $gender;  ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <select name="booksname" class="form-control selectpicker">
                    <?php
$res=mysqli_query($link,"select title from add_books ");
while($row=mysqli_fetch_array($res))
{
   echo  "<option>";
          echo $row["title"];          
    echo "</option>";
}
                    ?>
                    
                    </select>
                </td>
            </tr>
            </table>;
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Issue date" name="issue_date" value="<?php echo date("d-m-Y");  ?>"required >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Username" name="Username" value="<?php echo $username;  ?>"disabled >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Issue books"  name="submit2" class="form-control btn btn-default" style="background-color: blue;  color:white">
                </td>
            </tr>
<?php

}
?>
</form>
<?php

if(isset($_POST["submit2"]))
{
$quantity=0;
$res=mysqli_query($link,"select * from add_books where title='$_POST[booksname]'");
while($row=mysqli_fetch_array($res))
{
$quantity=$row["book_qty"];
}
if($quantity==0){
    ?>
    <div class="alert alert-danger col-lg-6 col-lg-push-3">
        <strong style="color:white">This book is not available in stock</strong>
    </div>
<?php
}
else{

    mysqli_query($link,"insert into issue_books values ('','$_SESSION[user_number]','$_POST[FirstName]','$_POST[LastName]','$_SESSION[U_username]','$_POST[Telephone]','$_POST[Email]','$_POST[booksname]','$_POST[issue_date]','') ");
    //reduce total number of books once a book is issued out
    mysqli_query($link,"update add_books set book_qty=book_qty-1 where title='$_POST[booksname]'");
    // end of reducing total number of books once a book is issued out

?>

<script type="text/javascript">
alert("book issues succesfully");
window.location.href=window.location.href;
</script>
<?php
}
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