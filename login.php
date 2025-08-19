<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; // default XAMPP password is empty
$dbname = "fashion_stylist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and bind (check name, email, and password)
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND email = ? AND password = ?");
    $stmt->bind_param("sss", $name, $email, $password); // s = string

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid name, email, or password!";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-box">
        <h2>Login</h2>
        <p class="subtitle">Welcome back! Please fill in your details.</p>

        <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="register-text">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</body>
</html>
