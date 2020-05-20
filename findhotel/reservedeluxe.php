<?php
//include 'header.php' 
include '../conn.php';
session_start();


$query = mysqli_query($conn,"select * from hotel where hotelcode = '$_GET[hotelid]'");
$row = mysqli_fetch_array($query);
$string = $row['hotelname'];
$substring = substr($string, 0, strpos($string, ' '));
$id = mysqli_real_escape_string($conn,$_GET['hotelid']);
$roomcode = "double".$row['doubleroom'].$row['hotelname'];



if($row['doubleroom']<=0){
//header("location: searchresult.php");
echo "NO more rooms";
}

else{
$query = mysqli_query($conn, "update hotel set doubleroom = doubleroom-1 where hotelcode = '$_GET[hotelid]'");

$query = mysqli_query($conn, "insert into reservations (hotelcode,hotelchain,hotelname,roomcode,roomtype,username,firstname,lastname,checkin,checkout) values
('$id','$substring','$row[hotelname]','$roomcode','DELUXE','$_SESSION[username]','$_SESSION[firstname]','$_SESSION[lastname]','$_SESSION[checkin]','$_SESSION[checkout]')");


if(!$query)
{echo mysqli_error($conn);
}
}

echo("Reserved, you can now return");


?>