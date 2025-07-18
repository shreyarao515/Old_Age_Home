<!DOCTYPE html>
<html>
<head>
    <title>Create Donation</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background: linear-gradient(to bottom, #90EE90, #008B00); /* Green gradient */
    color: white; /* Text color for contrast with the gradient */
  }
  h2{
    text-align:center;
  }
  form {
    background-color: #fff; /* White background for the form itself */
    border-radius: 5px; /* Rounded corners for the form */
    padding: 20px; /* Padding for spacing within the form */
    margin: 0 auto; /* Center the form horizontally */
    max-width: 500px; /* Set a maximum width for responsiveness */
  }
  
  label {
    color:darkgreen;
    display: block; /* Display labels on their own line */
    margin-bottom: 5px; /* Add space between labels and inputs */
    font-weight: bold; /* Make labels slightly bolder */
  }
  
  input[type="text"],
  input[type="email"],
  input[type="number"] {
    width: 100%; /* Make input fields full width */
    padding: 10px; /* Add padding for better user experience */
    border: 1px solid #ccc; /* Light border for inputs */
    border-radius: 3px; /* Rounded corners for inputs */
    box-sizing: border-box; /* Include padding in input width calculation */
  }

  input[type="submit"] {
    background-color: #4CAF50; /* Green color for submit button */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px; /* Rounded corners for the button */
    cursor: pointer; /* Indicate clickable behavior on hover */
    transition: background-color 0.2s ease-in-out; /* Smooth transition effect */
  }
  
  input[type="submit"]:hover {
    background-color: #3e8e41; /* Darker green for hover effect */
  }
  </style>
</head>
<body>    
<h2>Add a new Donator:</h2>
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

// Add a new caregiver
if(isset($_POST['submit'])){
    $frst_name = $_POST['frst_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $email= $_POST['email'];
    $don_type = $_POST['don_type'];
    $don_amt = $_POST['don_amt'];
    $pay_method = $_POST['pay_method'];
    $res_id = $_POST['res_id'];


    $sql = "INSERT INTO donation (FRST_NAME,LAST_NAME,ADDRESS,CONTACT_NO,EMAIL,DON_TYPE,DON_AMT,PAY_METHOD,RES_ID) VALUES ('$frst_name','$last_name','
    $address', '$contact_no', '$email','$don_type','$don_amt','$pay_method','$res_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New donator added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!-- Create a new caregiver form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label>FRST_NAME:</label><br>
    <input type="text" name="frst_name"><br>
    <label>LAST_NAME:</label><br>
    <input type="text" name="last_name"><br>
    <label>ADDRESS:</label><br>
    <input type="text" name="address"><br>
    <label>CONTACT_NO:</label><br>
    <input type="text" name="contact_no"><br>
    <label>EMAIL:</label><br>
    <input type="text" name="email"><br>
    <label>DON_TYPE:<br>
    <select name="don_type">
                <option value=" "></option>
                <option value="Basic neccessities">Basic neccessities</option>
                <option value="Money">Money</option>
                <option value="Medical requirements">Medical requirements</option>
            </select></label><br>
    <label>DON_AMT:</label><br>
    <input type="text" name="don_amt"><br>
    <label>PAY_METHOD:</label><br>
    <select name="pay_method">
                        <option value=" "></option>
                        <option value="Cash Donation">Cash Donation</option>
                        <option value="Card">Credit/Debit Card Donation</option>
                        <option value="cheque">Cheque Donation</option>
                        <option value="UPI">UPI</option>
                    </select><br><br>
    <label>UPI_ID(if paid online):</label>
    <input type ="text" name="upi_id"><br><br>
    <label>RES_ID:</label><br>
    <input type="text" name="res_id"><br>
    <label>Check for the residents present in the oldagehome:
        <button><a href="http://localhost:3000/resdisp.php">CHECK</a></button></p></label>
    <input type="submit" name="submit" value="Add">
</form>
</body>
</html>
