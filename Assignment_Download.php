<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
 #data
{
    min-width: 80%;
    margin-left: 22%;
    margin-top: 10px;
    
}
table
{
    
    text-align: center;
    font-family: sans-serif;
    font-size: 12px;
    border-collapse: collapse;
    min-width: 70%;
  
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
        <div id="heading">
          <h2><center>List of Assignment</center</h2> 
            <hr>
        </div>
        <div id="data">
            <table>
                <tr>
                   <th>Assignment No</th>
                    <th>Subject Code</th>
                    <th>Last Date</th>
                    <th>Download</th>
                </tr>
                <?php
                    include("connection.php");
                    session_start();
                    $sql="SELECT * FROM `Teacher_Upload_Assign`";
                    $result=mysqli_query($conn,$sql);
                
                    
                        while($row=mysqli_fetch_array($result))
                        {
                           
                             // echo "<tr><td> ".$row["SubCode"]."</td><td> ".$row["File"]."</td><td> ".$row["LastDate"]."</td></tr> ";
                              echo "<tr><td> ".$row["AssignNo"]."</td><td> ".$row["SubCode"]."</td><td> " .$row["LastDate"]."</td><td> "
                              ?><a target="_blank" href="Teacher_Assignment/<?php echo $row['File'] ?>">  <?php echo $row['File'];?></a><?php
                              "</td></tr> ";
                        
                        
                        }
                     /*   ?>  <br> <br> <a target="_blank" href="Teacher_Assignment/<?php echo $row['File'] ?> "> <?php echo $row['File'];?></a><?php*/
                     ?>
            </table>
        </div>
</body>
</html>
