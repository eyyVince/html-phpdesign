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
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body class="dashboard">
    <img src="assets/img/login-bg.png" class="dashboard-bg" alt="background">
<h2 style="font-family: Arial; color: black;">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<h2 style="font-family: Arial; color: black;">User Dashboard</h2>

<br>
<button onclick="window.location.href='index.php'">Logout</button>

</body>
</html>

<?php mysqli_close($con); ?>
