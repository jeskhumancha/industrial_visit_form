<?php
$insert=FALSE;
if(isset($_POST['name']))
{
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if((!$con)==true)
    {
        die("connecting to this database fail due to".mysqli_connect_error());
    }
    // echo"connected to the DB successfully";

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $course=$_POST['course'];
    $semester=$_POST['semester'];
    $ind_type=$_POST['ind_type'];
    $pr_name=$_POST['pr_name'];
    $pr_guide=$_POST['pr_guide'];
    $other=$_POST['other'];

    $sql="INSERT INTO `college`.`ind_visit` (`name`, `email`, `contact`, `course`, `semester`, `ind_type`, `pr_name`, `pr_guide`, `other`, `dt`) 
    VALUES ('$name', '$email', '$contact', '$course', '$semester', '$ind_type', '$pr_name', '$pr_guide', '$other', current_timestamp())";
    // echo $sql;
    if($con->query($sql)==true)
    {
        // echo"Data inserted successfully";
        $insert=TRUE;
    }
    else{
        echo"Error:$sql <br>$con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Visit Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="MU.jpg" alt="Backgroung Image">
    <div class="container"> 
        <h2>INDUSTRIAL VISIT FORM FOR FINAL YEAR STUDENTS</h2>
        <p>Fill your details and submit the form to confirm your participation in this visit.</p>
        <?php
        if ($insert==TRUE){
        echo"<p class='submitmsg'>Thank you for submitting your form. 
        we will record your details and inform you about the schedule and industry's details shortly.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="contact" id="contact" placeholder="Enter your contact">
            <input type="text" name="course" id="course" placeholder="Enter your course name">
            <input type="text" name="semester" id="semester" placeholder="Enter your semester name">
            <input type="text" name="ind_type" id="ind_type" placeholder="Enter your prefer industrial type">
            <input type="text" name="pr_name" id="pr_name" placeholder="Enter your final project name">
            <input type="text" name="pr_guide" id="pr_guide" placeholder="Enter your project guide name">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter your any other information here"></textarea>
            <button class="btn">submit</button>
        </form>
        
    </div>
   <script src="index.js"></script>
</body>
</html>