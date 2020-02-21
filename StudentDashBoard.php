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
        $enroll = $_SESSION['enrollment'];
	}
								
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="StudentDashBoard.css">
    <style>
    #button h2
    {
        margin-left: 80px;
         color:white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 200;
        font-size: 18px;
    } 
    </style>
</head>
<body>

        <div id="bg">
            <div id="overlay">
          
                    <div id="button">
                            <h2><?= $name?></h2>
                            <hr>
                            <button>View Profile</button>
                            <button>Update Profile</button>
                            <button>Upload Assignment</button>
                            <hr style="margin-top: 230px">
                            <a href="LogOut.php"> <button style="margin-top: 12px">Logout</button></a>
                    </div>
                        <div id="Upload-assignment" class="selectbutton">
                            <form action="Student_Upload_Assign.php" method="POST" enctype="multipart/form-data">
                                <h2>Upload Assignment</h2>
                                <hr>
                                <label id="lbl">Name : </label>
                                <input type="text" name="name" value="<?php echo $name ?>" readonly>

                                <label id="lbl">Enrollment : </label>
                                <input type="text" name="enrollment" value="<?php echo $enroll ?>"readonly>

                                <label id="lbl">Assignment No : </label>
                                <select name="assno" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <label id="lbl"> Subject Code : </label>
                                <select name="subcode">
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
                                    <option value="MCA-301">MCA-301</option>
                                    <option value="MCA-302">MCA-302</option>
                                    <option value="MCA-303">MCA-303</option>
                                    <option value="MCA-304">MCA-304</option>
                                    <option value="MCA-305">MCA-305</option>
                                    <option value="MCA-401">MCA-401</option>
                                    <option value="MCA-402">MCA-402</option>
                                    <option value="MCA-403">MCA-403</option>
                                    <option value="MCA-404">MCA-404</option>
                                    <option value="MCA-405">MCA-405</option>
                                    <option value="MCA-501">MCA-501</option>
                                    <option value="MCA-502">MCA-502</option>
                                    <option value="MCA-503">MCA-503</option>
                                    <option value="MCA-504">MCA-504</option>
                                    <option value="MCA-505">MCA-505</option>
                                </select> 
                                <label id="lbl">Upload File : </label>
                                <input type="file" name="myfile" id="file">
                                <button type="submit" name="save">Upload</button>
        
                            </form>
            </div>
        </div>
</body>
</html>
