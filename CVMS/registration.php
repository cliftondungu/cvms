<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize the input
    $idNo = filter_var($_POST["idNo"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $idType = filter_input(INPUT_POST, 'idType', FILTER_SANITIZE_STRING);
    
   
    //Checking if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }
    
    // Hash the password for security
    
    // Insert the user into the database
    $stmt = $conn->prepare("INSERT INTO userdetails (idNo,email,fullname,phone,idType) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$idNo, $email, $fullname,$phone,$idType);

    if ($stmt->execute()) {
        header("location: registrationsuccess.php");
       
    } else {
        echo "Error Registering user, try again later: " . $conn->error;
    }
}
$conn->close();
?>
