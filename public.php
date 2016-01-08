<?php

include 'utils.php';
include 'db.php';
init_db();
checkUser();
checkUserPublic();

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


                        <?php
                        if (isset($msg)) {
                            echo "<div class=\"alert alert-danger\">" . $msg . "</div>";
                            unset($msg);
                        } ?>

                        <div>

                            <div class="panel panel-primary">
                                <div class="panel-heading"> Profile View
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6">
                                        <div class="contact-box">
                                            <a href="#">
                                                <div class="col-sm-4">
                                                    <div class="text-center">
                                                        <img alt="image"
                                                             class="img-circle m-t-xs img-responsive"
                                                             src="img/a4.jpg">

                                                        <div
                                                            class="m-t-xs font-bold"><?php foreach ($res as $x) {
                                                                if ($_SESSION['user'] == true) {
                                                                    echo "Public User";
                                                                    break;
                                                                } else {
                                                                    echo "Police Officer";

                                                                }

                                                            } ?>
                                                        </div>
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
                        xaxis: {},
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

        <


</body>

</html>
