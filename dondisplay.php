<h1><u>DONATION DETAILS</u></h1>
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
    $id = $_GET['delete'];

    $sql = "DELETE FROM donation WHERE ID=$id";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Donator deleted successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the "employees" table
$sql = "SELECT * FROM donation";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>FRST_NAME</th>
<th>LAST_NAME</th>
<th>ADDRESS</th>
<th>CONTACT_NO</th>
<th>EMAIL</th>
<th>DON_TYPE</th>
<th>DON_AMT</th>
<th>PAY_METHOD</th>
<th>RES_ID</th>
<th>UPI_ID</th>
<th>OPERATION</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['ID']. "</td>";
    echo "<td>" . $row['FRST_NAME']. "</td>";
    echo "<td>" . $row['LAST_NAME']. "</td>";
    echo "<td>" . $row['ADDRESS']. "</td>";
    echo "<td>" . $row['CONTACT_NO']. "</td>";
    echo "<td>" . $row['EMAIL']. "</td>";
    echo "<td>" . $row['DON_TYPE']. "</td>";
    echo "<td>" . $row['DON_AMT']. "</td>";
    echo "<td>" . $row['PAY_METHOD']. "</td>";
    echo "<td>" . $row['UPI_ID']. "</td>";
    echo "<td>" . $row['RES_ID']. "</td>";

    echo "<td> <center><a href='?delete=".$row['ID']."'>Delete</a><center>";     
    echo "</tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
 <html><body>
 <link rel="stylesheet" href="main.css">
 <div class="sty">
 <a href="doncreate.php">Add a new Donator</a>
</div>
</body></html>

