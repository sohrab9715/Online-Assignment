<!DOCTYPE html>
<?php
	include ("connection.php");
	session_start();
	$num =$_POST['mobile'];
	$sql = "SELECT * FROM Student_Registration WHERE mobile='$num'";
	$result = $conn->query($sql);
	if ($result->num_rows >0 )
	{
		$rgst = $result->fetch_assoc();          //Feching the Registration number of this registerd mobile number
		$_SESSION['enrollment']=$rgst['enrollment'];
	}
?>
<html>
<head>
	<title>Send SMS</title>
<link href="index.css" type="text/css" rel="stylesheet" />
	
</head>

<body>

		<?php
		
			if(isset($_POST['sendopt']))
			{
				require_once("connection.php");
				$numbers =array($_POST['mobile']);
				$num =$_POST['mobile'];
				//for check the mobile number registerd or not.
				$sql = "SELECT * FROM Student_Registration WHERE mobile='$num'";
				 $check = $conn->query($sql);
			
				if ( !$check->num_rows == 1 ) 
				{
		
						echo '<script language = "javascript">alert("This Mobile Number is Not registerd.........");</script>';
						header('Refresh: 0;url=Forget_Page.php');
		
				}
				
				else
				{

					require('textlocal.class.php');
					require('credential.php');
					$textlocal = new Textlocal(false, false, API_KEY);
					$sender = 'TXTLCL';
					$otp = mt_rand(10000, 99999);
					$message = "Your OTP of online assignment submission for Reset Password is:- " . $otp.".Please Don't share this code with others";
					try 
					{
						$result = $textlocal->sendSms($numbers, $message, $sender);
						setcookie('otp', $otp);
						echo '<script language = "javascript">alert("OTP send Successfully......");</script>';
					} 
					catch (Exception $e) 
					{
						die('Error: ' . $e->getMessage());
					}
				}
			}

			if(isset($_POST['verifyotp'])) 
			{ 
				$otp = $_POST['otp'];
				if($_COOKIE['otp'] == $otp) 
				{
					
					header("location:NPasswordPage.php");
				} 
				else 
				{
						echo '<script language = "javascript">alert("Please enter the currect OTP.....");</script>';
						header('Refresh: 0;url=Forget_Page.php');
				}
			}
		?>
		
 <div id="form">  
        <form role="form" method="post" enctype="multipart/form-data" >
           
            <div class="row">
                <div class="col-sm-9 form-group">
					
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10" placeholder="Enter Registerd Number" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendopt" id="pop" class="btn btn-lg btn-success btn-block">Send OTP</button>
                </div>
            </div>
			
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required="">
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="verifyotp" id="pop"class="btn btn-lg btn-info btn-block">Verify</button>
                </div>
            </div>
        </form>
	
</div>
</body>
</html>