
<?php
include 'img_functions.php';

@session_start();
@$name= $_FILES['file']['name'];
//$size=$_FILES['file']['size'];
@$type= $_FILES['file']['type'];
@$tmp_name= $_FILES['file']['tmp_name'];
if(isset($_POST)){

$extension= strtolower(substr($name, strpos($name, '.')+ 1));
	if(!empty($name) ) 
	{

		if (($extension=='jpg'||$extension=='png' || $extension=="jpeg") && $type=='image/jpeg' || $type=='image/png') {
     
     	           $location='uploads/';
                 if(move_uploaded_file($tmp_name, $location.$name))
			             {

			             	updateDP($_SESSION['login'],$name);
				       
				          header("location:pprofile.php");
				               echo  "Uploaded image";
				           
			             }  //end of move_uploaded if
			             else {
				             echo  "There was an error";
				         }
			         //error message if file is not an image of type jpg or png
			       } else { 
			       	header("location:pprofile.php");
			           echo "invalid file type";
			       }//end of extension checking if statement

			     } //end of if(!empty ($name)) if statement else{
			     	else{ 
			     		// header("location:pprofile.php");
			     	   echo "please choose a file";
               }
               }
               //end of issset name



?>

