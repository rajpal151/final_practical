<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";
$db = "contest";
$conn = mysqli_connect($server, $username,$password,$db);

if(!$conn){
    die("Connection to this database failed due to ". mysqli_connect_error());
}
//echo "Success connecting to the DB";
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mob = $_POST['mob'];

    $sql = "INSERT INTO contest(`name`, `dob`, `gender`, `mob`) VALUES('$name','$dob','$gender','$mob');";
    if($conn->query($sql)==true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();
}
?>

<html>
<head>
  <link rel="stylesheet" href="form.css" />
  <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@200&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
     <h3> Welcome to the Chandigarh University</h3>
     <p>Enter your details to get enrolled in course</p>
     <?php
     if($insert == true){
     echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you participating in this contest</p>";
     }
?>

     <form method="post" action="form.php">
         <input type="text" name="name" placeholder="Enter your name">
         <input type="date" name="dob" placeholder="Enter DOB">
         <input type="text" name="gender" placeholder="Enter Gender">
         <input type="number" name="mob" placeholder="Mobile Number">
         <button class="btn">Submit</button>
         

     </form>

    </div>  
    <script src="form.js">

    </script>
</body>
</html>