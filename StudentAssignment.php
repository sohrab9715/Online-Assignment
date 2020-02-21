<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment List</title>
<style>
 #data
{
    min-width: 80%;
    margin-left: 12%;
    margin-top: 10px;
}
#box
{
    width: 50%;
    margin-left: 21%;
    margin-top: 10px;
    padding:11px 22px;
    border: 1px solid;
    align-items: center;
    margin-bottom: 10px;
}
#box select
{
    margin-top: 10px;
    width: 150px;
    height: 28px;
    border-radius: 4px;
    padding-left: 30px;
}
#box input[type=submit]
{
   height: 30px;
   width: 76px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    border: none;
    margin-left: 10px;

}
#box input[type=submit]:hover
{
    background-color:rgb(3, 250, 12);
    color:white;
    cursor: pointer;
}
#lbl
{
    padding-left: 30px;
    padding-top: 5px;
    font-size: 14px;
    font-family:'Montserrat';
}
table
{
    
    text-align: center;
    font-family: sans-serif;
    font-size: 12px;
    border-collapse: collapse;
    min-width: 80%;
  
}
th
{
    background-color: #62a5c4;
    font-size: 13px;
    color: white;
    height: 30px;
    font-weight: 100;
  
}
a{
    text-decoration: none;
}
td
{
    height: 30px;
}
tr:nth-child(odd)
{
    background-color: #dadada;
    height: 30px;
}

    </style>
</head>
<body>
    <div id="box">
        <form action="" method="POST">
            <label id="lbl">Assignment No</label>
            <select name="assno" id="AssNo">
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label id="lbl"> Subject Code</label>
            <select  name="subcode" id=subcode>
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
            <input type="submit" name="btnsearch" value="Search" >
        </form>
        
    </div>
            <div id="data">
                <table>
                    <tr>
                        <th> Assignment No.</th>
                        <th> Subject Code</th>
                        <th>Enrollment No</th>
                        <th>Student Name</th>
                        <th>Assignment</th>
                    </tr>
                    <?php
                    if(isset($_POST['btnsearch']))
                    {
                        include("connection.php");
                        $assno=$_POST['assno'];
                        $subcode=$_POST['subcode'];
                        session_start();
                        $sql="SELECT * FROM `Student_Upload_Assign` where Assign_No='$assno' and Subject_Code='$subcode'";
                        $result=mysqli_query($conn,$sql);
                       /* if(mysqli_num_rows($result) <= 0)
                            {
                                echo '<b style="color:Red;font-size:12px;font-family:Montserrat ;"> Data Not Found </b> ';

                            } 
                            else 
                            {*/
                            while($row=mysqli_fetch_array($result))
                            {
                            
                                // echo "<tr><td> ".$row["SubCode"]."</td><td> ".$row["File"]."</td><td> ".$row["LastDate"]."</td></tr> ";
                                echo "<tr><td> ".$row["Assign_No"]."</td><td> " .$row["Subject_Code"]."</td><td> " .$row["Enrollment"]."</td><td> ".$row["Name"]."</td><td> "
                                ?><a target="_blank" href="Student_Assignment/<?php echo $row['File'] ?>">  <?php echo $row['File'];?></a><?php
                                "</td></tr> ";
                               
                            
                            }
                    
                                                   

                       
                    } 
    
                    ?>
                   
                </table>
               
            </div>
            <div>
                <?php
                     if(isset($_POST['btnsearch']))
                     {
                         include("connection.php");
                         $assno=$_POST['assno'];
                         $subcode=$_POST['subcode'];
                         session_start();
                         $sql="SELECT * FROM `Student_Upload_Assign` where Assign_No='$assno' and Subject_Code='$subcode'";
                         $result=mysqli_query($conn,$sql);
                         if(mysqli_num_rows($result) <= 0)
                             {
                                 echo '<b style="color:Red;font-size:15px; margin: 45%;font-family:Montserrat ;"> Data Not Found </b> ';
 
                             }
                    }
                ?>
            </div>
            
          
</body>
</html>