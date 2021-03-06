<?php
require 'db.php';
require 'utils.php';

$db = init_db();
@session_start();
$error = false;
if ($_POST) {
    $post = true;
    //Reads user inputs from form
    
    $password = $db->escape_string($_POST['pass']);
    $password = sha1($password);

    $user = decode_result(exec_sql("SELECT `userid`, `rank` FROM `users` WHERE `username`='$_SESSION[login]' 
    	AND `password`='$password'"));
    if (count($user) != 0) {

        if(isset($_SESSION['isAdmin'])){
            header("location:police.php");
}
            else{
                  header("location:public.php");
            }
        

      


}}
$profile=readProfile($_SESSION['login']);
    ?>
<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police| 404 Error</title>

   <?php require 'css.html';?>
</head>

<body class="gray-bg">

<div class="lock-word animated fadeInDown">
    <span> LOCKED SCREEN</span>
</div>

<div class="clearfix"> <br> <br> <br> <br>  <br> <br> </div>
    <div class="middle-box text-center lockscreen animated fadeInDown">
    
        <div>
            <div class="m-b-md"> 
            <img alt="image"  class="img-circle circle-border" src="uploads/<?php echo $profile['profile_image']; ?> " style="height:130px;width:200px;" />
            </div>
            <h3> Hey <?php echo $_SESSION['login'] ;  ?></h3>
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

    <?php require 'scripts.html'; ?>


</body>


</html>

