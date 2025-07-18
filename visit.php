<h1><u>VISIT DETAILS</u></h1>
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

// Delete a visitor
if(isset($_GET['delete'])){
    $visitor_id = $_GET['delete'];
    $sql = "DELETE FROM visit WHERE VISITOR_ID=$visitor_id";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Visitor deleted successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the "visitor" table
$sql = "SELECT * FROM visit";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>VISITOR_ID</th>
<th>RES_ID</th>
<th>NAME</th>
<th>VISIT_DATE</th>
<th>VISIT_TIME</th>
<th>PURPOSE</th>
<th>OPERATION</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['VISITOR_ID']. "</td>";
    echo "<td>" . $row['RES_ID']. "</td>";
    echo "<td>" . $row['NAME']. "</td>";
    echo "<td>" . $row['VISIT_DATE']. "</td>";
    echo "<td>" . $row['VISIT_TIME']. "</td>";
    echo "<td>" . $row['PURPOSE']. "</td>";
    echo "<td> <center><a href='?delete=".$row['VISITOR_ID']."'>Delete</a><center>";     
    echo "</tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
 <html><body>
 <link rel="stylesheet" href="main.css">
 <div class="sty">
 <a href="viscreate.php">Add a new Visitor</a>
</div>
</body></html>