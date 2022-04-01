<?php
include "db.php";

	echo $id;

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

	$response = 0;
	/* Check file extension */
	
	if(in_array($imageFileType_lc, $allowed_exs)) {
		
	
	   	/* Upload file */
	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;
	   	}
		//    Inserting into database
		mysql_query("insert into imgup(img) values('$id.$imageFileType_lc')");
		
		
	}

	echo $response;
	exit;
}

echo 0;