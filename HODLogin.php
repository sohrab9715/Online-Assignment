<?php
	session_start();
	include("connection.php");
?>

<?php
    $user = $_POST['userid'];
    $pwd = $_POST['password'];
	$_SESSION['logged_in'] = true;     //check for login or not
	 $sql = "SELECT * FROM `HOD` WHERE userid='$user' AND password='$pwd'";
    $result = $conn->query($sql);
    if (!$result->num_rows == 1) 
	{
		header('Refresh:0;url=HODLogin.html');
	  echo '<script language = "javascript">alert("Your username and password did not matched! Please try again.");</script>';
		
    } 
	else 
	{
					$user = $result->fetch_assoc();
					$_SESSION['name'] = $user['Name'];
					$_SESSION['logged_in'] = true;
				//	echo '<script language = "javascript">alert("Login Successfully....");</script>';
					header('Refresh:0;url=HODDashBoard.php');
    }
?>