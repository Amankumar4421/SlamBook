<?php
session_start();
// if (isset($_SESSION['SESSION_ID'])) {
//     header("Location: feedback.php");
//     die();
// }

include 'connect.php';
$msg = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $id = mysqli_real_escape_string($conn, $_POST['id']);
    // $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $id = $_POST['id'];
    $password = $_POST['password'];
    // echo $password;
    $_SESSION['reg'] = $id;

    $sql = "SELECT * FROM student WHERE regno='{$id}' AND pass='{$password}'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) === 1) {
        $_SESSION['SESSION_ID'] = $id;
        header("Location: checkdetails.php");
    } else {
        echo '<script>alert("Id and Password not matched")</script>';
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
        #reg {
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
                <span>Have an account?</span>
                <header><b>Login</b></header>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <input type="text" style="background-color:white;" class="input id" name="id" placeholder="Registration No"
                        required>
                </div>
                <div class="input-field">
                    <input type="password" style="background-color:white;" class="input password" name="password"
                        placeholder="Password" required>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" id="submit" value="Submit">
                </div>
            </form>

            <div class="bottom">
                <div class="left">
                    <label><a href="register.php">Register here</a></label>
                </div>
                <div class="right">
                    <label><a href="forgot-password.php">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

