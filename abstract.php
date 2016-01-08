<?php

include 'utils.php';
include 'db.php';

$msg;
$val="Abstract";
init_db();
checkUser();
$qry=false;
$db=init_db();
if($_POST){


$email=$db->escape_string($_POST['c_email']);
$claim=$db->escape_string($_POST['claim_details']);






$sql= "INSERT INTO `claims`(`claim_name`,`claim_details`,`userid`,`c_email`) VALUES('$val','$claim','$_SESSION[login]','$email')  " ;



if($sql==true){
    $msg="Successfully Sent claim";
}
else
{
    $msg="Failed to send claim";
}



exec_sql($sql);



}
$res=decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));

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

                    <h3 class="font-bold">Apply for Abstract </h3>
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
        Astract Application
    </div>

    <div class="panel-body">
   
       

               
      

        <form action="abstract.php" method="post">
            <div class="form-group col-md-12">
                <label for="InputName">First Name</label>

                <div class="input-group col-md-6">
                    <input type="text" class="form-control" name="Fname" placeholder="<?php foreach ($res as $x ) {
                            echo $x['fname'];
                           } ?>"  readonly="">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="InputName">Other Names </label>

                <div class="input-group col-md-6">
                    <input type="password" class="form-control" name="Oname" placeholder="<?php foreach ($res as $x ) {
                            echo $x['lname'];
                           } ?>"  readonly="">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="InputName">Email</label>

                <div class="input-group col-md-6">
                    <input name="c_email" class="form-control" type="email" required="">
                </div>
            </div>


           <div class="form-group col-md-12">
           <label for="InputName">Place of loss (max 30) </label>

                <div class="input-group col-md-6">

            <textarea cols="15" rows="5" name="claim_details" placeholder="Location Description " class="form-control input-lg m-b" required=""></textarea>
            </div>
            </div>


            <div class="form-group col-md-12">
                <label for="InputName">ID No.</label>

                <div class="input-group col-md-6">
                    <input name="idNumber" class="form-control" type="text" placeholder="<?php foreach ($res as $x ) {
                            echo $x['idnumber'];
                           } ?>" readonly="">
                </div>
            </div>


            <div class="form-group col-md-12">
                <div class="input-group col-md-3">
                    <input type="submit" value="Submit Claim" class="btn btn-primary">
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

            

           

           

            
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
        
</body>

</html>
