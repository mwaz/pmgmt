<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();
$wanted_suspects = decode_result(exec_sql("SELECT * FROM `suspects` WHERE `sus_level`='wanted'"));




$no_suspects = false;

if (count($no_suspects) < 1) {
    $no_suspects = true;
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
    <?php include 'menu2.php';?>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">


                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>


                                <h2>Wanted Criminals</h2>
                                <?php
                                if ($no_suspects) {
                                    echo "There are no cases";
                                    goto x;
                                }
                                ?>
                                <tr>


                                    <th data-toggle="true">Name</th>
                                    <th data-hide="phone">Case Number</th>
                                    
                                    <th data-hide="phone">Gender</th>
                                    <th data-hide="phone"> ID Number</th>
                                    <th data-hide="all"> Crime Description </th>
                                    <th data-hide="phone">Suspect Level</th>
                                     <th data-hide="phone">Arrest Point</th>
                                
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($wanted_suspects as $x) {

                                ?>

                                <tr>
                                    <td>  <?php echo $x['sus_fname'] . "\t" . $x['sus_lname'] ?> </td>

                                    <td><?php echo $x['sus_case_no'] ?> </td>

                                    <td><?php echo $x['sus_gender'] ?> </td>

                                    <td>
                                        <?php echo $x['sus_id_number']  ?>
                                    </td>

                                    <td>
                                        <?php echo $x['crime_desc'] ?>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-danger"><?php  echo $x['sus_level']?> </span>
                                    </td>
                                     <td>
                                        <?php echo $x['arrest_point']  ?>
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


</html>
