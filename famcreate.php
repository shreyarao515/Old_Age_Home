<!DOCTYPE html>
<html>
<head>
    <title>Create Family</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 85px;
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
  
  label,TH,TD{
    color:darkgreen;
    display: block; /* Display labels on their own line */
    margin-bottom: 5px; /* Add space between labels and inputs */
    font-weight: bold; /* Make labels slightly bolder */
  }
  input[type="text"] {
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
<h2>Add a new Family:</h2>
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

// Add a new family
if(isset($_POST['submit'])){
    $fam_id = $_POST['fam_id'];
    $res_id = $_POST['res_id'];
    $name = $_POST['name'];
    $relation = $_POST['relation'];
    $contact_no = $_POST['contact_no'];

    $sql = "INSERT INTO family(FAM_ID, RES_ID, NAME, RELATION, CONTACT_NO) VALUES ('$fam_id','$res_id', '$name', '$relation', '$contact_no')";

    if ($conn->query($sql) === TRUE) {
        echo "New family added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!-- Create a new family form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label>FAM_ID:</label><br>
    <input type="text" name="fam_id"><br>

    <div>
<table>
    <thead>
    <tr>
        <th>Last entered FAM_ID:</th>

        </tr></thead>
        <tbody>
    <?php
    $con=mysqli_connect("localhost","shrea","@shreya1215","oldagehome");

    $query="SELECT * FROM family ORDER BY FAM_ID DESC LIMIT 1";
    $query_run=mysqli_query($con,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
        ?>
        
            <td><?=$row['FAM_ID'];?></td>
           
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
    <label>RES_ID:</label><br>
    <input type="text" name="res_id"><br>
    <label>Check for the residents present in the oldagehome:
        <button><a href="http://localhost:3000/resdisp.php">CHECK</a></button></p></label>
    <label>NAME:</label><br>
    <input type="text" name="name"><br>
    <label>RELATION:</label><br>
    <input type="text" name="relation"><br>
    <label>CONTACT_NO:</label><br>
    <input type="text" name="contact_no"><br>
    <input type="submit" name="submit" value="Add">
</form>
</body>
</html>
