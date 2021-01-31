<?php
require('Database.php');
include('Generate_pass.php');
class DbFunction{
	function login($loginid,$password){		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT id, password FROM admin where id=? and password=? ";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{	
			$stmt->bind_param('ss',$loginid,$password);
			$stmt->execute();
			$stmt -> bind_result($loginid,$password);
			$rs=$stmt->fetch();
			if(!$rs){
				echo "<script>alert('Invalid Details')</script>";
				header('location:login.php');
			}
			else{
				header('location:register.php');
			}
		}
	}
	function login_user($loginid,$password){		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT roll_no, Password FROM credentials where roll_no=? and Password=? ";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{	
			$stmt->bind_param('ss',$loginid,$password);
			$stmt->execute();
			$stmt -> bind_result($loginid,$password);
			$rs=$stmt->fetch();
			if(!$rs){
				echo "<script>alert('Invalid Details')</script>";
				header('location:login.php');
			}
			else{
				header('location:user_home.php');
			}
		}
	}
	function showSchools(){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM schools ";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function showStudents(){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM people ";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function showRequests(){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT roll_no,email FROM requests";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function showFriends($roll){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM people WHERE Roll_no='$roll'";
		$stmt= $mysqli->query($query);
		$res=$stmt->fetch_Object();
		$course=$res->course;
		$dept=$res->department;
		$yr=$res->year;
		$year=intval($yr);
		$query2="SELECT * FROM people WHERE course='$course' AND year='$year' AND department='$dept' AND Roll_no NOT IN('$roll')";
		$stmt2= $mysqli->query($query2);
		return $stmt2;
	}
	function add_admin($name,$id,$pass){
 		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "INSERT INTO `admin`(`id`,`name`, `password`) VALUES(?,?,?)";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{
			$stmt->bind_param('sss',$id,$name,$pass);
			$stmt->execute();
			echo "<script>alert('Successfully Registered')</script>";
		}
    }
	function getUser($rollno){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM people WHERE Roll_no='$rollno'";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function showName_Admin($id){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT name FROM admin WHERE id='$id'";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function showName_User($roll){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT first_name FROM people WHERE Roll_no='$roll'";
		$stmt= $mysqli->query($query);
		return $stmt;
	}
	function addRequest($roll,$email){
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "INSERT INTO `requests`(`roll_no`,`email`) VALUES(?,?)";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{
			$stmt->bind_param('ss',$roll,$email);
			$stmt->execute();
		}
	}
	function del_std($roll){
		echo ("$roll");
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$obj=new randStr();
		$pass=$obj->getRand();
		$query = "SELECT * FROM requests WHERE roll_no='$roll'";
		$stmt= $mysqli->query($query);
		$res=$stmt->fetch_Object();
		$rq_roll=$res->roll_no;
		$rq_email=$res->email;
		$query = "INSERT INTO `credentials`(`roll_no`,`Password`) VALUES(?,?)";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{
			$stmt->bind_param('ss',$rq_roll,$pass);
			$stmt->execute();
		}
		$query = "INSERT INTO `people`(`roll_no`,`email`) VALUES(?,?)";
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{
			$stmt->bind_param('ss',$rq_roll,$rq_email);
			$stmt->execute();
		}
		
		$query="DELETE from requests where roll_no=?";
		$stmt= $mysqli->prepare($query);
		$stmt->bind_param('s',$roll);
		$stmt->execute();
		echo "<script>alert('One record from request has been added to database')</script>";
		echo "<script>window.location.href='register.php'</script>";
	}
}