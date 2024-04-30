<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate email
if(isset($_POST['submit'])){
    $email = $_POST['email'];

    // SQL query to check if email exists in the database
    $sql = "SELECT * FROM haitatsu WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Enter your Date of Birth as OTP')</script>";
        header("Location: otp_page.php");
        exit();
    } else {
        echo "<script>alert('Please enter correct details.')</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Validation</title>
</head>
<body>
    <form method="post" action="">
        <label for="email">Enter Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
