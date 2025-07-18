<h1><u>REGISTRATION DETAILS</u></h1>
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

// Delete an registration
if(isset($_GET['delete'])){
    $reg_id = $_GET['delete'];

    $sql = "DELETE FROM registration WHERE REG_ID=$reg_id";

    if ($conn->query($sql) === TRUE) 
    {
        echo "registration deleted successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the "registration" table
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>REG_ID</th>
<th>FRST_NAME</th>
<th>LAST_NAME</th>
<th>AGE</th>
<th>DOB</th>
<th>BLOOD_GRP</th>
<th>GENDER</th>
<th>PER_ADD</th>
<th>ROOM</th>
<th>DATE</th>
<th>CONT_NO</th>
<th>EMAIL</th>
<th>OPERATION</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['REG_ID']. "</td>";
    echo "<td>" . $row['FRST_NAME']. "</td>";
    echo "<td>" . $row['LAST_NAME']. "</td>";
    echo "<td>" . $row['AGE']. "</td>";
    echo "<td>" . $row['DOB']. "</td>";
    echo "<td>" . $row['BLOOD_GRP']. "</td>";
    echo "<td>" . $row['GENDER']. "</td>";
    echo "<td>" . $row['PER_ADD']. "</td>";
    echo "<td>" . $row['ROOM']. "</td>";
    echo "<td>" . $row['DATE']. "</td>";
    echo "<td>" . $row['CONT_NO']. "</td>";
    echo "<td>" . $row['EMAIL']. "</td>";

    echo "<td> <center><a href='?delete=".$row['REG_ID']."'>Delete</a><center>";     
    echo "</tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
 <html><body>
 <link rel="stylesheet" href="main.css">
 <div class="sty">
 <a href="regiscreate.php">New Registration</a>
</div>
</body></html>

