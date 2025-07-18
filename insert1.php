<?php
$servername = "localhost";
$username = "shrea";
$password = "@shreya1215";
$dbname = "oldagehome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from HTML form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$bgroup = $_POST['bgroup'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$room = $_POST['room'];
$date = $_POST['date'];
$cont_no = $_POST['cont_no'];
$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registration (frst_name, last_name, age, dob, blood_grp, gender, per_add, room, date, cont_no, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissssssss",$fname, $lname, $age, $dob, $bgroup, $gender, $address, $room, $date, $cont_no, $email);

if ($stmt->execute()) 
    echo '<script>alert("Your response has been recorded");</script>';
 else
    echo "Error: " . $stmt->error;

$stmt->close();
$conn->close();
?>