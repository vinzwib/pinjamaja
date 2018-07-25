<?php
	session_start();
	//include "logger.php";
	
	$vv = "";
	$msg = "";
	
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
	
	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$passC = hash('sha512',$pass);
		//$cekdulu = substr($user, 0, 2);
			
				$query = mysqli_query($dbh,"select * from admin where id_user='$user' and pass='$passC' and active=1");
				$query2 = mysqli_fetch_row($query);
				$xxx=mysqli_num_rows($query);	
						
				if ($xxx) {
					$_SESSION['username'] = $user;
					
						?>		
							<script language='JavaScript'>
								parent.document.location='main';
							</script>
						<?php
				}else{
					$msg="Wrong Username or password";
				}
		//logger($user,"Login - select * from user where email='$user' and password='$passC' and active=1",$vv);			
	}
?>