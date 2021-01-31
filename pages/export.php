 <?php
 if(!empty($_FILES["excel_file"]))  
 { 
      $connect = mysqli_connect("localhost", "root", "", "alumni");  
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xls")  
      {  
           include("../Classes/PHPExcel/IOFactory.php");
		   include("Generate_pass.php");
           $output = '';  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
		   $obj=new randStr();
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $temp='';
                     $roll= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $fname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $lname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $gen= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                     //$sch= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
					 $school=$_POST['school'];
					 $resulted = mysqli_query($connect, "SELECT name FROM schools WHERE no='$school'");
					 $res = mysqli_fetch_assoc($resulted);
					 $sch=$res['name'];
					 //$dept= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue()); 
					 $dept=$_POST['dep'];					 
					 $course= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
					 $mob= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
					 $email= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());  
					 $temp= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue()); 
					 $year=intval($temp);
					 $work= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());  
                     $query = "  
                     INSERT INTO people  
                     (Roll_no,first_name,last_name,gender,school,department,course,year,working_at,Mobile,email)   
                     VALUES ('".$roll."', '".$fname."', '".$lname."', '".$gen."', '".$sch."', '".$dept."', '".$course."', '".$year."', '".$work."', '".$mob."', '".$email."')  
                     ";
					 $pass=$obj->getRand();
					 $query2 = "INSERT INTO credentials (roll_no,password) VALUES ('".$roll."', '".$pass."')"; 
                     mysqli_query($connect, $query);
					 mysqli_query($connect, $query2);  
                     $output='Data Inserted and Passwords Generated';
                } 
           }
		   echo $output;
      }  
      else  
      {  
           echo '<label class="text-primary">Invalid File</label>';  
      }  
 }  
 ?>  