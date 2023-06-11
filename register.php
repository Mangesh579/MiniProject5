<?php
session_start();
include "db.php";
if (isset($_POST["u_name"])) {

	$u_name = $_POST["u_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$p_no = $_POST['p_no'];
	$address = $_POST['address'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if(empty($u_name) || empty($email) || empty($password) || empty($repassword) ||empty($p_no) || empty($address)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$u_name)){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>this $u_name is not valid..!</b>
				</div>
			";
			exit();
		}
	
		if(!preg_match($emailValidation,$email)){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>this $email is not valid..!</b>
				</div>
			";
			exit();
		}
		if(strlen($password) < 9 ){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Password is weak</b>
				</div>
			";
			exit();
		}
		if(strlen($repassword) < 9 ){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Password is weak</b>
				</div>
			";
			exit();
		}
		if($password != $repassword){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>password is not same</b>
				</div>
			";
		}
		if(!preg_match($number,$p_no)){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Mobile number $p_no is not valid</b>
				</div>
			";
			exit();
		}
		if(!(strlen($p_no) == 10)){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Mobile number must be 10 digit</b>
				</div>
			";
			exit();
		}
		//existing email address in our database
		$sql = "SELECT u_id FROM user WHERE email = '$email' LIMIT 1" ;
		$check_query = mysqli_query($con,$sql);
		$count_email = mysqli_num_rows($check_query);
		if($count_email > 0){
			echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Email Address is already available Try Another email address</b>
				</div>
			";
			exit();
		} else {
			
			$sql = "INSERT INTO `user` (`u_id`, `u_name`, `email`, `password`, `p_no`, `address`) 
			VALUES (NULL, '$u_name', '$email', '$password', '$p_no', '$address')";
			$run_query = mysqli_query($con,$sql);
			$_SESSION["uid"] = mysqli_insert_id($con);
			$_SESSION["name"] = $u_name;
			$ip_add = getenv("REMOTE_ADDR");
			$sql = "UPDATE cart SET u_id = '$_SESSION[uid]' WHERE u_id = -1";
			if(mysqli_query($con,$sql)){
				echo "register_success";
				echo "<script> location.href='store.php'; </script>";
				exit;
			}
		}
	}
	
}
?>






















































