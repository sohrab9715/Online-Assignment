<?php
	session_start();
	include("connection.php");
?>

<?php
    $user = $_POST['registration'];
    $pwd = $_POST['password'];
	$_SESSION['logged_in'] = true;     //check for login or not
	 $sql = "SELECT * FROM `Student_Registration` WHERE enrollment='$user' AND password='$pwd'";
    $result = $conn->query($sql);
    if (!$result->num_rows == 1) 
	{
		header('Refresh:0;url=Student_LoginPage.html');
	  echo '<script language = "javascript">alert("Your Registration Number and password did not matched! Please try again.");</script>';
		
    } 
	else 
	{
					$user = $result->fetch_assoc();
					$_SESSION['name'] = $user['name'];
					$_SESSION['enrollment'] = $user['enrollment'];
					$_SESSION['logged_in'] = true;
				//	echo '<script language = "javascript">alert("Login Successfully....");</script>';
					header('Refresh:0;url=StudentDashBoard.php');
    }
?>