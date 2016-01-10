<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();

$claims = decode_result(exec_sql("SELECT * FROM `claims`"));


$no_claims = false;

if (count($claims) < 1) {
    $no_claims = true;

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
                                if ($no_claims) {
                                    echo "There are no Abstract claims pending";
                                    goto x;
                                }
                                ?>
                                <tr>


                                    <th data-toggle="true">Claim No</th>
                                    <th data-hide="phone">Claim Name</th>
                                    <th data-hide="all"> Loss Description</th>
                                    <th data-hide="phone">Claim Victim</th>
                                    <th data-hide="phone"> Report date</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($claims as $x) {

                                $user = decode_result(exec_sql("SELECT  `fname` ,`lname` FROM  `users`"));

                                ?>

                                <tr>
                                    <td> <?php echo $x['claim_id'] ?> </td>

                                    <td><?php echo $x['claim_name'] ?> </td>

                                    <td><?php echo $x['claim_desc'] ?> </td>

                                    <td>
                                        <?php echo $user[0]['fname'] . "\t" . $user[0]['lname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $x['claim_report_date'] ?>
                                    </td>
                                    
                                    <td>
                                        <span class="label label-primary">Pending Claim </span>
                                    </td>

                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
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


</html>