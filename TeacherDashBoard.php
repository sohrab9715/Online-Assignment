<!DOCTYPE html>	
<?php
				
	include ('connection.php');
	session_start();

	// Checking if user has logged in or not
	
	if ( $_SESSION['logged_in'] != 1 )
	{
	 // $_SESSION['message'] = "You must log in before viewing your profile page !";
	 // echo '<script language = "javascript">alert("Logout Successfully");</script>';
	  header("location: index.html");    
	}
	
	else
	{
        $name = $_SESSION['name'];
        $subject = $_SESSION['subject'];
	}
								
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash Board</title>
    <link rel="stylesheet" href="TeacherDashBoard.css">
    <style>
    #button h2
    {
        margin-left: 80px;
    
         color:white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
        font-size: 20px;
    } 
    </style>
</head>
<body>
    <div id="container">
        <div id="overlay">
                <div id="button">
                    <h2><?= $name?></h2>
                    <hr>
                    <button  onclick="upload()" >Uplaod Assignment</button>
                    <button>Delete Assignment</button>
                    <button>Update Assignment</button>
                    <button  onclick="check()" >Check Assignment</button>
                    <a target="_blank" href="StudentAssignment.php"> <button >Student Assignment</button></a> 

                    <hr style="margin-top: 88px">
                    <a href="LogOut.php"> <button style="margin-top: 15px">Logout</button></a> 
                </div>
                <div id="Upload-assignment" class="selectbutton" style="display: none" >
                    <form action="Teacher_Upload_Assign.php" method="POST" enctype="multipart/form-data">
                        <h2>Upload Assignment</h2>
                     
                        <hr>
                        <label id="lbl">Assignment No : </label>
                        <select name="assignNo" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label id="lbl">Assignment Title : </label>
                        <input type="text" name="title" placeholder="Enter the Title" required>
                        <label id="lbl"> Subject Code : </label>
                        <input type="text" name=subcode value="<?php echo $subject ?>" readonly>
                        <label id="lbl">Last Date : </label>
                        <input type="date" name="date" required >
                        <label id="lbl">Upload File : </label>
                        <input type="file" name="myfile" id="file" required>
                        <button type="submit" name="save">Upload</button>

                    </form>
                </div>
                <div id="Check-assignment" style="display: none">
                 <form action="Marks.php" method="POST">
                        <h2>Check Assignment</h2>
                        <hr>
                        <label id="lbl">Name : </label>
                        <input type="text" name="name" placeholder="Enter the Full Name" required>
                        <label id="lbl">Enrollment No : </label>
                        <input type="text" name="enrollment" placeholder="Enrollment No" required>
                        <label id="lbl">Assignment No : </label>
                        <select name="Assign_No" required>
                        <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label id="lbl"> Subject Code : </label>
                        <select name="Sub_Code" required>
                            <option value="">Select</option>
                            <option value="MCA-101">MCA-101</option>
                            <option value="MCA-102">MCA-102</option>
                            <option value="MCA-103">MCA-103</option>
                            <option value="MCA-104">MCA-104</option>
                            <option value="MCA-105">MCA-105</option>
                            <option value="MCA-201">MCA-201</option>
                            <option value="MCA-202">MCA-202</option>
                            <option value="MCA-203">MCA-203</option>
                            <option value="MCA-204">MCA-204</option>
                            <option value="MCA-205">MCA-205</option>
                        </select> 
                        <label id="lbl">Marks : </label>
                        <input type="text" name="Marks" placeholder="Enter the Marks" required>
                        <label id="lbl">Remarks : </label>
                        <input type="text" name="Remarks" placeholder="Enter the Remarks" >
                        <button type="submit" name="save">Upload</button>

                    </form>
                </div>
        </div>
     </div>
     <script src="Teacher_Dashboard.js"></script>
</body>
</html>