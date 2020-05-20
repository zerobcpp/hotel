<?php
//include 'header.php' 
include '../conn.php';

$query = mysqli_query($conn,"select * from hotel where hotelcode = '$_GET[hotelid]'");
$row = mysqli_fetch_array($query);

if($row['singleroom']<=0){
header("location: searchresult.php");
}
else{
$query = mysqli_query($conn, "update hotel set singleroom = singleroom-1 where hotelcode = '$_GET[hotelid]'");
if($query)
{
    echo "success";
}
}
?>



include '../footer.php'
?>