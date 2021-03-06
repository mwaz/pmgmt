<?php

require 'utils.php';
require 'db.php';
include 'timeout.php';
 header("refresh:300;");


$msg;

checkUser();
checkAdmin();
$userid = getUserId();


$db = init_db();
if ($_POST) {

    $Fname = $db->escape_string($_POST['Fname']);
    $Oname = $db->escape_string($_POST['Oname']);
    $email = $db->escape_string($_POST['email']);
    $pf = $db->escape_string($_POST['pf']);
    $dob = $db->escape_string($_POST['dob']);
    $phone = $db->escape_string($_POST['phone']);
    $idNumber = $db->escape_string($_POST['idNumber']);
  
    
        //check if email exists in our database

if ($_SESSION['isAdmin'] == false) {
        $msg ="Please log in as the Police to update profile";
}
else {
$update_query= "UPDATE `users` set `idnumber`='$idNumber',`fname`='$Fname',`lname`='$Oname',`email`='$email',`pf_no`='$pf',`dob`='$dob',`phone_no`='$phone' WHERE `userID`='$userid'";
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

                                <legend>Update Profile</legend>

                                <?php
                                if (isset($msg)) {
                                    echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                                    unset($msg);
                                } ?>

                                <div class="left-box text-left animated fadeInRightBig">

                                    <div class="panel panel-primary">

                                        <div class="panel panel-heading">
                                            Profile Update 
                                        </div>

                                        <div class="panel-body">


                                            <form action="pprofile.php" method="post">
                                                <div class="form-group col-md-3">
                                                    <label for="InputName">User Name </label>

                                                    <div class="input-group col-md-12">
                                                        <input type="text" class="form-control"
                                                               value="<?php foreach ($res as $x) {
                                                                   echo $x['username'];
                                                               } ?>" name="user" readonly="">
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


                                                <div class="form-group col-md-6">
                                                    <label for="InputName">Email</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="email" class="form-control" type="email"
                                                               value="<?php foreach ($res as $x) {
                                                                   echo $x['email'];
                                                                   # code...
                                                               } ?>" >
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="InputName">Phone Number</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="phone" class="form-control" type="text"
                                                               required="">
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="InputName">File Number </label>

                                                    <div class="input-group col-md-12">

                                                        <input name="pf" class="form-control" type="text" required="">
                                                    </div>
                                                </div>
                                                

                                                  <div class="form-group col-md-3">
                                        <label>Date of Birth</label>

                    <div class="input-group date" data-provide="datepicker"
                                             data-date-format="yyyy-mm-dd">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i></span>
                    <input type="text" name="dob" class="form-control"
                 placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>">
                 </div>

                    </div>

                                                
                                                <div class="form-group col-md-3">
                                                    <label for="InputName">ID No.</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="idNumber" class="form-control" type="text"
                                                               value="<?php foreach ($res as $x) {
                                                                   echo $x['idnumber'];
                                                               } ?>" readonly="">
                                                    </div>
                                                    </div>

                                                    



                                                   <div class="form-group col-md-4">
                                        <label for="InputName">Gender</label>

                                        <select class="form-control col-md-12" name="gender">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>


                                    </div>
                                    <div class="clearfix"></div>
                                       <div class="col-md-12">

                                              
                                                    

                                          <!--   <input type="file" name="file" > </br> -->
                                
                                                      <div class="clearfix"></div>
                                                    
                                                
                                                   <button class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                                type="submit">
                                            <strong>Update Profile </strong>
                                        </button>

                                                  
                                                </div>


                                            </form>
                                            <h4>Upload Picture</h4>

                                            <form method="POST"  action="img_upload.php" enctype="multipart/form-data" >

                                          <input type="file" name="file" > </br></br>

                                         <input  type="submit" name="submit" value="Update Image"> 
                                               
                                                        </form>
                                        

                                                

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
     

                    <div class="left-box text-left animated fadeInRightBig">

                        <div class="col-lg-12">
                            </br>

                            <fieldset>

                                <legend> View Profile</legend>


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
                                                                <img alt="image"
                                                                     class="img-circle m-t-xs img-responsive" 
                                                                     src="uploads/<?php echo $profile['profile_image']; ?> " style="height:100px;width:100px;" />
                                                                <div
                                                                    class="m-t-xs font-bold"><?php foreach ($res as $x) {
                                                                        if ($_SESSION['isAdmin'] == true) {
                                                                            echo "Police Officer";
                                                                            break;
                                                                        } else {
                                                                            echo "Public User";

                                                                        }

                                                                    } ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <h3><strong><?php echo $x['fname'];
                                                                    echo "</t> </t>";
                                                                    echo $x['lname'];
                                                                    ?> </strong></h3>

                                                            <p>
                                                                <i class="fa fa-envelope"></i> <?php foreach ($res as $x) {
                                                                    echo $x['email'];

                                                                } ?></p>
                                                            <address>
                                                                <strong>User Details</strong><br>
                                                                ID: <?php foreach ($res as $x) {
                                                                    echo $x['idnumber'];


                                                                } ?> <br>

                                                                <abbr
                                                                    title="Phone">Phone:</abbr> <?php foreach ($res as $x) {
                                                                    echo $x['phone_no'];

                                                                } ?>
                                                            </address>
                                                        </div>
                                                    </a>


                                                    <div class="clearfix"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>


                    <div class="clearfix"> clear</div>
                    <div class="clearfix"> clear</div>

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
            <?php
            if($update_query==true)
                  {
                 ?>
                 toastr.success('Thankyou', 'Profile Update Success  ');

            <?php
        }
        ?>
            //toastr.success('Thankyou', 'Profile Update Success  ');

        }, 1300);
    });
</script>


</body>

</html>
