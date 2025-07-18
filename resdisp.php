<h1><u>RESIDENT DETAILS</u></h1>
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

// Get data from the "resident" table
$sql = "SELECT * FROM resident";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>RES_ID</th>
<th>NAME</th>
<th>DOB</th>
<th>ADDRESS</th>
<th>EMERG_NO</th>
<th>MEDI_HISTORY</th>
<th>REG_ID</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['RES_ID']. "</td>";
    echo "<td>" . $row['NAME']. "</td>";
    echo "<td>" . $row['DOB']. "</td>";
    echo "<td>" . $row['ADDRESS']. "</td>";
    echo "<td>" . $row['EMERG_NO']. "</td>";
    echo "<td>" . $row['MEDI_HISTORY']. "</td>";
    echo "<td>" . $row['REG_ID']. "</td>";   
    echo "</tr>";
}
echo "</table>";


// Close connection
$conn->close();
?>
 <html><body>
    <button><a href="donationform.html">HOME</a></button>
 <link rel="stylesheet" href="main.css">
</body></html>