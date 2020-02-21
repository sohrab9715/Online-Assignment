<?php
	include('connection.php');
	session_start();
?>
<?php
$txtname=$_POST['name'];
$txtregistration=$_POST['enrollment'];
$txtcourse=$_POST['course'];
$txtemail=$_POST['email'];
$txtpassword=$_POST['password'];
$txtmobile=$_POST['mobile'];

$sql = "SELECT * FROM Student_Registration WHERE enrollment='$txtregistration'";
$check = $conn->query($sql);
if ($check->num_rows >0 ) 
{
		echo '<script language = "javascript">alert("This Enrollment Number is already exists! Please Login with Enrollment No....");</script>';
		header('Refresh: 0;url=Student_LoginPage.html');
		
}
else
{
	$sql = "INSERT INTO `oas`.`Student_Registration` (`name`, `enrollment`, `course`, `emailid`, `mobile`, `password`) 
    VALUES('".$txtname."','".$txtregistration."','".$txtcourse."','".$txtemail."','".$txtmobile."','".$txtpassword."');";
	if ($conn->query($sql) === TRUE) 
	{
  
		echo '<script language = "javascript">alert("Registration Successfully......");</script>';
		header('Refresh:0;url=Student_LoginPage.html');
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>