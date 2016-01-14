<?php
function extensions()
{
	
if (($extension=='jpg'||$extension=='png' || $extension=="jpeg") && $type=='image/jpeg' || $type=='image/png') {
     
     	           $location='uploads/';

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

}

function name(){
	if(!empty($name) ) 
	{
	extensions();
	
	   } //end of if(!empty ($name)) if statement else{
			     	else{ 
			     		header("location:pprofile.php");
			     	   echo "please choose a file";
               }

               

}
?>