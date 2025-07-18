<h1><u>FAMILY DETAILS</u></h1>
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

// Delete an family
if(isset($_GET['delete'])){
    $fam_id = $_GET['delete'];
    $sql = "DELETE FROM family WHERE FAM_ID=$fam_id";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Family deleted successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the "family" table
$sql = "SELECT * FROM family";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>FAM_ID</th>
<th>RES_ID</th>
<th>NAME</th>
<th>RELATION</th>
<th>CONTACT_NO</th>
<th>OPERATION</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['FAM_ID']. "</td>";
    echo "<td>" . $row['RES_ID']. "</td>";
    echo "<td>" . $row['NAME']. "</td>";
    echo "<td>" . $row['RELATION']. "</td>";
    echo "<td>" . $row['CONTACT_NO']. "</td>";
    echo "<td> <center><a href='?delete=".$row['FAM_ID']."'>Delete</a><center>";     
    echo "</tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
 <html><body>
 <link rel="stylesheet" href="main.css">
 <div class="sty">
 <a href="famcreate.php">Add a new Family</a>
</div>
</body></html>

