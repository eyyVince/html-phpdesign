<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "user_data";

    $con = mysqli_connect($host, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <img src="assets/img/login-bg.png" alt="image" class="login__bg">
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        button { padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p>User Dashboard</p>

<br>
<button onclick="window.location.href='index.php'">Logout</button>

</body>
</html>

<?php mysqli_close($con); ?>
