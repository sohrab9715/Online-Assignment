<!DOCTYPE html>

<?php

      include("connection.php");
      session_start();
     // $rgst = $_SESSION['registration'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css"> 
<style>
.form-container
{
  border-radius: 5px;
  padding: 28px;
  margin-right:32%;
  margin-left:35%;
  margin-top:13%;
  width:25%;
  height: 220px;
  background-color: #f2f2f2;
}
input,select
{
  width :100%;
  height:35px; 
  padding:10px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
} 
#pop{
    width: 33%;
    background-color: #4CAF50;
    color: #f2f2f2;
    border: none;
    font-weight: bold;
    padding: 10px 15px;
    margin: 8px 0;
    border-radius: 4px;
    cursor: pointer;
    transition-duration: 0.7s;
}
</style>

   
</head>
<body >
<div class="form-container">
<form action="pwdupdate.php" method="post">
	
	 <div class="labels" id="" style= "margin-right: 37%">New Password</div>
	<input type="text" id = "user" placeholder="***********" name="npassword" style=" padding:10px 10px">
	
	<div class="labels" id="" style= "margin-right: 37%">Conform Password</div>
	<input type="password" id = "pwd" placeholder="***********" name="cpassword" style=" padding:10px 10px">
	<br>
	<input type="submit" id="pop" value="Submit">      
</form>
</div>
</body>
</html>