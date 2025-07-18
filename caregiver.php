<h1><u>CAREGIVER DETAILS</u></h1>
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

// Delete an caregiver
if(isset($_GET['delete'])){
    $care_id = $_GET['delete'];

    $sql = "DELETE FROM caregiver WHERE CARE_ID=$care_id";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Caregiver deleted successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the "caregiver" table
$sql = "SELECT * FROM caregiver";
$result = $conn->query($sql);
echo "<table border='2'>
<tr>
<th>CARE_ID</th>
<th>CARE_NAME</th>
<th>CONTACT_NO</th>
<th>ROLE</th>
<th>RES_ID</th>
<th>OPERATION</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['CARE_ID']. "</td>";
    echo "<td>" . $row['CARE_NAME']. "</td>";
    echo "<td>" . $row['CONTACT_NO']. "</td>";
    echo "<td>" . $row['ROLE']. "</td>";
    echo "<td>" . $row['RES_ID']. "</td>";
    echo "<td> <center><a href='?delete=".$row['CARE_ID']."'>Delete</a><center>";     
    echo "</tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
 <html>
<body>
 <link rel="stylesheet" href="main.css">
 <div class="sty">
 <a href="carcreate.php">Add a new caregiver</a>
</div>
</body></html>

