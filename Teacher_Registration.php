<?php
	include('connection.php');
	session_start();
?>
<?php
$txtempid=$_POST['empid'];
$txtname=$_POST['name'];
$txtsubcode=$_POST['subcode'];
$txtusername=$_POST['username'];
$txtpassword=$_POST['password'];
$txtmobile=$_POST['mobile'];
$txtemail=$_POST['email'];

$txtmobile=$_POST['mobile'];

$sql = "SELECT * FROM Teacher_Registration WHERE empid='$txtempid'";
$check = $conn->query($sql);
if ($check->num_rows >0 ) 
{
		echo '<script language = "javascript">alert("This Emp_Id is already exists! ....");</script>';
		header('Refresh: 0;url=HODDashBoard.php');
		
}
else
{
	$sql = "INSERT INTO `oas`.`Teacher_Registration` (`empid`, `name`, `subject`, `username`, `password`, `mobile`, `email`) VALUES('".$txtempid."','".$txtname."','".$txtsubcode."','".$txtusername."','".$txtpassword."','".$txtmobile."','".$txtemail."');";
	if ($conn->query($sql) === TRUE) 
	{
  
		echo '<script language = "javascript">alert("Registration Successfully......");</script>';
		header('Refresh:0;url=HODDashBoard.php');
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>