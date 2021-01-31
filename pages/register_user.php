<?php 
if(isset($_POST['submit'])){
	 include('../config/DbFunction.php');
	 $obj=new DbFunction();
	 $obj->addRequest($_POST['roll'],$_POST['email']);
	 echo "<script>alert('We recieved your roll number. We will verify it and mail you the password.\n See you soon in Alumni family')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TU Alumni</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../dist/css/jquery.validate.css" />
</head>

<body>
 <h2 align="center">Tezpur University Alumni System</h2>
    <div class="container">
        <br><br><br><br>
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                     <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
             <input class="form-control" placeholder=" Your Roll Number"  id="roll"name="roll" type="text" autofocus autocomplete="off" required="required">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your E-mail" id="email"name="email"  value="" required="required">
                                </div>
                                <input type="submit" value="Submit" name="submit" class="btn btn-sm btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
					<a href="login.php" class="badge badge-light">Admin Sign-In</a>
					&nbsp &nbsp &nbsp &nbsp
					<a href="register_user.php" class="badge badge-light">Register</a>
					&nbsp &nbsp &nbsp &nbsp &nbsp
					<a href="login_user.php" class="badge badge-light">Forgot Password</a>
            </div>
        </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
 <script src="../dist/jquery-1.3.2.js" type="text/javascript"></script>
 <script src="../dist/jquery.validate.js" type="text/javascript"></script>
</body>

</html>
