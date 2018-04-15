<?php 
	include('init.php');
	session_start();
	if(isset($_POST))
	{
		$title=$_POST["title"];
	    $description=$_POST["notes"];
 		$date=$_POST["date"];
 		$date=str_ireplace(" ","/",$date);
	    $date=str_ireplace("January","01",$date);
 		$date=str_ireplace("February","02",$date);
 		$date=str_ireplace("March","03",$date);
 		$date=str_ireplace("April","04",$date);
 		$date=str_ireplace("May","05",$date);
 		$date=str_ireplace("June","06",$date);
 		$date=str_ireplace("July","07",$date);
 		$date=str_ireplace("August","08",$date);
		$date=str_ireplace("September","09",$date);
	 	$date=str_ireplace("October","10",$date);
	 	$date=str_ireplace("November","11",$date);
 		$date=str_ireplace("December","12",$date);
 		$category=$_POST["category"];
 		$fname=$_SESSION['fname'];
		$dname=$fname."_d";
 $sql="insert into $dname(title,notes,date,category) values('$title','$description','$date','$category')";
if(mysqli_multi_query($con,$sql))
{

echo "<br><h3> row inserted...</h3>done";

}
else
{

echo "Error in insertion...".mysqli_error($con);
}
	}

	?>