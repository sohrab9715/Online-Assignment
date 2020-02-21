<?php
		include("connection.php");
		session_start();
		$pwd=$_POST['npassword'];
		$rgst = $_SESSION['enrollment'];
		$sql="UPDATE `oas`.`Student_Registration` SET `password` = '$pwd' WHERE `Student_Registration`.`enrollment` = '$rgst'";
		if ($conn->query($sql) === TRUE)
		 {
    			echo '<script language = "javascript">alert("Password changed successfully........");</script>';
    			header('Refresh: 0;url=LoginPage.html');
		 } 
		 else 
		 {
    			echo "Error updating record: " . $conn->error;
		 }
?>