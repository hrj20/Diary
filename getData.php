<?php 
	include('init.php');
	session_start();
	if(isset($_POST))
	{
	$loginemail=$_POST["loginemail"];
	$loginpassword=$_POST["loginpassword"];
	$fname="";
	$email="";
	$numbers="";
	$sql = "select count(*),fname,email,number from users where password='$loginpassword' and email='$loginemail'";
	$result=mysqli_query($con,$sql);
	if($result){
	$response =array();
	while($row=mysqli_fetch_array($result))
	{
		array_push($response,array("Count"=>$row[0],"name"=>$row[1],"email"=>$row[2],"number"=>$row[3]));
		if(($fname =="")&&($email =="")){
          $fname = $row[1];
          $email = $row[2];
          $numbers =$row[3];
        }
	}
	$_SESSION['fname']=$fname;
	$_SESSION['email']=$email;
	$_SESSION['number']=$numbers;
	echo json_encode(array("server_response"=>$response),JSON_FORCE_OBJECT);
}
else{
	echo "error";
}
	mysqli_close($con);
}
?>