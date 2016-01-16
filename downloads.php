<?php

include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");
 
init_db();
checkUser();
checkUserPublic();
$userid = getUserId();
$msg;

$res = decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));




if(isset($_POST['submit'])){
     $abstrcts=decode_result(exec_sql("SELECT * from `claims` where `userID` ='$userid'"));



foreach($abstrcts as $x){
    $status= $x['claim_status'];

    if($status==1){
        header("location:pdf.php");
    }

    elseif($status==2){
        $msg="Abstract Claim was rejected,\n Please Re-apply ";

    }
    elseif($status==0){
        $msg="Abstract Claim not Yet processed ";

    }
}
}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    <?php include 'menu.php' ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="left-box text-left animated fadeInRightBig">

                    <div class="col-lg-12">


                        <?php
                        if (isset($msg)) {
                            echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                            unset($msg);
                        } ?>

                        <div>

                            <div class="panel panel-primary">
                                <div class="panel-heading"> Downloads
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="contact-box">
                                        <form method="POST" action="downloads.php" >
                                           <h1>Abstract Downloads</h1>
                                            <button class="btn btn-lg btn-primary pull-right m-t-n-xs"
                                                type="submit" name="submit"> Click Here </button>
                                                </form>


                                            <div class="clearfix"></div>
                                          
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="footer">
            <div class="pull-right">
                BigFoot <strong>Techprenuers</strong>
            </div>
            <div>
                <strong>Copyright</strong> BigFoot Innovations &copy; 2016-2017
            </div>
        </div>
<?php require 'scripts.html'; ?>

        

        

</body>

</html>
