<?php 
// connecting to mysql
$con=mysqli_connect("localhost","Vehicle","cars","Vehicle");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>