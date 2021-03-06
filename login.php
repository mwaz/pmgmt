<?php
require 'db.php';
$db = init_db();
session_start();

$error = false;
if ($_POST) {

    if (@$_SESSION['login'] == true) {
        header("Location: logout.php");
    }


    $post = true;
    //Reads user inputs from forms
    $username = $db->escape_string($_POST['user_name']);
    $password = $db->escape_string($_POST['Password']);
    $admin = "Administrator";
    $usr = "Public";


    $password = sha1($password);
    $user = decode_result(exec_sql("SELECT `userid`, `rank` FROM `users` WHERE `username`='$username' AND `password`='$password'"));
    if (count($user) != 0) {
        $_SESSION['login'] = $username;


        if ($user[0]['rank'] == 0) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['isAdmin'] = $admin;


            header("Location: police.php");

        } else {
            header("Location: public.php");

            $_SESSION['user'] = true;
            $_SESSION['user'] = $usr;

        }
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Login</title>

   <?php require 'css.html';?>

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h6 class="logo-name">
                <small>Police</small>
            </h6>
            <marquee><h3> Utumishi Kwa Wote </h3></marquee>

        </div>
        <h3> Login</h3>
    </div>
    <?php
    if ($error) {
        echo "<div class=\"alert alert-danger\">Invalid password or username</div>";
    }
    ?>

    <form class="m-t" role="form" name="form" method="POST" action="login.php" enctype="multipart/form-data">


        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="user_name" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Password" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

        <a href="forgot_password.php">
            <small>Forgot password?</small>
        </a>

        <p class="text-muted text-center">
            <small>Do not have an account?</small>
        </p>
        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
    </form>
    <p class="m-t">
        <small>BigFoot Innovations &copy; 2016-2017</small>
    </p>
</div>
</div>

<?php require 'scripts.html'; ?>


</body>


</html>
