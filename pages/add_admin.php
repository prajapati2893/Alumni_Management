<?php
session_start ();
if (! (isset ( $_SESSION ['login'] ))) {
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$nm=$obj->showName_Admin($_SESSION ['login']);
	$name=$nm->fetch_Object();
	if(isset($_POST['submit'])){
	$obj->add_admin($_POST['name'],$_POST['id'],$_POST['passwd']);
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
<title>register</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" id="export_excel">
	<div id="wrapper">
	<?php include('leftbar.php');?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("Logged In As:   "." ".htmlentities($name->name));?></h4>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add Admin</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<div class="col-lg-4">
												<label>Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="name" required="required" pattern="[A-Za-z]+$">
											</div>	
											<br><br>						
											<div class="col-lg-4">
												<label>Admin Id<span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="id" required="required">
											</div>
											<br><br>
											<div class="col-lg-4">
												<label>Password<span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" type="password" name="passwd" required="required" pattern="[A-Za-z0-9]+$">
											</div>
										</div> 
										<br>																
										<div class="col-lg-4"><br><br>
											<input type="submit" class="btn btn-primary" name="submit" value="Add"></button>
										</div>	
										<br><br>		
									</div>
								</div>	
							</div>	
						</div>
					</div>
				</div>
	</form>
	<div id="result">  
    </div>
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	<script>
function showDep(val) {
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'no='+val,
	success: function(data){
		$("#dep").html(data);
	}
	});
}
  </body>
</html>
