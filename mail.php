<?php
// echo "Today is " . date("d/m/Y") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// $day=strtolower(date("l"));
// echo "Today is " . $day."<br>";
// $day=strtolower($day);
// if("sunday"==$day)
// 	echo "yes<br>";
// else
// 	echo "no<br>";
// date_default_timezone_set("Asia");
// echo "The time is " . date("h:i:sa")."<br>";
// $script_tz = date_default_timezone_get();

// if (strcmp($script_tz, ini_get('date.timezone'))){
//     echo 'Script timezone differs from ini-set timezone.<br>';
// } else {
//     echo 'Script timezone and ini-set timezone match.';
// }
 $fname="sagar";
 $bname=$fname."_b";
 echo $bname;
date_default_timezone_set('Asia/Kolkata');
$time=date("G:i");
// echo $time."<br>";
$hrs=substr_replace($time,"",2,3);
$hrs=(int)$hrs;
$hrs=$hrs*60*60;
echo $hrs."<br>";
$min=substr_replace($time,"",0,3);
$min=(int)$min;
$min=$min*60;
echo $min."<br>";

$ct=$hrs+$min;
echo $ct."<br>";

$date="19:15";
$min=substr_replace($date,"",0,3);
$min=(int)$min;
$min=$min*60;
echo $min."<br>";
$hrs=substr_replace($date,"",2,3);
$hrs=(int)$hrs;
$hrs=$hrs*60*60;
echo $hrs."<br>";
$time=$hrs+$min;

if($time-$ct<=3600)
	echo "send";
else
	echo "dont send";

// $t=time();
// echo($t . "<br>");
// include("init.php");
// $fname="sagar";
// $sql="Select * from $fname order by 'date' ASC";
// $result=mysqli_query($con,$sql);
// if($result)
// {
// 	$rows = array();
// 	$count=0;
// 	while($r = mysqli_fetch_assoc($result)){
// 		$rows[$count++] = $r;
// 	}
// 	echo json_encode($rows);
// }
?>