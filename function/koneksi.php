<?php
	$hostname="localhost"; 
	$us="root";
	$password="v333w"; 
	$database="pinjam_aja";
	
	if(!$dbh=mysqli_connect($hostname,$us,$password,$database))
	{
		echo mysqli_error();
	} else {
		mysqli_select_db($dbh, $database);
	}
	
?>