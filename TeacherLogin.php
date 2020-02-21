<?php
	session_start();
	include("connection.php");
?>

<?php
    $user = $_POST['username'];
    $pwd = $_POST['password'];
	$_SESSION['logged_in'] = true;     //check for login or not
	 $sql = "SELECT * FROM `Teacher_Registration` WHERE username='$user' AND password='$pwd'";
    $result = $conn->query($sql);
    if (!$result->num_rows == 1) 
	{
		header('Refresh:0;url=Teacher_LoginPage.html');
	  echo '<script language = "javascript">alert("Your username and password did not matched! Please try again.");</script>';
		
    } 
	else 
	{
					$user = $result->fetch_assoc();
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['subject'] = $user['subject'];
					$_SESSION['logged_in'] = true;
				//	echo '<script language = "javascript">alert("Login Successfully....");</script>';
					header('Refresh:0;url=TeacherDashBoard.php');
    }
?>