<?php

include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");

$msg;
@$case_var=$_POST['caseid'];
@$pcase_var=$_POST['pcaseid'];

init_db();
checkUser();


$cases = decode_result(exec_sql("SELECT * FROM `cases`"));
$police_cases =  decode_result(exec_sql("SELECT * FROM `police_cases`"));

$no_cases = false;

if ((count($cases) || count($police_cases)) < 1) {
    $no_cases = true;

}






?>
<?php
//logic to approve or reject  cases in the table and change the case status
   if (isset($_POST['approve'])) {

    $approve_qry="UPDATE `police_cases`  set `case_status` ='1' WHERE `pcase_id` = '$pcase_var'";
     header("refresh:0.0000000000001;");
    exec_sql($approve_qry);
    

}
 if(isset($_POST['reject'])){
     $reject_qry="UPDATE `police_cases`  set `case_status` ='2' WHERE `pcase_id` = '$pcase_var'";
    exec_sql($reject_qry);
   header("refresh:0.0000000000001;");

}

if (isset($_POST['approved'])) {

    $approve_qry="UPDATE `cases`  set `case_status` ='1' WHERE `case_id` = '$case_var'";
    exec_sql($approve_qry);
    header("refresh:0.0000000000001;");

}
 if(isset($_POST['rejected'])){
     $reject_qry="UPDATE `cases`  set `case_status` ='2'  WHERE `case_id` = '$case_var'";
    exec_sql($reject_qry);
   header("refresh:0.0000000000001;");    

}



?>




<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rongai Police | Cases Reported </title>


    <?php require 'css.html'; ?>

   

</head>
<body>
<div id="wrapper">
    <?php include 'menu2.php';?>

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
                                  <form method="POST" action="reported_cases.php">
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
                                
                                       <input type="hidden" name="caseid" value="<?php echo $x['case_id'];?>" >

                                        
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
                                <form method="POST" action="reported_cases.php">

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
                                     
                                         <input type="hidden" name="pcaseid" value="<?php echo $x['pcase_id'];?>" >

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


<?php require 'scripts.html'; ?>
<script>
    $(document).ready(function () {

        $('.footable').footable();

    });

</script>

</body>


</html>
