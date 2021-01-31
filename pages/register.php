<?php
session_start ();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->showSchools();
	$nm=$obj->showName_Admin($_SESSION ['login']);
	$name=$nm->fetch_Object();
	
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
					<h4 class="page-header"> <?php echo strtoupper("Logged In As:  "." ".htmlentities($name->name));?></h4>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Register Students</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<div class="col-lg-4">
												<label>Select School<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="school" id="school" onchange="showDep(this.value)" required="required" >			
													<option VALUE="">SELECT</option>
													<?php while($res=$rs->fetch_object()){?>							
														<option VALUE="<?php echo htmlentities($res->no);?>"><?php echo htmlentities($res->name)?></option>    
													<?php }?>
												</select>
											</div>	
											<br><br>						
											<div class="col-lg-4">
												<label>Select Department<span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<select name="dep" id="dep"  class="form-control">
													<option value="">Select Department</option>
												</select>
											</div>
											<br><br><br>
											<div class="col-lg-4">
												<label>Import File<span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<input type="file" class="custom-file-input" name="excel_file" id="excel_file" accept=".xls">
											</div>
										</div> 
										<br>
										<div class="col-lg-4"><br><br>
											<input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
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
