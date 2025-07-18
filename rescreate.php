<!DOCTYPE html> 
<html> 
    <head> 
        <title>Create Resident</title> 
        <style>
             body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 44px;
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
  
  label,th,td {
    color:darkgreen;
    display: block; /* Display labels on their own line */
    margin-bottom: 5px; /* Add space between labels and inputs */
    font-weight: bold; /* Make labels slightly bolder */
  }
  input[type="text"],
  input[type="date"]{
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
            <h2>Add a new Resident:</h2> 
            <?php $servername = "localhost"; 
            $username = "shrea"; 
            $password = "@shreya1215"; 
            $dbname = "oldagehome";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Add a new resident 
if(isset($_POST['submit'])){ 
    $res_id = $_POST['res_id']; 
    $name = $_POST['name']; 
    $dob = $_POST['dob']; 
    $address =$_POST['address'];
    $emerg_no = $_POST['emerg_no'];
    $medi_history =$_POST['medi_history']; 
    $reg_id =$_POST['reg_id']; 

$sql = "INSERT INTO resident (RES_ID, NAME, DOB, ADDRESS, EMERG_NO, MEDI_HISTORY, REG_ID) VALUES ('$res_id','$name', '$dob', '$address', '$emerg_no', '$medi_history', '$reg_id')";

if ($conn->query($sql) === TRUE) 
{ 
    echo "New resident added successfully!"; 
} else 
{ echo "Error: " . $sql . "<br>" . $conn->error; 
} 
}

// Close connection 
$conn->close(); 
?>

<!-- Create a new resident form --> 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>RES_ID:</label><br> 
<input type="text" name="res_id"><br> 
<div>
<table>
    <thead>
    <tr>
        <th>Last entered RES_ID:</th>

        </tr></thead>
        <tbody>
    <?php
    $con=mysqli_connect("localhost","shrea","@shreya1215","oldagehome");

    $query="SELECT * FROM resident ORDER BY RES_ID DESC LIMIT 1";
    $query_run=mysqli_query($con,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
        ?>
        
            <td><?=$row['RES_ID'];?></td>
           
        <?php
        
    }
}
    else
    {
        ?>
        <tr>
            <td colspan="1" >No record found></td>
        </tr>
        <?php
    }
    ?>
        </tbody>
</table>
</div><br>
<label>NAME:</label><br> 
<input type="text" name="name"><br> 
<label>DOB:</label><br> 
<input type="date" name="dob"><br> 
<label>ADDRESS:</label><br> 
<input type="text" name="address"><br> 
<label>EMERG_NO:</label><br> 
<input type="text" name="emerg_no"><br> 
<label>MEDI_HISTORY:</label><br> 
<input type="text" name="medi_history"><br> 
<label>REG_ID:</label><br> 
<input type="text" name="reg_id"><br> 
<label>Check for registered people present at oldagehome:
        <button><a href="http://localhost:3000/regis.php">CHECK</a></button></p></label>

<input type="submit" name="submit" value="Add">
</form> 
</body> 
</html>