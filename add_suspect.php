<?php
 include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();
checkAdmin();

$db=init_db(); 

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
    <!--date picker stylesheets -->
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css"
          rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-date-picker.css" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <?php include 'menu2.html' ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="left-box text-left animated fadeInRightBig">

                            <div class="col-lg-12">

                                <h3 class="font-bold">Update Profile </h3>

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
                                        <label for="InputName">Suspect Level</label>

                                        <select class="form-control col-md-12" name="gender">
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                             <option value="Wanted">Wanted</option>
                                        </select>


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



                                                <div class="form-group col-md-4">
                                                    <label for="InputName">Phone Number</label>

                                                    <div class="input-group col-md-12">
                                                        <input name="phone" class="form-control" type="text"
                                                               required="">
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="InputName">Case Number </label>

                                                    <div class="input-group col-md-12">

                                                        <input name="pf" class="form-control" type="text" required="">
                                                    </div>
                                                </div>

                                                   <div class="form-group col-md-2">
                                        <label for="InputName">Category</label>

                                        <select class="form-control col-md-12" name="gender">
                                            <option value="Adult">Adult</option>
                                            <option value="Child">Child</option>
                                        </select>


                                    </div>
                                                <div class="clearfix"></div>

                                                  <div class="form-group col-md-3">
                                        <label>Date of Birth</label>

                    <div class="input-group date" data-provide="datepicker"
                                             data-date-format="yyyy-mm-dd">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i></span>
    <input type="text" name="date_from" class="form-control" placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>">
                 </div>

                     </div>

                                                
                           <div class="form-group col-md-3">
                         <label for="InputName">ID No.</label>

                    <div class="input-group col-md-12">
        <input name="idNumber" class="form-control" type="text" required="">
                                                    </div>
                                                    </div>

                                                    



                                                   <div class="form-group col-md-4">
                                        <label for="InputName">Gender</label>

                                        <select class="form-control col-md-12" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>


                                    </div>
                                      <div class="clearfix"></div>


                                                
                    <div class="col-md-12"><h4>Upload Picture</h4>

                     <input type="file" name="file to upload" id="file to upload">  </br>
                        <div class="clearfix"></div>
                     <button class="btn btn-lg btn-primary pull-right m-t-n-xs"

                                        type="submit"><strong>Submit Details </strong></button>


                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    </div>

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
                </body>
                </html>