<?php
include "db.php";

	


if(isset($_FILES['file']['name'])){
	// Getting number of rows
	$res = mysql_query("select * from imgup");
	$id=mysql_num_rows($res);
	$id=$id+1;
	

	/* Getting file name */
	$filename = $_FILES['file']['name'];
	
	/* Location */
	
	
	$location = "upload/".$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType_lc = strtolower($imageFileType);

	/* Valid extensions */
	$allowed_exs = array("jpg","jpeg","png");
	
	// echo $filename;
	$temp_name= $_FILES['file']['tmp_name'];
	
	$response = 0;
	/* Check file extension */
	$new_name= $id.".".$imageFileType_lc;
	$location = "upload/".$new_name;
	if(in_array($imageFileType_lc, $allowed_exs)) {
		
	
	   	/* Upload file */
	   	if(move_uploaded_file($temp_name,$location)){
			// $filename=$id.".".$imageFileType_lc;
			$response = $location;
	   	}
		//    Inserting into database
		mysql_query("insert into imgup(img) values('$new_name')");
		
		
	}

	echo $response;
	exit;
}

echo 0;