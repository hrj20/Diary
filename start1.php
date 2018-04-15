<?php
$con= mysqli_connect("localhost","root","","timeit");  
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}   
else
{
//	echo "Connection sucess";
}
$sql="SELECT fname FROM users";
$result=mysqli_query($con,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fname=$row["fname"];
        $sql1="SELECT * FROM $fname";
		$result1=mysqli_query($con,$sql1);
		if ($result1->num_rows > 0) 
        {
            while($row1 = $result1->fetch_assoc())
            {
                if($row1["never"]==1)
                {
                    $msg=$row1["fname"]." you have ".$row1["event"]." on ".$row1["date"]." at ".$row1["time"];
                    mail($row1["email"],"One time Reminder from Time-it",$msg);
                    $event=$row1['event'];
                    $sql2="DELETE from $fname where event='$event'";
                    $result2=mysqli_query($con,$sql2);
                    if($result2)
                        echo "deleted";
                    else
                        echo "error";
                }
                else if($row1["daily"]==1)
                {
                    $msg=$row1["fname"]." you have ".$row1["event"]." on ".$row1["date"]." at ".$row1["time"];
                    mail($row1["email"],"Daily Reminder from Time-it",$msg);
                }
                else if($row1["weekly"]==1)
                {
                    $msg=$row1["fname"]." you have ".$row1["event"]." on ".$row1["date"]." at ".$row1["time"];
                    $msg1="Today is " . date("l") ."\n";
                    $msg=$msg1." ".$msg;
                    $day=strtolower(date("l"));
                    if(($day=="monday")&&($row1["monday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="tuesday")&&($row1["tuesday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="wednesday")&&($row1["wednesday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="thursday")&&($row1["thursday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="friday")&&($row1["friday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="saturday")&&($row1["saturday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                    if(($day=="sunday")&&($row1["sunday"]==1))
                        mail($row1["email"],"Weekly Reminder from Time-it",$msg);
                }
                else if($row1["monthly"]==1)
                {
                    $msg=$row1["fname"]." you have ".$row1["event"]." on ".$row1["date"]." at ".$row1["time"];
                    $msg1="Today is " . date("l") ."\n";
                    $msg=$msg1." ".$msg;                       
                    $date1=date("d/m/Y");
                    if($row1["date"]==$date1)  
                    {                                     
                        echo "here";                
                        mail($row1["email"],"Monthly Reminder from Time-it",$msg);
                    }
                }
               // echo $row1["fname"]." ".$row1["email"]." ".$row1["date"]." ".$row1["event"]." ".$row1["time"]." ".$row1["daily"]." ".$row1["weekly"]." ".$row1["monthly"]." ".$row1["never"]."<br>";
            }
        }
        else
        {
            echo "wrong";
        }
    }
} 
else {
    echo "0 results";
}
	mysqli_close($con);
?>


