<?php


include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");
$msg;

$db = init_db();
checkUser();
$res=decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));

if($_POST)
{
     $user_id = getUserId();

$fname=$db->escape_string($_POST['fname']);
$lname=$db->escape_string($_POST['lname']);
$name=$db->escape_string($_POST['case_name']);
$idNumber=$db->escape_string($_POST['idNumber']);
$location= $db->escape_string($_POST['location']);
$case =$db-> escape_string($_POST['case']);


$qry="INSERT INTO `police_cases`(`fname`,`lname`,`idnumber`,`location`,`case_name`,`case_desc`,`userID`)   VALUES('$fname','$lname','$idNumber','$location','$name','$case','$user_id')"; 




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

   <?php require 'css.html';?>
</head>

<body>
    <div id="wrapper">
        <?php include 'menu2.php' ?>
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
   
       

               
      

        <form action="p_case.php" method="post">
            <div class="form-group col-md-4">
                <label for="InputName">First Name</label>

                <div class="input-group col-md-12">
                    <input type="text" class="form-control"  name="fname" required>
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">Other Names </label>

                <div class="input-group col-md-12">
                    <input type="text" class="form-control"  name="lname" required>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="InputName">Location/Locality</label>

                <div class="input-group col-md-12">
                    <input name="location" class="form-control" type="text" required >
                </div>
            </div>
             <div class="form-group col-md-5">
                <label for="InputName">Case Heading</label>

                <div class="input-group col-md-12">
                    <input name="case_name" class="form-control" type="text"  required>
                </div>
            </div>


            <div class="form-group col-md-4">
                <label for="InputName">ID No.</label>

                <div class="input-group col-md-12">
                    <input name="idNumber" class="form-control" type="text"  required="">
                </div>
            </div>
             <div class="form-group col-md-4">
                <label for="InputName">Case Category</label>
                   <select class="form-control col-md-12" name="suspect_category">
                          <option value="Adult">Roberry</option>
                            <option value="Adult">Rape</option>
                           <option value="Adult">Family Conflicts</option>
                         <option value="Adult">Traffic</option>
                          
                          <option value="Child">Violence</option>
                          <option value="Adult">Roberry with Violence</option>
                           <option value="Adult">Other Type</option>
                 </select>
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

    <?php require 'scripts.html'; ?>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                <?php
            if($qry==true)
                  {
                 ?>
                 toastr.success('Thankyou', 'Claim Sent Successfully ');

            <?php
        }
        ?>
            }, 1300);   

            
           
        });
    </script>
        
</body>

</html>
