<?php
$insert=false;
if(isset($_POST['name'])){
//set connection variable

  $server="localhost";
  $username="root";
  $passward="";
//create a database connection
$con= mysqli_connect($server,$username,$passward);
//check for conection success
if(!$con){
    die("connection to this data base failed due to" .
    mysqli_connect_error());
}
// Echo "success conection to the db";

//collect post variables
$Name = ($_POST['name']);
$Age =  ($_POST['age']);
$Gender = ($_POST['gender']);
$Email = ($_POST['email']);
$Phone = ($_POST['phone']);
$Desc = ($_POST['desc']);

$sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Desc`, `dt`)
 VALUES ('$Name','$Age','$Gender','$Email','$Phone','$Desc',current_timestamp());";
//Execute the quary
if($con->query ($sql) == true){
   // echo "Successfully inserted";
   //flag for sucessful insertion
   $insert=true;
}
else{
    echo "ERROR:" .$sql .$con-> error;
}

//close the database connection
$con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to trip form</title>
</head>
<body>
    <img src="vv.jpg" alt="NSIT">
    <div class="container">
    <h3>Welcome to NSIT DELHI U.S Trip Form</h3>
    <p>Enter Your Details and submit this form to confirm your participation in the trip </p>
    <?php
    if($insert== true){
    echo "<p class='submitmsg'>Thanks for submiting your form. </p>";
    }
     ?>   
    </div>
    <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter Your Name" >
    <input type="text" name="age" id="age" placeholder="Enter Your Age">
    <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
    <input type="text" name="email" id="email" placeholder="Enter Your Email id">
    <input type="text" name="phone" id="phone" placeholder="Enter your Phone no">
    <textarea name="desc" id="desc" cols="30" rows="10"
    placeholder="Enter Other information Here"></textarea>
    <button class="btn">Submit</button>
</form>

</body>
</html>