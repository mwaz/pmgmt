<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();

$cases = decode_result(exec_sql("SELECT * FROM `cases`"));



$no_cases = false;

if (count($cases) < 1) {
    $no_cases = true;

}


?>

<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Cases Reported </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>
<div id="wrapper">
    <?php include 'menu2.html'?>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">


                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <?php
                                if ($no_cases) {
                                    echo "There are no cases";
                                    goto x;
                                }
                                ?>
                                <tr>


                                    <th data-toggle="true">Case No</th>
                                    <th data-hide="phone">Date</th>
                                    <th data-hide="all"> Description</th>
                                    <th data-hide="phone">Reporter</th>
                                    <th data-hide="phone"> Case Heading</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($cases as $x) {

                                $user = decode_result(exec_sql("SELECT  `fname` ,`lname` FROM  `users`"));

                                ?>

                                <tr>
                                    <td> <?php echo $x['case_id'] ?> </td>

                                    <td><?php echo $x['opened'] ?> </td>

                                    <td><?php echo $x['case_desc'] ?> </td>

                                    <td>
                                        <?php echo $user[0]['fname'] . "\t" . $user[0]['lname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $x['case_name'] ?>
                                    </td>
                                    
                                    <td>
                                        <span class="label label-primary">Pending Case </span>
                                    </td>

                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">Approve</button>
                                            <button class="btn-white btn btn-xs">Cancel</button>
                                        </div>
                                    </td>
                                     <?php
                                    }

                                    ?>

                                </tr>

                                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <?php
                            x:
                            ?>

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

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {

        $('.footable').footable();

    });

</script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/ecommerce_product_list.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 20 Dec 2015 09:23:53 GMT -->
</html>
