<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();
$qry=false;
$db=init_db();
if($_POST){

$Fname=$db->escape_string($_POST['Fname']);
$Oname=$db->escape_string($_POST['Oname']);
$email=$db->escape_string($_POST['email']);
$pf=$db->escape_string($_POST['pf']);
$age=$db->escape_string($_POST['age']);
$phone=$db->escape_string($_POST['phone']);




$sql= "INSERT INTO `User`(`UserID`,`pf_no`,`age`,`phone_no`) VALUES('$_SESSION[login]','$pf','$age','$phone') ";

$qry="UPDATE `User` set `idNumber`='$pf',`Fname`='$Fname',`Lname`='$Oname',`Email`='$email' WHERE `Username`='$_SESSION[login]'";
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
$res=decode_result(exec_sql("SELECT * FROM `User` WHERE `Username`='$_SESSION[login]'"));
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
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['login'] ?></strong>
                             </span> <span class="text-muted text-xs block"> Police Officer <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Rongai Police 
                        </div>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="#">Update Profile </a></li>
                           
                       
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-square"></i> <span class="nav-label">Application claims</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Abstract Application's </a></li>
                             <li><a href="#">Case Reportings </a></li>
                              <li><a href="#">Finalized Claims </a></li>
                            
                            
                        </ul>
                    </li>
                   
                    
                   
                    
            
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Cases Section</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Add Case</a></li>
                             <li><a href="#">Reported Cases</a></li>
                              <li><a href="#">Finalized Case</a></li>
                            
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Bail Out's Section </span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Suspects Section</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="#">Add Suspect</a></li>
                            <li><a href="#">View Suspects </a></li>
                            <li><a href="#">Cells Capacity </a></li>
                            <li><a href="#">WANTED criminals </a></li>

                           
                        </ul>
                    </li>
                    
                   
                   
                    <li class="special_link">
                        <a href="#"><i class="fa fa-spinner fa-spin"></i> <span class="nav-label">Evidence Database </span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
           <form role="search" class="navbar-form-custom" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Rongai Police Management System</span>
                </li>
               


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
                <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-sm-3">
                        <h2> <strong> Welcome </strong> <?php echo $_SESSION['login'] ?></h2>

                        <ol class="breadcrumb">
                        <li>
                            <a href="police.php">Home</a>
                        </li>
                        <li class="#">
                            <strong>Profile</strong>
                        </li>
                    </ol>

              
                        <ul class="list-group clear-list m-t">
                           
                        </ul>
                    </div>
                   
                    <div class="col-sm-3">
                        <div class="statistic-box">
                        <h4>
                       
                            <div class="m-t">
                                <h4>RONGAI POLICE STATION </h4>
                            </div>

                        </div>
                    </div>

            </div>
        <div class="row">
            <div class="col-lg-12">
               <div class="wrapper wrapper-content">
                <div class="left-box text-left animated fadeInRightBig">

                     <div class="col-lg-4">

                    <h3 class="font-bold">Update Profile </h3>
                    <?php
        if (isset($msg))
        {
            echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
            unset($msg);

        }
        ?>
               <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Update Profile</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Profile Update</h3>

                                                    <form role="form" name="form" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group"><label>First Name</label> <input type="text" name="Fname" placeholder="First Name" class="form-control" required=""></div>
                                                        <div class="form-group"><label>Other Name</label> <input type="text" name="Oname" placeholder="Other Name" class="form-control" required=""></div>
                                                        <div class="form-group"><label>Email </label> <input type="email" name="email" placeholder="Email" class="form-control" required=""></div>
                                                        
                                                        <div class="form-group"><label>P.F Number</label> <input type="text" name="pf" placeholder="PF Number" class="form-control" required=""></div>
                                                        <div class="form-group"><label>Age </label> <input type="text"  name="age" placeholder="Age" class="form-control"required=""></div>
                                                        <div class="form-group"><label>Phone Number</label> <input  name="phone" type="text" placeholder="phone Number" class="form-control" required=""></div>
                                                        
                                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                            <label for="inlineRadio1"> Male </label>
                                        </br>
                                        
                                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                            <label for="inlineRadio2"> Female </label>
                                        </div>
                                                        
                                                       
                                                </div>
                                                <div class="col-sm-6"><h4>Upload Picture</h4>
                                                
                                                <input type="file" name="file to upload" id="file to upload">  </br>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Update Profile </strong></button>
                                                            
         
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

               
            </div>

                        </div>
                </div>
                
                                 <div class="left-box text-left animated fadeInRightBig">

                     <div class="col-lg-12">
                     </br>

                                <fieldset>

                                <legend> View Profile </legend>
        
      

                               <div>
                                     <div class="col-lg-6">
                <div class="contact-box">
                    <a href="#">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a4.jpg">
                            <div class="m-t-xs font-bold"><?php foreach ($res as $x ) {
                          if  ($_SESSION['isAdmin'] == true){
                            echo "Police Officer";
                            break;}
                            else
                            {
                                echo "Public User";
                            
                          }
                          
                        } ?></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong><?php echo $x['Fname'];
                            echo "</t> </t>";
                           echo $x['Lname'] ;
                            ?> </strong></h3>
                        <p><i class="fa fa-envelope"></i> <?php foreach ($res as $x ) {
                           echo $x['Email'] ;
                          
                        } ?></p>
                        <address>
                            <strong>User Details</strong><br>
                            ID: <?php foreach ($res as $x ) {
                            echo $x['idNumber'];
                           
                          
                        } ?> <br>
                           
                            <abbr title="Phone">Phone:</abbr> <?php foreach ($res as $x ) {
                           echo $x['phone_no'] ;
                          
                        } ?>
                        </address>
                    </div>
                    <div class="clearfix"></div>
                        </a>
                </div>
            </div>
                    </div>
                              
                                                            
                                                             
                                                            </div>
                                                              </fieldset>
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
        </div>

        </div>
       
       
       

            </div>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

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
    <script src="js/plugins/chartJs/Chart.min.js"></script>

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


            
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            

           

           

            
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
        
</body>

</html>
