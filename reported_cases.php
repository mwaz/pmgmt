<?php

include 'utils.php';
include 'db.php';

$msg;
init_db();
checkUser();


$cases = decode_result(exec_sql("SELECT * FROM `cases`"));
$police_cases =  decode_result(exec_sql("SELECT * FROM `police_cases`"));

$no_cases = false;

if ((count($cases) || count($police_cases)) < 1) {
    $no_cases = true;

}



//logic to approve or reject  cases in the table and change the case status


?>
<?


foreach ($police_cases as $y ) {
    if ($_POST['approve']) {

    # code...

    $approve_qry="UPDATE `police_cases`  set `case_status` ='1' WHERE `case_id` =".$y['case_id'];
    exec_sql($approve_qry);
    header("location:reported_cases.php");

}
 if($_POST['reject']){
     $reject_qry="UPDATE `police_cases`  set `case_status` ='2' ";
    exec_sql($reject_qry);
    header("location:reported_cases.php");

}
}
?>
<?php

if ($_POST['approved']) {

    $approve_qry="UPDATE `cases`  set `case_status` ='1' ";
    exec_sql($approve_qry);
    header("location:reported_cases.php");

}
 if($_POST['rejected']){
     $reject_qry="UPDATE `cases`  set `case_status` ='2' ";
    exec_sql($reject_qry);
    header("location:reported_cases.php");

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
             <?php
                                if ($no_cases) {
                                    echo "There are no cases";
                                    goto x;
                                }
                                ?>
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">



                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                

                                <div class="panel panel-heading">
                                            <h2><strong>User Reported cases </strong> </h2>
                                        </div>
                                <tr>


                                    <th data-toggle="true">Case No</th>
                                    <th data-hide="phone">Reported Date</th>
                                    <th data-hide="all"> Description</th>
                                    <th data-hide="phone">Reporter</th>
                                    <th data-hide="phone"> Case Heading</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                 <?php
                                if ($no_cases) {
                                    echo "There are no cases";
                                    goto x;
                                }
                                ?>
                                <tbody>
                                <?php
                                foreach ($cases as $x) {

                                $user = decode_result(exec_sql("SELECT  `fname` ,`lname` FROM  `users`  WHERE `UserID` = ".$x['UserID']));


                                ?>

                                <tr>
                                    <td> <?php echo $x['case_id'] ?> </td>

                                    <td><?php $y= $x['opened'] ;echo date('d M Y',strtotime($y))  ?> </td>

                                    <td><?php echo $x['case_desc'] ?> </td>

                                    <td>
                                        <?php echo $user[0]['fname'] . "\t" . $user[0]['lname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $x['case_name'] ?>
                                    </td>
                                    
                                    <td>
                                        
     <?php $Y =$x['case_status']; switch($Y){



        case 0 :
                echo "<p><span class=\"badge badge-primary\">Pending Case</span></p>";
                break;

        case 1 :
                echo  "<p><span class=\"badge badge-warning\">Accepted case</span></p>";
                   break;
        case 2:
                echo "<p><span class=\"badge badge-danger\">Rejected case</span></p>";
                 break;
            }
        

?>
                                   
                                   
                                    </td>

                                    <td class="text-right">
                                    <div class="btn-group">
                                       <form method="POST" action="reported_cases.php">
                                        
                                            <input type="submit" name="approved" class="btn-white btn btn-xs" value="approve" >
                                            <input type="submit" name="rejected" class="btn-white btn btn-xs" value="reject" >
                                         

                                            </form>
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

                            <!-- police generated cases -->

                             <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                               

                                <thead>
                                

                                 <div class="panel panel-heading">
                                          <h2> <strong> Police Reported cases </strong> </h2>
                                        </div>

                                <tr>


                                    <th data-toggle="true">Case No</th>
                                    <th data-hide="phone">Reported Date</th>
                                    <th data-hide="all"> Description</th>
                                    <th data-hide="phone">Reporter</th>
                                    <th data-hide="phone"> Case Heading</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($police_cases as $x) {

                                
                                ?>

                                <tr>
                                    <td> <?php echo $x['pcase_id'] ?> </td>

                                    <td><?php $y= $x['opened'] ;echo date('d M Y',strtotime($y))  ?> </td>

                                    <td><?php echo $x['case_desc'] ?> </td>

                                    <td>
                                        <?php echo $x['fname'] . "\t" . $x['lname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $x['case_name'] ?>
                                    </td>

                                    <td>
                                   <?php $Y =$x['case_status']; switch($Y){



        case 0 :
                echo "<p><span class=\"badge badge-primary\">Pending Case</span></p>";
                break;

        case 1 :
                echo  "<p><span class=\"badge badge-warning\">Accepted case</span></p>";
                   break;
        case 2:
                echo "<p><span class=\"badge badge-danger\">Rejected case</span></p>";
                 break;
            }
        

?>
</td>

                                    <td class="text-right">
                                     <div class="btn-group">
                                     <form method="POST" action="reported_cases.php">
                                       

                                            <input type="submit" name="approve" class="btn-white btn btn-xs" value="Approve" >
                                            <input type="submit" name="reject" class="btn-white btn btn-xs" value="Reject" >
                                            </form>
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
