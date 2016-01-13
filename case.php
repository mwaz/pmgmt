<?php


include 'utils.php';
include 'db.php';
$msg;

$db = init_db();
checkUser();
$res=decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));

if($_POST)
{
     $user_id = getUserId();

$name=$db->escape_string($_POST['case_name']);
$idNumber=$db->escape_string($_POST['idNumber']);
$location= $db->escape_string($_POST['location']);
$case =$db-> escape_string($_POST['case']);


$qry="INSERT INTO `cases`(`location`,`case_name`,`case_desc`,`userID`)   VALUES('$location','$name','$case','$user_id')"; 




exec_sql($qry);

if ($qry==true){
    $msg="Successfully Reported a case";
}
    else
        $msg="Failed to report the case,please Try Again  ";
   


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
        <?php include 'menu.html' ?>
       <div class="row">
            <div class="col-lg-12">
               <div class="wrapper wrapper-content">
                <div class="left-box text-left animated fadeInRightBig">

                     <div class="col-lg-12">

                    <h3 class="font-bold">Report a case</h3>
                    
                    <?php
        if (isset($msg))
        {
            echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
            
            unset($msg);


        }
        ?>
               
                
                                 <div class="left-box text-left animated fadeInRightBig">

                    <div class="panel panel-primary">

    <div class="panel panel-heading">
        Report Case
    </div>

    <div class="panel-body">
   
       

               
      

        <form action="case.php" method="post">
            <div class="form-group col-md-4">
                <label for="InputName">First Name</label>

                <div class="input-group col-md-12">
                    <input type="text" class="form-control" value="<?php foreach ($res as $x) {

                        echo $x['fname'];
                    } ?>" name="Fname">
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">Other Names </label>

                <div class="input-group col-md-12">
                    <input type="text" class="form-control"  value="<?php foreach ($res as $x ) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

                        echo $x['lname'];
                    } ?>"name="Oname">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="InputName">Location/Locality</label>

                <div class="input-group col-md-12">
                    <input name="location" class="form-control" type="text" >
                </div>
            </div>
             <div class="form-group col-md-5">
                <label for="InputName">Case Heading</label>

                <div class="input-group col-md-12">
                    <input name="case_name" class="form-control" type="text" >
                </div>
            </div>


            <div class="form-group col-md-4">
                <label for="InputName">ID No.</label>

                <div class="input-group col-md-12">
                    <input name="idNumber" class="form-control" type="text" value="<?php foreach ($res as $x ) {
                            echo $x['idnumber'];
                           } ?>" required="">
                </div>
            </div>


           <div class="form-group col-md-12">
           <label for="InputName">Report case (explanation 200 words max)</label>

                <div class="input-group col-md-6">

            <textarea cols="15" rows="5" name="case"  class="form-control input-lg m-b" required=""></textarea>
            </div>
            </div>




            <div class="form-group col-md-12">
                <div class="input-group col-md-3">
                    <input type="submit" value="Report Case" class="btn btn-primary">
                </div>
            </div>
        </form>
         </div>
         </div>

            </div>

   

                                    
                
                    <div class="clearfix"></div>
                        </a>
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

        });
    </script>
        
</body>

</html>
