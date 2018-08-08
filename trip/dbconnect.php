<?php
$conn=mysqli_connect('localhost', 'root', '', 'trip');
if($conn)
{
echo "connected";
}
else{
echo "error";
}
?>