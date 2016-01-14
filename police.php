<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();
checkAdmin();
$qry=false;
$db=init_db();
if($_POST){



$Fname=$db->escape_string($_POST['Fname']);
$Oname=$db->escape_string($_POST['Oname']);
$email=$db->escape_string($_POST['email']);
$pf=$db->escape_string($_POST['pf']);
$age=$db->escape_string($_POST['age']);
$phone=$db->escape_string($_POST['phone']);




$sql= "INSERT INTO `users`(`userID`,`pf_no`,`age`,`phone_no`) VALUES('$_SESSION[login]','$pf','$age','$phone') ";

$qry="UPDATE `users` set `idnumber`='$pf',`fname`='$Fname',`lname`='$Oname',`email`='$email' WHERE `username`='$_SESSION[login]'";
 var_dump($qry);

if($qry&&$sql==true){
    $msg="Successfully Updated profile";
}
else
{
    $msg="Failed to update profile,Please review details";
}


exec_sql($qry);
exec_sql($sql);



}
$res=decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));
// if (count($res<1)){
//    $msg="No records";
    
// }

?>













<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php include 'menu2.php' ?>
        <div class="row">
            <div class="col-lg-12">
               <div class="wrapper wrapper-content">
                <div class="left-box text-left animated fadeInRightBig">

                     <div class="col-lg-12">

                    
                   
                    <?php
                     if (isset($msg))
                             {
                               echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                                    unset($msg); } ?>

                                 
                
                                 
                     </br>

                                <fieldset>

                                <legend> View Profile </legend>
        
      

                               <div>




                                

                    <div class="panel panel-primary">

    <div class="panel panel-heading">
        Profile View
    </div>

    <div class="panel-body">



     <div class="col-lg-6">
                <div class="contact-box">
                    <a href="#">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="uploads/<?php echo $profile['profile_image']; ?> " style="height:120px;width:150px;" />
                            <div class="m-t-xs font-bold"><?php foreach ($res as $x ) {
                          if  ($_SESSION['isAdmin'] == true){
                            echo "Police Officer";
                            break;}
                            else
                            {
                                echo "Public User";
                            
                          }
                          
                        } ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong><?php echo $x['fname'];
                            echo "</t> </t>";
                           echo $x['lname'] ;
                            ?> </strong></h3>
                        <p><i class="fa fa-envelope"></i> <?php foreach ($res as $x ) {
                           echo $x['email'] ;
                          
                        } ?></p>
                        <address>
                            <strong>User Details</strong><br>
                            ID: <?php foreach ($res as $x ) {
                            echo $x['idnumber'];
                           
                          
                        } ?> <br>
                           
                            <abbr title="Phone">Phone:</abbr> <?php foreach ($res as $x ) {
                           echo $x['phone_no'] ;
                          
                        } ?>
                        </address>
                    </div>
                    </a>
                    
                   
                    <div class="clearfix"></div>
                        </a>
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
<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
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
