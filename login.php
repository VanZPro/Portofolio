<?php

if (isset(_$POST['uname']) && isset (_$POST['password'])) {

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

	$username = validate($_POST['uname']);
	$password = validate($_POST['password']);

	if (empty($uname)) {
		header("Location : index.php?error=User Name is required");
		exit();
	}
		if (empty($password)) {
		header("Location : index.php?error=Password is required");
		exit();
	}else{
		echo "Valid input";
	}
}else{
	header("Location: index.php");
	exit();
}
