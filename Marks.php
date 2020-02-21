<?php
	include('connection.php');
	session_start();
?>
<?php
$txtname=$_POST['name'];
$txtregistration=$_POST['enrollment'];
$txtAssig_No=$_POST['Assign_No'];
$txtSub_Code=$_POST['Sub_Code'];
$txtMarks=$_POST['Marks'];
$txtRemarks=$_POST['Remarks'];

	$sql = "INSERT INTO `oas`.`Result` (`Name`, `Enrollment`, `Assingn_No`, `Sub_Code`, `Marks`, `Remarks`) 
    VALUES('".$txtname."','".$txtregistration."','".$txtAssig_No."','".$txtSub_Code."','".$txtMarks."','".$txtRemarks."');";
	if ($conn->query($sql) === TRUE) 
	{
  
		echo '<script language = "javascript">alert("Marks Upload Successfully......");</script>';
		header('Refresh:0;url=TeacherDashBoard.php');
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>