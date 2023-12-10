<?php

session_start();
// if (isset($_SESSION['SESSION_ID'])) {
//     header("Location: feedback.php");
//     die();
// }

include 'connect.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $regno = $_POST['regno'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $result = mysqli_query($conn, "SELECT * FROM student WHERE regno='{$regno}'");
    if (mysqli_num_rows($result) > 0) {
        if ($password == $password2) {
            $query = mysqli_query($conn, "UPDATE student SET pass='{$password}' WHERE regno='{$regno}'");
            echo '<script>alert("Password changed successfully.")</script>';
        } else {
            echo '<script>alert("Passwords not matched.")</script>';
        }
    } else {
        echo '<script>alert("Please Enter Correct Registration Number")</script></div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="stylesheet" href="css/text.css">
    <title>Vignan University::Vadlamudi</title>
    <style>
        #log {
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="heading">
        <img id="logo" src="logo.png" alt="">
        <img id="accl" src="accloads.png" alt="">
    </div>
    <div class="welcome">
        <h1 class="stylish-text" style="font-size:50px;">Slam Book</h1>
    </div>
    <div class="box">
        <div class="avt">
            <img style="border-radius: 50%;" src="avt.png" alt="">
        </div>
        <div class="container">
            <div class="top-header">
                <header><b>Reset Password</b></header>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <input style="background-color:white;" type="text" class="input email" name="regno"
                        placeholder="Registration No" required>
                </div>
                <div class="input-field">
                    <input style="background-color:white;" type="password" class="input password" name="password"
                        placeholder="Enter New Password" required>
                </div>
                <div class="input-field">
                    <input style="background-color:white;" type="password" class="input password" name="password2"
                        placeholder="Re-Enter Password" required>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" id="submit" value="Submit">
                </div>
            </form>

            <div class="bottom" style="justify-content: end; margin-bottom: 10px;">
                <label>Back to <a href="index.php">Login</a></label>
            </div>
        </div>
    </div>
</body>
</html>