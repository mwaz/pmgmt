<?php
include 'utils.php';
include 'db.php';
init_db();
checkUser();
$qry=false;
$db = init_db();
if ($_POST) {

    $Fname = $db->escape_string($_POST['Fname']);
    $Oname = $db->escape_string($_POST['Oname']);
    $email = $db->escape_string($_POST['email']);
     $phone = $db->escape_string($_POST['phone']);
    $phone = $db->escape_string($_POST['phone']);
    $idNumber = $db->escape_string($_POST['idNumber']);

 $qry = "UPDATE `users` set `phone_no`='$phone', `idnumber`='$idNumber',`fname`='$Fname',`lname`='$Oname',`email`='$email' WHERE `username`='$_SESSION[login]'";

if ($qry== true) {
        $msg = "Successfully Updated profile";
 }

exec_sql($qry);


}
$res = decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css"
          rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-date-picker.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">
   <?php include 'menu.html' ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">


                    <div class="left-box text-left animated fadeInRightBig">
                        <div class="panel panel-primary">

                            <div class="panel panel-heading">Profile Update</div>
                            <?php if (isset ($msg)) {
                                echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                                unset ($msg);
                            }
                            ?>

                            <div class="panel-body">
                                <form action="" method="post">
                                    <div class="form-group col-md-3">
                                        <label for="InputName">First Name</label>

                                        <div class="input-group col-md-12">
                                            <input type="text" class="form-control" name="Fname" 
                                                 value="<?php foreach ($res as $x ) {
                                                   echo $x['fname'];
                                                 }?>"  required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="InputName">Other Names </label>

                                        <div class="input-group col-md-12">
                                            <input type="text" class="form-control" name="Oname"
                                                   value="<?php foreach ($res as $x ) {
                                                   echo $x['lname'];
                                                 }?>"required="">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="InputName">Email</label>

                                        <div class="input-group col-md-12">
                                            <input name="email" class="form-control" type="email"
                                                value="<?php foreach ($res as $x ) {
                                                   echo $x['email'];
                                                 }?>"   required="">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-3">
                                        <label>Date of Birth</label>

                                        <div class="input-group date" data-provide="datepicker"
                                             data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar">
                            </i></span>
                                            <input type="text" name="date_from" class="form-control"
                                                   placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>" required>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="InputName">Phone Number</label>

                                        <div class="input-group col-md-12">
                                            <input name="phone" class="form-control" type="text"
                                                   required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="InputName">ID No.</label>

                                        <div class="input-group col-md-12">
                                            <input name="idNumber" class="form-control" type="text"
                                                   value="<?php
                                                   foreach ($res as $x) {
                                                       echo $x ['idnumber'];
                                                   }
                                                   ?>"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-3">
                                        <label for="InputName">Gender</label>

                                        <select class="form-control col-md-12" name="gender">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>


                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <h4>Upload Picture</h4>

                                        <input type="file" name="file to upload"
                                               id="file to upload"> </br>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                                type="submit">
                                            <strong>Update Profile </strong>
                                        </button>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of panel primary animated box and panel body divs' -->


                    <div class="left-box text-left animated fadeInRightBig">

                        <div class="col-lg-12">
                            </br>

                            <fieldset>
                                <legend> View Profile</legend>
                                <div class="panel panel-primary">

                                    <div class="panel panel-heading">Profile View</div>

                                    <div class="panel-body">


                                        <div class="col-lg-6">
                                            <div class="contact-box">
                                                <a href="#">
                                                    <div class="col-sm-4">
                                                        <div class="text-center">
                                                            <img alt="image" class="img-circle m-t-xs img-responsive"
                                                                 src="img/a4.jpg">

                                                            <div class="m-t-xs font-bold"><?php
                                                                foreach ($res as $x) {
                                                                     if ($_SESSION['user'] == true) {
                                                                    echo "Public User";
                                                                    break;
                                                                } else {
                                                                    echo "Police Officer";

                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <h3>
                                                            <strong><?php
                                                                echo $x ['fname'];
                                                                echo "</t> </t>";
                                                                echo $x ['lname'];
                                                                ?> </strong>
                                                        </h3>

                                                        <p>
                                                            <i class="fa fa-envelope"></i> <?php
                                                            foreach ($res as $x) {
                                                                echo $x ['email'];
                                                            }
                                                            ?></p>
                                                        <address>
                                                            <strong>User Details</strong><br> ID:
                                                            <?php
                                                            foreach ($res as $x) {
                                                                echo $x ['idnumber'];
                                                            }
                                                            ?> <br> <abbr title="Phone">Phone:</abbr>
                                                            <?php foreach ($res as $x) {
                                                                echo $x ['phone_no'];
                                                            }
                                                            ?>
                                                        </address>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!--end of contact box and the col lg 6 class -->
                                    </div>
                                </div>
                                <!-- end of panel body div and pannel primary-->
                            </fieldset>

                            <div class="clearfix"></div>

                        </div>
                        <!--Animated fade in div closed -->
                        <!-- col large 12 div closed -->
                    </div>

                </div>
            </div>


        </div>
      


        <div class="clearfix"> Clear</div>
        <div class="clearfix"> Clear</div>


        <div class="footer">
            <div class="pull-right">
                BigFoot <strong>Techprenuers</strong>
            </div>

            <div>
                <strong>Copyright</strong> BigFoot Innovations &copy; 2016-2017
            </div>
        </div>

    </div>
    <!--grey background class closing div -->

</div>
<!--  div id wrapper class -->
</body>

<?php require 'scripts.html'; ?>
<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>

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


</html>
