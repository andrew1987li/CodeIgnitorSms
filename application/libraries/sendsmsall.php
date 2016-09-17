<?php

require "application/libraries/tools.php";

$msg = "Hi, %s. I noticed you were the representative for %s in %s.  I’m a local investor and do a lot of projects in the neighborhood so I know it very well.  I was wondering if the house is for sale?\n\n
Sincerely,\nAdam";

//Connect to the database.
$con=mysqli_connect("mysql.probateproject.com","dreamadam","qscBFE3!2#4","adamdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT No,Name,PhoneNum, Address, City, State FROM tb_phone where PhoneNum is not null";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  $rep_arr=array("+","(",")","-","_"," ");
  $respond = "";    
  while ($row=mysqli_fetch_row($result))
    {
       $usrname = $row[1];
       $usr_index = strpos($usrname, " ");
       $usrname = substr($usrname, 0, $usr_index);

       $snd_msg = sprintf($msg, $usrname, $row[3], $row[4]);

       $phonenum = str_replace($rep_arr, "", $row[2]);
       $phonenum = "+1".$phonenum;
       $respond = $respond."\nNumber:".$phonenum."Result:".send_Sms($phonenum, $snd_msg)."\n";
       //$respond = $respond."phonenum".$phonenum."\r\nmsg".$snd_msg."\r\n";
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

echo $respond;

?>