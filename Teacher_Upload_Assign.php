<?php
	include('connection.php');
	session_start();
?>
<?php
  
	$filename = $_FILES['myfile']['name'];// name of the uploaded file
    $destination = 'Teacher_Assignment/' . $filename; // destination of the file on the server
    $extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
    $file = $_FILES['myfile']['tmp_name']; // the physical file on a temporary uploads directory on the server
	$size = $_FILES['myfile']['size'];
	$txtassignNo=$_POST['assignNo'];
	$txttitle=$_POST['title'];
	$txtsubcode=$_POST['subcode'];
	$txtdate=$_POST['date'];
    if (!in_array($extension, ['pdf'])) 
    {
	   echo '<script language = "javascript">alert("Only PDF file will be Allow......");</script>';
	   header('Refresh:0;url=TeacherDashBoard.php');
    } 
    elseif ($_FILES['myfile']['size'] > 1000000)  // file shouldn't be larger than 1Megabyte
    { 
		echo '<script language = "javascript">alert("File too large......");</script>';
		header('Refresh:0;url=TeacherDashBoard.php');
    } 
    else 
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination))
         {
           
            $sql="INSERT INTO `oas`.`Teacher_Upload_Assign` (`AssignNo`, `AssignTitle`, `SubCode`, `LastDate`, `File`)
			 VALUES ('$txtassignNo', '$txttitle', '$txtsubcode', '$txtdate', '$filename')";
             if (mysqli_query($conn, $sql)) 
            {
                echo '<script language = "javascript">alert("File upload Successfully......");</script>';
				header('Refresh:0;url=TeacherDashBoard.php');
            }
        } 
        else
         {
			echo '<script language = "javascript">alert("File upload Failed......");</script>';
			header('Refresh:0;url=TeacherDashBoard.php');
        }
    }
?>