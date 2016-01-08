<?php
include 'utils.php';
include 'db.php';
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


    if (email_exists($email)) {

        $msg = "Cannot insert Email  in the database";
    } elseif ($qry && $sql == true) {
        $msg = "Successfully Updated profile";


    } elseif ($_SESSION['isAdmin'] == true) {
        $sql = "INSERT INTO `users`(`pf_no`,`age`,`phone_no`) VALUES('$pf','$age','$phone') ";

        $qry = "UPDATE `users` set `idnumber`='$idNumber',`fname`='$Fname',`lname`='$Oname',`email`='$email' WHERE `username`='$_SESSION[usr]'";


    }


    exec_sql($qry);
    exec_sql($sql);


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
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <span> <img alt="image" class="img-circle"
                                        src="img/profile_small.jpg"/>
                            </span> <a data-toggle="dropdown" class="dropdown-toggle"
                                       href="#"> <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"><?php echo $_SESSION['login'] ?></strong>
                                </span> <span class="text-muted text-xs block">Dummy User <b
                                        class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">Rongai Police</div>
                </li>
                <li class="active"><a href="#"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Profile</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="#">Update Profile </a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-square"></i> <span
                            class="nav-label">Application claims</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">
                        <li><a href="#">Abstract Application </a></li>
                        <li><a href="#">Report A Case </a></li>
                        <li><a href="#">Downloads </a></li>


                    </ul>
                </li>
            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation"
                 style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary "
                       href="#"><i class="fa fa-bars"></i> </a>

                    <form role="search" class="navbar-form-custom" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..."
                                   class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><span class="m-r-sm text-muted welcome-message">Rongai Police
                                Management System</span></li>


                    <li><a href="login.php"> <i class="fa fa-sign-out"></i> Log out
                        </a></li>
                    <li><a class="right-sidebar-toggle"> <i class="fa fa-tasks"></i>
                        </a></li>
                </ul>

            </nav>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">

            <div class="col-sm-3">
                <h2> Welcome <?php echo $_SESSION['login'] ?></h2>

                <ul class="list-group clear-list m-t">

                </ul>
            </div>

            <div class="col-sm-3">

                <div class="m-t">
                    <h4>RONGAI POLICE STATION</h4>
                </div>
            </div>

        </div>

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
                                                   required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="InputName">Other Names </label>

                                        <div class="input-group col-md-12">
                                            <input type="password" class="form-control" name="Oname"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-5">
                                        <label for="InputName">Email</label>

                                        <div class="input-group col-md-12">
                                            <input name="email" class="form-control" type="email"
                                                   required="">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="InputName">PF Number </label>

                                        <div class="input-group col-md-12">

                                            <input name="pf" class="form-control" type="text"
                                                   required>
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
                                                   placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>">
                                        </div>

                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="InputName">Phone Number</label>

                                        <div class="input-group col-md-12">
                                            <input name="phone" class="form-control" type="text"
                                                   required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="InputName">ID No.</label>

                                        <div class="input-group col-md-12">
                                            <input name="idNumber" class="form-control" type="text"
                                                   placeholder="<?php
                                                   foreach ($res as $x) {
                                                       echo $x ['idnumber'];
                                                   }
                                                   ?>"
                                                   readonly="">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-5">
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
                                                                    if ($_SESSION ['isAdmin'] == true) {
                                                                        echo "Police Officer";
                                                                        break;
                                                                    } else {
                                                                        echo "Public User";
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
        <div> nkt</div>


        <div class="clearfix"></div>


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

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="js/bootstrap-date-picker.js"></script>

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
