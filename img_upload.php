
<?php
//include 'dummyfxns.php';
$name= $_FILES['file']['name'];
//$size=$_FILES['file']['size'];

$type= $_FILES['file']['type'];
$tmp_name= $_FILES['file']['tmp_name'];


if(isset($name)){
	
$extension= strtolower(substr($name, strpos($name, '.')+ 1));
	if(!empty($name) ) 
	{

		if (($extension=='jpg'||$extension=='png' || $extension=="jpeg") && $type=='image/jpeg' || $type=='image/png') {
     
     	           $location='uploads/';

     	           $img_query="UPDATE  `users` set `profile_image`='$name'" ;
     	           exec_sql($img_query);		

			           if(move_uploaded_file($tmp_name, $location.$name))
			             {
				       
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
			     		header("location:pprofile.php");
			     	   echo "please choose a file";
               }
               }
               //end of issset name



?>

<form method="POST"  action="img_upload.php" enctype="multipart/form-data" >

  <input type="file" name="file" > </br></br>
 <input  type="submit" name="submit" value="Update Image"> 
                                               
 


                                                       
           </form>
                                        
