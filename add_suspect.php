<?php
 include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();
checkAdmin();

$db=init_db(); 


if($_POST){
    $sus_level = $db->escape_string($_POST['suspect_level']);
    $Fname = $db->escape_string($_POST['Fname']);
    $Lname = $db->escape_string($_POST['Oname']);
    $crime_description = $db->escape_string($_POST['crime_description']);
    $phone = $db->escape_string($_POST['phone']);
    $case_number = $db->escape_string($_POST['case_number']);
    $sus_category = $db->escape_string($_POST['suspect_category']);
    $sus_dob = $db->escape_string($_POST['dob']);
    $sus_id_number = $db->escape_string($_POST['idNumber']);
    $gender = $db->escape_string($_POST['gender']);
    $arrest_point = $db->escape_string($_POST['sus_arrest_point']);
    $arrest_time = $db->escape_string($_POST['arrest_date']);





$database_insert="INSERT INTO `suspects`( `sus_level`,`sus_fname`,`sus_lname`,`sus_phone`,`sus_case_no`,`sus_category`,`sus_dob`,`sus_id_number`, `sus_gender`,`arrest_point`,`arrest_time`,`crime_desc` ) 
VALUES('$sus_level','$Fname','$Lname','$phone','$case_number','$sus_category','$sus_dob','$sus_id_number','$gender','$arrest_point','$arrest_time','$crime_description' )";



exec_sql($database_insert);

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

                                

                                <?php
                                if (isset($msg)) {
                                    echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                                    unset($msg);
                                } ?>

                                <div class="left-box text-left animated fadeInRightBig">

                                    <div class="panel panel-primary">

                                        <div class="panel panel-heading">
                                            Add Suspect
                                        </div>

                                        <div class="panel-body">


                                            <form action="add_suspect.php" method="post">
                                                
                                                <div class="form-group col-md-3">
                                        <label for="InputName">Suspect Level</label>

                                        <select class="form-control col-md-12" name="suspect_level">
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

                                                        <input name="case_number" class="form-control" type="text"   required="">
                                                    </div>
                                                </div>

                                                   <div class="form-group col-md-2">
                                        <label for="InputName">Category</label>

                                        <select class="form-control col-md-12" name="suspect_category">
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
    <input type="text" name="dob" class="form-control" placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>">
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
                                            <option value="Male"> Male  </option>
                                            <option value="Female">Female</option>
                                        </select>

                        </div>
                                      <div class="clearfix"></div>
                        
                        <div class="form-group col-md-3">
                         <label for="InputName">Arrest Point</label>

                       <div class="input-group col-md-12">
                        <input name="sus_arrest_point" class="form-control" type="text"    title="Must be Characters" required="" >
                       </div>
               </div>

               <div class="form-group col-md-3">
                <label>Arrest Date</label>
                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i></span>
    <input type="text" name="arrest_date" class="form-control" placeholder="yyyy-mm-dd" value="<?php date('Y-m-d') ?>">
                 </div>
                 </div>


                         <div class="clearfix"></div>

                         <div class="form-group col-md-6">
           <label for="InputName">Crime Description ( 200 words max)</label>

                <div class="input-group col-md-12">

            <textarea cols="15" rows="5" name="crime_description"  class="form-control input-lg m-b" required=""></textarea>
            </div>
            </div>
              <div class="clearfix"></div>



                                                
                    <div class="col-md-12"><h4>Upload Picture</h4>

                     <input type="file" name="file to upload" id="file to upload">  </br>
                        <div class="clearfix"></div>
                     <button class="btn btn-lg btn-primary pull-right m-t-n-xs"

                                        type="submit"><strong>Add Suspect </strong></button>


                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    </div>
                     </div>
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
                   


 <!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>
<script src="js/bootstrap-date-picker.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {

        $('.footable').footable();

    });

</script>
                </body>
                </html>