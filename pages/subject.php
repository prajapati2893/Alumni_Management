<?php
include('dbcontroller.php');
if(!empty($_POST["no"])) 
{
 $id=intval($_POST['no']);
 $stmt = $DB_con->prepare("SELECT * FROM departments WHERE school = :id");
 $stmt->execute(array(':id' => $id));
 ?><option selected="selected">Select Department</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['name']); ?>"><?php echo htmlentities($row['name']); ?></option>
  <?php
 }
}
?>