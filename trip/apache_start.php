<?php
session_start();
include "dbconnect.php";
@$email= $_POST ['email'];

@$password = $_POST ['password'];
$response = array();

$query = "SELECT * FROM usertable  WHERE u_email = '$email' and u_password= '$password';";
$result = mysqli_query($conn,$query);



if($result != '')
{
    while($row = mysqli_fetch_array($result))
    {
//        
        $loggedUser = array('Name' => $row['u_name'],
                        'UserID'=> $row['u_id']);
       
        //print_r($loggedUser);
        //exit();
        
    }
    $_SESSION ['loggedUser'] = $loggedUser;  
    
 
header('location:1234.php');
    
  	}
    

else
{
	$response['status']=0;
	$response['message']="loging Not successful";
	echo json_encode($response);}

?>
?>