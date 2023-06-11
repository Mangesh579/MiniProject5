<?php
session_start();
include "db.php";
if (isset($_SESSION["uid"])) {

	$u_name = $_POST["u_name"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $cardnumber= $_POST['cardNumber'];
    $u_id=$_SESSION["uid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];
    
    
    $sql0="SELECT o_id from `orders`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $o_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(o_id) AS max_val from `orders`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $o_id= $row["max_val"];
        $o_id=$o_id+1;
        echo( mysqli_error($con));
    }

	$sql = "INSERT INTO `orders` 
	(`o_id`,`u_id`,`u_name`, `email`,`address`, `cardnumber`,`prod_count`,`total_amt`) 
	VALUES ($o_id, '$u_id','$u_name','$email', '$address', '$cardnumberstr','$total_count','$prod_total')";


    if(mysqli_query($con,$sql)){
        $del_sql="DELETE from cart where u_id=$u_id";
        if(mysqli_query($con,$del_sql)){
            echo"<script>window.location.href='order_successful.php'</script>";
        }else{
            echo(mysqli_error($con));
        }

    }else{
        echo(mysqli_error($con));
    }
    
}else{
    echo"<script>window.location.href='index.php'</script>";
}
?>