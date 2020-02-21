<?php
	include('connection.php');
	session_start();
?>
<?php
  
	$filename = $_FILES['myfile']['name'];// name of the uploaded file
    $destination = 'Student_Assignment/' . $filename; // destination of the file on the server
    $extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
    $file = $_FILES['myfile']['tmp_name']; // the physical file on a temporary uploads directory on the server
	$size = $_FILES['myfile']['size'];
	$txtassignNo=$_POST['assno'];
	$txtname=$_POST['name'];
	$txtsubcode=$_POST['subcode'];
	$txtenrollment=$_POST['enrollment'];
    if (!in_array($extension, ['pdf'])) 
    {
	   echo '<script language = "javascript">alert("Only PDF file will be Allow......");</script>';
	   header('Refresh:0;url=StudentDashBoard.php');
    } 
    elseif ($_FILES['myfile']['size'] > 6000000)  // file shouldn't be larger than 1Megabyte
    { 
		echo '<script language = "javascript">alert("File too large......");</script>';
		header('Refresh:0;url=StudentDashBoard.php');
    } 
    else 
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination))
         {
           
            $sql="INSERT INTO `oas`.`Student_Upload_Assign` (`Name`, `Enrollment`, `Assign_No`, `Subject_Code`, `File`)
			 VALUES ('$txtname', '$txtenrollment', '$txtassignNo', '$txtsubcode', '$filename')";
             if (mysqli_query($conn, $sql)) 
            {
                echo '<script language = "javascript">alert("File upload Successfully......");</script>';
				header('Refresh:0;url=StudentDashBoard.php');
            }
        } 
        else
         {
			echo '<script language = "javascript">alert("File upload Failed......");</script>';
			header('Refresh:0;url=StudentDashBoard.php');
        }
    }
?>