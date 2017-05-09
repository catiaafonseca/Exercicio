<?php 
	session_start();
	include("../../config/config.php");
	
	if($stmt = $mysqli->prepare("Select tipo_conta, password, username FROM utilizador WHERE username=? and password=?")) {	
		$stmt->bind_param("ss", $_POST['username'],$_POST['password']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($tipo_conta,$password,$username);
		$num_rows = $stmt->num_rows;	
		$stmt->fetch();
		if($num_rows>0) {
			if($tipo_conta == '0'){
				$_SESSION['login']=$_POST['username']; 
				header("Location: backoffice.php");			
			}
			else{
				header("Location: ../../index.php");
			}
			$stmt->close();
		}
		else{
			header("Location: ../../index.php?s=2");
		}
	}
?>