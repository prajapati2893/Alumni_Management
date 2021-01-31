<?php
session_start ();
if (! (isset ( $_SESSION ['login'] ))) {
	header ( 'location:../index.php' );
} 
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showFriends($_SESSION ['login']);
	$nm=$obj->showName_User($_SESSION ['login']);
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
    <title>View Students</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('user_leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("Logged In As:   "." ".htmlentities($name->first_name));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Friends
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
							<div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>S.No</th>
                                            <th>R.No</th>
											<th>Name</th>
                                            <th>Sex</th>
                                            <th>School</th>
											<th>Dept</th>
											<th>Course</th>
											<th>Year</th>
                                            <th>WorkAt</th>
											<th>Contact</th>
											<th>E-mail</th>
											<!--<th>Edit</th>-->
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){ 
									 ?>	
                                        <tr class="odd gradeX">
											<td><?php echo $sn?></td>
											<td><?php echo htmlentities( strtoupper($res->Roll_no));?></td>
											<td><?php echo htmlentities($res->first_name." ".$res->last_name);?></td>
											<td><?php echo htmlentities(strtoupper($res->gender));?></td>
											<td><?php echo htmlentities($res->school);?></td>
											<td><?php echo htmlentities($res->department);?></td>
											<td><?php echo htmlentities($res->course);?></td>
											<td><?php echo htmlentities($res->year);?></td>											  
											<td><?php echo htmlentities($res->working_at);?></td>											  
											<td><?php echo htmlentities($res->Mobile);?></td>											  
											<td><?php echo htmlentities($res->email);?></td>											  											
											</td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
								</div>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>