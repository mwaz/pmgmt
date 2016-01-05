<?php
require 'db.php';
$db = init_db();
session_start();
$error = false;
if ($_POST) {
    $post = true;
    //Reads user inputs from form
    
    $password = $db->escape_string($_POST['pass']);
    $password = sha1($password);

    $user = decode_result(exec_sql("SELECT `userid`, `rank` FROM `users` WHERE `username`='$_SESSION[login]' 
    	AND `password`='$password'"));
    if (count($user) != 0) {
        $_SESSION['login'] = $username;
        header("location:police.php");





    ?>
<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police| 404 Error</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="lock-word animated fadeInDown">
    <span class="first-word">LOCKED</span><span>SCREEN</span>
</div>
    <div class="middle-box text-center lockscreen animated fadeInDown">
        <div>
            <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="police.jpg">
            </div>
            <h3></h3>
            <p>Your are in lock screen. Main app was shut down and you need to enter your password to go back to app.</p>
            <form class="m-t" role="form"  
            action="lock.php" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control" name ="pass" placeholder="******" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width">Unlock</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


</html>

