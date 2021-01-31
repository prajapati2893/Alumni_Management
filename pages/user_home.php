<?php
session_start ();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->getUser($_SESSION ['login']);
	$res=$rs->fetch_object();
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
	<?php include('user_leftbar.php');?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"><?php echo strtoupper("Logged In As:  "." ".htmlentities($res->first_name));?></h4>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Personal Informations</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-lg-2">
											<label>First Name<span id=""></span></label>
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="fname" value="<?php echo htmlentities($res->first_name);?>" disabled>
										</div>
										<div class="col-lg-2">
											<label>Last Name</label>	
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="lname" value="<?php echo htmlentities($res->last_name);?>" disabled>
										</div>
									</div>	
									<br><br>								
									<div class="form-group">
										<div class="col-lg-2">
											<label>Roll Number</label>
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="roll" value="<?php echo htmlentities($res->Roll_no);?>" disabled>
										</div>
										<div class="col-lg-2">
											<label>Passing Year</label>	
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="year" value="<?php echo htmlentities($res->year);?>" disabled>
										</div>
									</div>	
									<br><br>		
									<div class="form-group">
										<div class="col-lg-2">
											<label>School<span id=""></span></label>	
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="school"value=" <?php echo htmlentities($res->school);?>" disabled>
										</div>
										<div class="col-lg-2">
											<label>Department</label>	
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="dep" id="ocp" value="<?php echo htmlentities($res->department);?>" disabled>
										</div>
									</div>	
									<br><br>					
									<div class="form-group">
										<div class="col-lg-2">
											<label>Course<span id=""</span></label>			
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="course" id="ocp" value="<?php echo htmlentities($res->course);?>" disabled>
										</div>
										<div class="col-lg-2">
											<label>Working At<span id=""</span></label>			
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="work" id="ocp"value=" <?php echo htmlentities($res->working_at);?>" disabled>
										</div>
									</div>	
									<br><br>
									<div class="form-group">
										<div class="col-lg-2">
											<label>E-mail<span id=""</span></label>			
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="email" id="ocp"value=" <?php echo htmlentities($res->email);?>" disabled>
										</div>
										<div class="col-lg-2">
											<label>Mobile<span id=""</span></label>			
										</div>
										<div class="col-lg-4">
											<input class="form-control" name="mobile" id="nation"value=" <?php echo htmlentities($res->Mobile);?>" disabled>
										</div>
									</div>	
									<br><br>
								</div>	
								<br><br>
							</div>
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
</script>
<script>  
 $(document).ready(function(){   
      $('#export_excel').on('submit', function(event){
           event.preventDefault();  
           $.ajax({  
                url:"export.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){ 
                     $('#result').html(data); 
                     $('#excel_file').val('');  
                }  
           }); 
      });  
 });  
 </script>  


</body>

</html>
