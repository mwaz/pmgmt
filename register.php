<?php
require 'db.php';
require 'utils.php';

$err_msg;
$res;
$db=init_db();



if ($_POST)


{

    //mysql escape strings are used to prevent hackers and crackers from unauthorised 
    // brute force and password cracking.
    //User validation must be ensured..
    // the below variablestakes the user data from the form and stores it in the database 

     $Fname=$db->escape_string($_POST['Fname']);
     $Lname=$db->escape_string($_POST['Lname']);
      $User=$db->escape_string($_POST['User']);
       $email=$db->escape_string($_POST['email']);
        $idNumber=$db->escape_string($_POST['idNumber']);
         $Pass=$db->escape_string($_POST['Pass']);
          $passwordConfirm=$db->escape_string($_POST['passwordConfirm']);


          //checking if user exists 
          if(user_exists($User)){
            $err_msg="Username exists in the database";
            exit;

          }


          //check if id exists 
          
           if(id_exists($idNumber)){
            
            $err_msg="ID Number exists in the database";
            exit;


          //check if email exists in our database

          }
           if(email_exists($email)){
            
             $err_msg="Email exists in the database";
             exit;



        }


    

          //checking if confirm password matches with password fields

          if($Pass != $passwordConfirm){

            $err_msg="The passwords dont match";
        }

            else{

                //hash the passwords
                $Pass=sha1($Pass);
                //sQL QUERRY
                $sql="INSERT INTO `User`(`Fname`,`Lname`,`Username`,`email`,`idNumber`,`Password`,`rank`)
                VALUES('$Fname','$Lname','$User','$email','$idNumber','$Pass', 0)";


                exec_sql($sql);

                session_start();

                $_SESSION['User']=$User;
                $_SESSION['Fname']=$Fname;
                $_SESSION['Lname']=$Lname;
                header("location: login.php");

            }


}

?>



<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h6 class="logo-name"><small>Police </small> </h6>
               <marquee> <h3> Utumishi  Kwa Wote </h3></marquee>

            </div>
            <div>
            <h3>Register Account</h3>
            </div>
            

        <?php
        if (isset($err_msg))
        {
            echo "<div class=\"alert alert-danger\">" . $err_msg . "</div>";
            unset($err_msg);

        }


        ?>
            <form class="m-t" role="form"  method="POST" action="register.php" name="form" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="text" class="form-control" name ="Fname" placeholder="First Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name ="Lname" placeholder="Other Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name ="User" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name ="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name ="idNumber" placeholder="ID Number" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name ="Pass" placeholder="Password" required="">
                </div>
                 <div class="form-group">
                    <input type="password" class="form-control" name ="passwordConfirm" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox" name="checkbtn"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="submitBtn">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>BigFoot Innovations &copy; 2016-2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>


</html>
