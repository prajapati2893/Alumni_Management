 <?php
	session_start ();
    $connect = mysqli_connect("localhost", "root", "", "alumni");  
	$output = '';  
    $temp='';
	$roll=$_SESSION['login'];  
    $fname =$_POST['fname'];  
    $lname = $_POST['lname'];
	$sch=$_POST['school'];
	$dept=$_POST['dep'];					 
	$course= $_POST['course'];
	$mob=$_POST['mobile'];
	$email=$_POST['email'];
	$temp= $_POST['year'];
	$year=intval($temp);
	$work=$_POST['work'];
    $query="  
    UPDATE people SET first_name='".$fname."',last_name='".$lname."',school='".$sch."',department='".$dept."',course='".$course."',
	year='".$year."',working_at='".$work."',Mobile='".$mob."',email='".$email."' WHERE Roll_no='".$roll."'
	";
	mysqli_query($connect, $query);
    $output='Data Updated';
	echo $output;
 ?>  