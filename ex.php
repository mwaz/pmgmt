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
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"><?php echo $_SESSION['login'] ?></strong>
                             </span> <span class="text-muted text-xs block"> Police Officer <b class="caret"></b></span> </span>
                        </a>
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
                    <a href="#"><i class="fa fa-th-large"></i> <span a href="police.php"
                                                                     class="nav-label">Profile</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="#">Update Profile </a></li>


                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-square"></i> <span class="nav-label">Application claims</span><span
                            class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">
                        <li><a href="#">Abstract Application's </a></li>
                        <li><a href="#">Case Reportings </a></li>
                        <li><a href="#">Finalized Claims </a></li>


                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Cases Section</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="p_case.php">Add Case</a></li>
                        <li><a href="#">Reported Cases</a></li>
                        <li><a href="#">Finalized Case</a></li>


                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Bail Out's Section </span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Suspects Section</span><span
                            class="fa arrow"></span></a>
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
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>

                    <form role="search" class="navbar-form-custom" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control"
                                   name="top-search" id="top-search">
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
                <h2><strong> Welcome </strong> <?php echo $_SESSION['login'] ?></h2>


                <ul class="list-group clear-list m-t">

                </ul>
            </div>

            <div class="col-lg-7">

                <div class="m-t">
                    <h1><strong>RONGAI POLICE STATION </strong></h1>
                </div>


            </div>
            <div class="col-lg-10">
                <h2>Reported Cases </h2>


                <ol class="breadcrumb">
                    <li>
                        <a href="police.php">Home</a>
                    </li>
                    <li class="#">
                        <strong>Profile</strong>
                    </li>
                </ol>

            </div>
        </div>


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

                                    <td><?php echo $x['opened'] ?> /td>

                                    <td><?php echo $x['case_desc'] ?> </td>

                                    <td>
                                        <?php echo $user[0]['fname'] . "\t" . $user[0]['lname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $x['case_name'] ?>
                                    </td>
                                    <?php
                                    }

                                    ?>

                                    <td>
                                        <span class="label label-primary">Approved Case </span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
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
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
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
