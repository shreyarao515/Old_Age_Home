<!DOCTYPE html>
<html>
<head>
    <title>Create Registration</title>
    <style>
             body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 25px;
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
    margin:auto; /* Center the form horizontally */
    max-width: 500px; /* Set a maximum width for responsiveness */
  }
  
  label,th,td {
    color:darkgreen;
    display: block; /* Display labels on their own line */
    margin-bottom: 2px; /* Add space between labels and inputs */
    font-weight: bold; /* Make labels slightly bolder */
  }
  input[type="text"],
  input[type="date"]{
     width: 100%; /* Make input fields full width */
    padding: 3px; /* Add padding for better user experience */
    border: 1px solid #ccc; /* Light border for inputs */
    border-radius: 3px; /* Rounded corners for inputs */
    box-sizing: border-box; /* Include padding in input width calculation */
  }
  input[type="radio"]{
     width: 8%; /* Make input fields full width */
    padding: 5px; /* Add padding for better user experience */
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
<h2>New Registration :</h2>
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

// Add a new registration
if(isset($_POST['submit'])){
    $reg_id = $_POST['reg_id'];
    $frst_name = $_POST['frst_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $blood_grp= $_POST['blood_grp'];
    $gender = $_POST['gender'];
    $per_add = $_POST['per_add'];
    $room = $_POST['room'];
    $date = $_POST['date'];
    $cont_no = $_POST['cont_no'];
    $email = $_POST['email'];


    $sql = "INSERT INTO registration(REG_ID,FRST_NAME,LAST_NAME,AGE,DOB,BLOOD_GRP,GENDER,PER_ADD,ROOM,DATE,CONT_NO,EMAIL) VALUES ('$reg_id','$frst_name','$last_name','$age', '$dob', '$blood_grp','$gender','$per_add','$room','$date','$cont_no','$email')";
    if ($conn->query($sql) === TRUE) {
        echo "New registration added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!-- Create a new registration form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label>REG_ID:</label><br>
    <input type="text" name="reg_id"><br>

    <div>
<table>
    <thead>
    <tr>
        <th>Last entered REG_ID:</th>

        </tr></thead>
        <tbody>
    <?php
    $con=mysqli_connect("localhost","shrea","@shreya1215","oldagehome");

    $query="SELECT * FROM registration ORDER BY REG_ID DESC LIMIT 1";
    $query_run=mysqli_query($con,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
        ?>
        
            <td><?=$row['REG_ID'];?></td>
           
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
    <label>FRST_NAME:</label><br>
    <input type="text" name="frst_name"><br>
    <label>LAST_NAME:</label><br>
    <input type="text" name="last_name"><br>
    <label>AGE:</label><br>
    <input type="text" name="age"><br>
    <label>DOB:</label><br>
    <input type="date" name="dob"><br>
    <label>BLOOD GROUP:</label><br>
    <input type="text" name="blood_grp"><br>
    <label>GENDER:</label><br>
    <label for="MALE">MALE</label>
    <input type="radio" id="male" name="gender" value="MALE" required>
    <label for="FEMALE">FEMALE</label>
    <input type="radio" id="female" name="gender" value="FEMALE" required><br><br>
    <label>PERMANENT ADDRESS:</label><br>
    <input type="text" name="per_add"><br>

<label>SELECT ROOM:</label><br>
<select name="room" required>
<option value=""></option>
<option value="Attached">Attached</option>
<option value="Non attached">Non attached</option>
</select><br>


    <label>DATE:</label><br>
    <input type="date" name="date"><br>
    <label>CONT_NO:</label><br>
    <input type="text" name="cont_no"><br>
    <label>EMAIL:</label><br>
    <input type="text" name="email"><br>

    <input type="submit" name="submit" value="Add">
</form>
</body>
</html>
