<?php 
	include("init.php");
	session_start();
	if(isset($_POST)){
		extract($_POST);
		var_dump($_POST);
		$x =  intval($id);
		$fname=$_SESSION["fname"];
		$dname=$fname."_d";
		$sql = "DELETE FROM `$dname` WHERE `id`='$x'";
		$result = mysqli_query($con, $sql);
		if ($result)
			echo "success";
		else
			echo "fail";
		// if($sqlretr){
		// 	echo json_encode(array('success' => 1));;
		// }else{
		// 	echo json_encode(array('error'=> 0));
		// }
	}
 ?>