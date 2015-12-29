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




$sql= "INSERT INTO `User`(`claim_name`,`claim_details`) VALUES('$pf','$age','$phone') ";



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

                    <h3 class="font-bold">Apply for Abstract </h3>
                    <?php
        if (isset($msg))
        {
            echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
            unset($msg);

        }
        ?>
               <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Abstract Application</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div ><h3 class="m-t-none m-b">Form Claim </h3>

                               
                                                    <form role="form" method="POST" action="profile.php" enctype="multipart/form-data">

                                     <div class="form-group">
                                     <label class="col-md-6 control-label"></label>

                                            <div class="col-md-8">


                                            <strong> First Name :  </strong> <input type="text" name="Fname" placeholder="First Name "  class="form-control input-lg m-b" required="" >
                                              <strong> Other Name : </strong> <input type="text" name="Oname" placeholder="Other Name " class="form-control input-lg m-b" required="">
                                             
                                             <strong> Email : </strong><input type="email" name="email" placeholder="Email Address" class="form-control input-lg m-b" required="">
                                               <strong> Place of Loss (30 words max) : </strong> <textarea cols="15" rows="5" name="Oname" placeholder="Location Description " class="form-control input-lg m-b" required=""></textarea>
                                              
                                               <strong> ID Number : </strong>  <input type="text" name="id_No" placeholder="ID Number " class="form-control input-lg m-b" readonly="" >
                                            <button class="btn btn-md btn-primary pull-right m-t-n-xs" type="submit"><strong>Submit Claim</strong></button>
                                                
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
                </div>
                
                                 <div class="left-box text-left animated fadeInRightBig">

                     <div class="col-lg-12">
                     </br>

                                <fieldset>

                                <legend> View Claims </legend>
        
      

                               <div>
                                     <div class="col-lg-6">
                
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
