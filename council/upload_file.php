<?php
$allowedExts = array("gif", "jpeg","JPEG","JPG", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   
	 chmod( $_FILES["file"]["tmp_name"], 0777 );
     $path="../img/posters/" . $_REQUEST['cat'].'/';
	 
	 if( move_uploaded_file($_FILES["file"]["tmp_name"],
      $path . $_REQUEST["fname"] . "." . $extension))
      { echo "<br>  sucessfully Added";}
	  else
	  {
		echo "   cant upload";
	  }
      
    }
  }
else
  {
  echo "Invalid file". $extension;
 
  }
?>