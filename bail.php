<?php

include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");
 
$msg;
init_db();
checkUser();

$db = init_db();
if ($_POST) {

    $Fname = $db->escape_string($_POST['Fname']);
    $Oname = $db->escape_string($_POST['Oname']);
    $email = $db->escape_string($_POST['email']);
    $pf = $db->escape_string($_POST['pf']);
    $age = $db->escape_string($_POST['age']);
    $phone = $db->escape_string($_POST['phone']);
    $idNumber = $db->escape_string($_POST['idNumber']);
  
    $userid = getUserId();
        //check if email exists in our database

if ($_SESSION['isAdmin'] == false) {
        $msg ="Please log in as the Police to update profile";
}
else {
$update_query= "UPDATE `users` set `idnumber`='$idNumber',`fname`='$Fname',`lname`='$Oname',`email`='$email',`pf_no`='$pf',`age`='$age',`phone_no`='$phone' WHERE `userID`='$userid'";
exec_sql($update_query);
$msg="Successfully updated profile";
}
}
$res = decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));



?>


<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Dashboard</title>

   <?php require 'css.html';?>
</head>

<body>
<div id="wrapper">
    <?php include 'menu2.php' ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="left-box text-left animated fadeInRightBig">

                            <div class="col-lg-12">

                                <h3 class="font-bold">Bail Suspect </h3>

                                <?php
                                if (isset($msg)) {
                                    echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                                    unset($msg);
                                } ?>

                                <div class="left-box text-left animated fadeInRightBig">

                                    <div class="panel panel-primary">

                                        <div class="panel panel-heading">
                                            Suspect bail
                                        </div>

                                        <div class="panel-body">


                                            <form action="bail.php" method="post">
                                                <div class="form-group col-md-3">
                                                    <label for="InputName">Suspect ID </label>

                                                    <div class="input-group col-md-12">
                                                        <input type="text" class="form-control"
                                                             name="user" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">

                                                    <label for="InputName">First Name</label>

                                                    <div class="input-group col-md-12">
                                                        <input type="text" class="form-control" name="Fname"
                                                               required="">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="InputName">Other Names </label>

                                                    <div class="input-group col-md-12">
                                                        <input type="text" class="form-control" name="Oname"
                                                               required="">
                                                    </div>
                                                </div>
                                                <div class="clearfix" > </div>


                                               

                                                <div class="form-group col-md-3">
                                                    <label for="InputName">Amount</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="phone" class="form-control" type="text"
                                                               required="">
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for="InputName">Case Number </label>

                                                    <div class="input-group col-md-12">

                                                        <input name="pf" class="form-control" type="text" required="">
                                                    </div>
                                                </div>
                                                

                                                 
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="InputName">ID No.</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="idNumber" class="form-control" type="text"
                                                                required="">
                                                    </div>
                                                    </div>

                                        
                                                 <div class="clearfix"></div>
                                                    <button class="btn btn-lg btn-primary pull-right m-t-n-xs"

                                                            type="submit"><strong>Bail Suspect </strong></button>


                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>


                    


                    <div class="clearfix"> </div>

                    <div class="footer">
                        <div class="pull-right">
                            BigFoot <strong>Techprenuers</strong>
                        </div>
                        <div>
                            <strong>Copyright</strong> BigFoot Innovations &copy; 2016-2017
                        </div>
                    </div>

                </div>
            </div>

<?php require 'scripts.html'; ?>



<script>
    $(document).ready(function () {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Rongai police Management', 'Welcome  ');

        }, 1300);
    });
</script>


</body>

</html>
