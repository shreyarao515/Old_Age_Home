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

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$method = $_POST['method'];
$amount = $_POST['amount'];
$pay = $_POST['pay'];
$upi_id = $_POST['upi_id'];
$res_id = $_POST['res_id'];

// Prepare the insert statement
$stmt = $conn->prepare("INSERT INTO donation (frst_name, last_name, address, contact_no, email, don_type, don_amt, pay_method,upi_id,res_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
$stmt->bind_param("sssississi", $firstname, $lastname, $address, $contact, $email, $method, $amount, $pay, $upi_id, $res_id);

if ($stmt->execute()) 
    echo '<script>alert("Your response has been recorded");</script>';
 else
    echo "Error: " . $stmt->error;


$stmt->close();
$conn->close();
?>