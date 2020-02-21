<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Marks</title>
    <link rel="stylesheet" href="ViewMarks.css">
</head>
<body>
     <div id="bg"> 
         <div id="box">
        <form action="" method="POST">
            <label class="lbl">Assignment No</label>
            <select name="assno" id="AssNo"  required>
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br>
            <label class="lbl"> Subject Code</label>
            <select  name="subcode" id=subcode required>
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
            </select><br>
            <label class="lbl"> Enrollment</label>
            <input type="text" name="enrollment" placeholder="Enrollment" required> <br>
            <input type="submit" name="btnsearch" value="Search" >
        </form>
        
        </div>
            <div id="data">
                    <table>
                        <tr>
                            <th> Assignment No.</th>
                            <th> Subject Code</th>
                            <th>Student Name</th>
                            <th>Marks</th>
                            <th>Remarks</th>
                        </tr>
                        <?php
                        if(isset($_POST['btnsearch']))
                        {
                            include("connection.php");
                            $assno=$_POST['assno'];
                            $subcode=$_POST['subcode'];
                            $enrollment=$_POST['enrollment'];
                            session_start();
                            $sql="SELECT * FROM `Result` where Assingn_No='$assno' and Sub_Code='$subcode' and Enrollment='$enrollment' ";
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
                                    echo "<tr><td> ".$row["Assingn_No"]."</td><td> " .$row["Sub_Code"]."</td><td> " .$row["Name"]."</td><td> ".$row["Marks"]."</td><td> ".$row["Remarks"]."</td></tr> ";
                                   
                                
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
                            $enrollment=$_POST['enrollment'];
                            session_start();
                            $sql="SELECT * FROM `Result` where Assingn_No='$assno' and Sub_Code='$subcode' and Enrollment='$enrollment' ";
                            $result=mysqli_query($conn,$sql);
                             if(mysqli_num_rows($result) <= 0)
                                 {
                                     echo '<b style="color:Red;font-size:15px; margin: 45%;font-family:Montserrat ;"> Data Not Found </b> ';
     
                                 }
                        }
                    ?>
                </div>
         
    </div>  
</body>
</html>