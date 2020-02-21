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
		$username = $_SESSION['name'];
	}
								
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash Board</title>
    <link rel="stylesheet" href="HODDashBoard.css">
</head>
<body>
     
    <div id="container">
        <div id="overlay">
            
                <div id="button">
                <h2><?= $username ?></h2>
                    <hr>

                    <button>Create New User</button>
                    <button>Delete Registration</button>
                    <button>Update Registration</button>
                    <button>Check Reports</button>
                   
                    <hr style="margin-top: 170px">
                  <a href="LogOut.php"> <button style="margin-top: 10px">Logout</button></a> 
                </div>
                <div id="Upload-assignment" class="selectbutton">
                    <form action="Teacher_Registration.php" method="POST">
                        <h2>New user Creation</h2>
                        <hr>
                        <label id="lbl">Emp-Id : </label>
                        <input type="text" name="empid"  placeholder="Enter the Employee Id" requird>

                        <label id="lbl">Name : </label>
                        <input type="text" name="name" placeholder="Enter the Full Name">

                        <label id="lbl"> Subject Code : </label>
                        <select name="subcode" requird >
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
                        <label id="lbl">Username : </label>
                        <input type="text" name="username" placeholder="Enter the Username" requird>
                        <label id="lbl">Password : </label>
                        <input type="password" name="password" placeholder="************"requird>

                        <label id="lbl">Mobile No : </label>
                        <input type="text" name="mobile" placeholder="" maxlength="10" requird>

                        <label id="lbl">Email Id : </label>
                        <input type="email" name="email" placeholder="Abc@gmail.com"requird>
                        <button  >Submit</button>

                    </form>
                </div>
                <div id="check-assignment" class="selectbutton">
                    
                </div>
            </div>
     </div>
</body>
</html>