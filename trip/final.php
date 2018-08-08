<?php

if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();

?>
<?php
if(!isset($_SESSION['loggedUser'])) 
{
    header('Location:l.php');
    exit;
}
include "dbconnect.php";

@$t_name= $_POST ['t_name'];
@$t_startdate= $_POST ['t_startdate'];
@$t_enddate= $_POST ['t_enddate'];
@$t_creater = $loggedUser['UserID'];
@$t_image= $_POST ['t_image'];
@$response = array();

$query_t ="INSERT INTO `triptable`(`t_name`, `t_startdate`, `t_enddate`, `t_creater`, `t_image`) VALUES ('$t_name', '$t_startdate', '$t_enddate', '$t_creater','$t_image')";

$result = mysqli_query($conn,$query_t);

if($result != '')
{
    $lastid = mysqli_insert_id(($conn));
         echo "T_ID : ".$lastid;?><br><?php
     
      if(isset($_POST['submit']))
{
$x=1;
    foreach ($_POST['email'] as $select)
        {
        echo "You have selected :".$select;?><br><?php
        $x++;
     echo $x;
//for($i=0; $i==$x; $i++){
     $response1 = array();
        $que="INSERT INTO `travellertable` (`t_id`, `u_id`) VALUES ('$lastid', '$select');";
      echo $que;
      $result = mysqli_query($conn,$que); 
if($result != '')
{
    
	$response1['message']="TRIP CREATED";
	echo json_encode($response1);
    header('location:exp.php');
}
        
        else
{
	$response1['status']=0;
	$response1['message']="loging Not successful";
	echo json_encode($response1);}


    }
    }
    
       
        
  
   
      }


    
    


    ?>

    

   
