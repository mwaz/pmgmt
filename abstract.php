<?php

include 'utils.php';
include 'db.php';
include 'timeout.php';
 header("refresh:300;");

$msg;
$val="Abstract";
init_db();
checkUser();
$qry=false;
$db=init_db();
if($_POST){


$claim_name=$db->escape_string($_POST['claim_name']);
$claim_desc=$db->escape_string($_POST['claim_desc']);
$claim_location=$db->escape_string($_POST['claim_location']);
$claim_email=$db->escape_string($_POST['claim_email']);
$date_of_loss=$db->escape_string($_POST['dol']);

$user_id = getUserId();

$claim_verification=decode_result(exec_sql("SELECT * FROM `claims`   WHERE `userID` ='$user_id' "));
if (!empty($claim_verification)){
    $msg="Cant Send claim,  <br> A previously sent claim is under processing";
}

    else{
        $sql= "INSERT INTO `claims`(`date_lost`,`claim_name`,`claim_desc`,`claim_location`, `userID`,`claim_email`) VALUES('$date_of_loss','$claim_name','$claim_desc','$claim_location','$user_id','$claim_email')  " ;
             $msg="Successfully Sent claim";
             exec_sql($sql);
             
    }
    
}
$res=decode_result(exec_sql("SELECT * FROM `users` WHERE `username`='$_SESSION[login]'"));

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
        <?php include 'menu.php' ?>
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
            <div class="form-group col-md-5">
                <label for="InputName">First Name</label>

                <div class="input-group col-md-12">
                    <input type="text" class="form-control" name="Fname" placeholder="<?php foreach ($res as $x ) {
                            echo $x['fname'];
                           } ?>"  readonly="">
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">Other Names </label>

                <div class="input-group col-md-12">
                    <input type="password" class="form-control" name="Oname" placeholder="<?php foreach ($res as $x ) {
                            echo $x['lname'];
                           } ?>"  readonly="">
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">Email</label>

                <div class="input-group col-md-12">
                    <input name="claim_email" class="form-control" type="email" required="">
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">ID No.</label>

                <div class="input-group col-md-12">
                    <input name="idNumber" class="form-control" type="text" placeholder="<?php foreach ($res as $x ) {
                            echo $x['idnumber'];
                           } ?>" readonly="">
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="InputName">Claim Name </label>

                <div class="input-group col-md-12">
                    <input name="claim_name" class="form-control" value="Abstract" type="text" readonly="">
                </div>
            </div>

             <div class="form-group col-md-5">
                <label for="InputName">Location </label>

                <div class="input-group col-md-12">
                    <input name="claim_location" class="form-control" type="text" required="">
                </div>
            </div>
            


         <div class="form-group col-md-4">
             <label>Date of Loss </label>

             <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon">
            <i class="fa fa-calendar"> </i></span>
    <input type="text" name="dol" class="form-control" placeholder="yyyy-mm-dd" value="<?php date('Y-M-d') ?>" required>
                 </div>

                     </div>


           <div class="form-group col-md-12">
           <label for="InputName">Description  of loss (max 30) </label>

                <div class="input-group col-md-6">

            <textarea cols="15" rows="5" name="claim_desc" placeholder="Place Text Here... " class="form-control input-lg m-b" required=""></textarea>
            </div>
            </div>


            
            <div class="form-group col-md-9">
                <div class="input-group col-md-12">
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
   <?php  require 'scripts.html';?>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Abstract Claim sent', 'Thankyou  ');

            }, 1300);

        });
    </script>
        
</body>

</html>
