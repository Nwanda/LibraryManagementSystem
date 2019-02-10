<?php
include "dbconfig.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Registration Form | LMS </title>

    <link href="../css/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/css/custom.min.css" rel="stylesheet">
    <link href="/css/css/animate.min.css" rel="stylesheet">
    
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="FirstName" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="LastName" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="Username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="Password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Date OF Birth" name="DateOfBirth" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="Email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Telephone" name="Telephone" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Address" name="Address" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Gender" name="Gender" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="User Number" name="user_number" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                    </div>

                </form>
            </section>
<?php
if(isset($_POST["submit1"]))
{
    
    mysqli_query($link,"insert into user_registration values('','$_POST[FirstName]','$_POST[LastName]','$_POST[Username]','$_POST[Password]','$_POST[DateOfBirth]','$_POST[Email]','$_POST[Telephone]','$_POST[Address]','$_POST[Gender]','no','$_POST[user_number]')");
?>
 <div class="alert alert-success col-lg-6 col-lg-push-3">
        Registration successfully, You will get email when your account is approved
    </div>
    <?php

}
?>


    </div>

   


</body>
</html>

