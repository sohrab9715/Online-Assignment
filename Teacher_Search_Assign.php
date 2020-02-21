<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="DownAsiign.css">
</head>
<body>
        <div id="heading">
          <h1>List of Assignment</h1> 
            <hr>
        </div>
        <div id="data">
            <table>
                <tr>
                    <th>Assignment No.</th>
                    <th>Subject Code</th>
                    <th>Enrollment No</th>
                    <th>Student Name</th>
                    <th>View Assignment</th>
                </tr>
                <?php
                    include("connection.php");
                    $assno=$_POST['assno'];
                    $subcode=$_POST['subcode'];
                    session_start();
                    $sql="SELECT * FROM `Student_Upload_Assign`";
                    $result=mysqli_query($conn,$sql);
                
                    
                        while($row=mysqli_fetch_array($result))
                        {
                           
                             // echo "<tr><td> ".$row["SubCode"]."</td><td> ".$row["File"]."</td><td> ".$row["LastDate"]."</td></tr> ";
                              echo "<tr><td> ".$row["Assign_No"]."</td><td> " .$row["Subject_Code"]."</td><td> " .$row["Enrollment"]."</td><td> ".$row["Name"]."</td><td> "
                              ?><a target="_blank" href="Student_Assignment/<?php echo $row['File'] ?>">  <?php echo $row['File'];?></a><?php
                              "</td></tr> ";
                        
                        
                        }
                     /*   ?>  <br> <br> <a target="_blank" href="Teacher_Assignment/<?php echo $row['File'] ?> "> <?php echo $row['File'];?></a><?php*/
                    
                ?>
            </table>
        </div>
</body>
</html>
