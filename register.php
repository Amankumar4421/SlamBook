<?php

    session_start();
    // if (isset($_SESSION['SESSION_ID'])) {
    //     header("Location: index1.php");
    //     die();
    // }

    include 'connect.php';
    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        // $passing_year = $_POST['passing_year'];

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM student WHERE email='{$email}' OR regno='{$id}'")) > 0) {
            echo '<script>alert("User already exists.")</script>';
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO student  VALUES ('{$id}','{$name}', '{$email}', '{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";
                    
                    echo "</div>";
                    echo '<script>alert("Registration done successfully.")</script>';
                } else {
                    echo '<script>alert("Something went wrong.")</script>';
                }
            } else {
                echo '<script>alert("Passwords not matched.")</script>';
            }
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
        /* #log{
            text-decoration: none;
            text-align: center;
        } */
        #pyear{
            margin-left: 20px;
            width: 60px;
            text-align: center;
        }
        .select{
            display: flex;
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
                <header><b>Register here</b></header>
            </div>
            <form action="" method="post">
            <div class="input-field">
                <input style="background-color:white;" type="text" class="input id" name="id" placeholder="Registration No" required>
            </div>
            <div class="input-field">
                <input style="background-color:white;" type="text" class="input name" name="name" placeholder="Enter your Name" required>
            </div>
            <div class="input-field">
                <input style="background-color:white;" type="text" class="input email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="input-field">
                <input style="background-color:white;" type="password" class="input password" name="password" placeholder="Enter New Password" required>
            </div>
            <div class="input-field">
                <input style="background-color:white;" type="password" class="input confirm-password" name="confirm-password" placeholder="Re-Enter Password" required>
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