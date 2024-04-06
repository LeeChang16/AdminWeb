<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "pest";
$password = "";
$dbname = "pestelens";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// **Capture form data using $_POST and $_FILES**
$id = $_POST["pest_id"];;
$pest_image = $_FILES["pest_image"]["name"]; // Access uploaded file information
$pest_name = $_POST["pest_name"];
$scientific_name = $_POST["scientific_name"];
$order = $_POST["order"];
$family = $_POST["family"];
$description = $_POST["description"];
$intervention = $_POST["intervention"];

// Rest of your PHP script for processing data and database interaction..




$sql = "INSERT INTO pestinformation (Id, Name, ScientificName, PestOrder, PestFamily, Description, Intervention)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql); // Prepare the statement

// Bind parameters for security (replace with actual data variables)
mysqli_stmt_bind_param($stmt, "sssssss", $id, $pest_name, $scientific_name, $order, $family, $description, $intervention);

if (mysqli_stmt_execute($stmt)) {
    echo "New record inserted successfully!";
    header("Location: index.html"); // Redirect to insert.html after success
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  ?>


?>


