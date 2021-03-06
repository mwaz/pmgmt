<?php

include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");

$msg;

init_db();
checkUser();

$suspects = decode_result(exec_sql("SELECT * FROM `suspects`"));




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

   <?php require 'css.html'; ?> 


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
                                     <th data-hide="phone">Arrest Date</th>
                                
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($suspects as $x) {

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
     <?php $Y =$x['sus_level']; switch($Y){



        case 'Beginner' :
                echo "<p><span class=\"badge badge-primary\">Beginner</span></p>";
                break;

        case 'Intermediate' :
                echo  "<p><span class=\"badge badge-warning\">intermediate</span></p>";
                   break;
        case 'Wanted' :
                echo "<p><span class=\"badge badge-danger\">Wanted</span></p>";
                 break;
            }
        

?>
                                   
                  </td>                  
                                    <!-- <td> 
                                    

                                        <span class="badge badge-warning"><?php  echo $x['sus_level'] ?> </span>


                                    </td> -->
                                     <td>
                                        <?php echo $x['arrest_point']  ?>
                                    </td>

                                    <td>
                                        <?php $y=$x['arrest_time']; echo date('d M Y',strtotime($y))  ?>
                                    </td>


                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">Bail Out </button>
                                            <button class="btn-white btn btn-xs">Release</button>
                                        </div>
                                    </td>
                                     <?php
                                      }?>

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


<?php require 'scripts.html'; ?>
<script>
    $(document).ready(function () {

        $('.footable').footable();

    });

</script>

</body>
                    

</html>


 