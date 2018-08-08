<?php
if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
//print_r($loggedUser);
//exit();

if(!isset($_SESSION['loggedUser'])) 
{
    header('Location:l.php');
exit;
}
?>
<?php
include "dbconnect.php";
$userID=$_SESSION['loggedUser']['UserID'];
echo $userID;
$respone= array();
    
$query ="select t_id, t_name, t_image FROM triptable INNER JOIN travellertable ON triptable.t_id=travellertable.t_id AND travellertable.u_id='$userID';";

$result = mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <title>trip</title>
    
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
    
    <input type="button" value="logout" onclick="location.href='l.php'">
    <style>
body  {
   
    
    color:#fff;
    text-align:center;
    background-image: url('5.jpg');
    
    background-size: cover;
    

}
    

</style>
<body style="padding-left: 20px" >
   
    
<h1 class="title" align="center">WELCOME <?php echo $loggedUser['Name'];?></h1>
<?PHP $userID=$loggedUser['UserID'];
echo $userID;?>
    <?php
if($result!='')

  {
    
    while($row = mysqli_fetch_array($result))
    {
 
      //echo $row['T_id']; 
     
   // $logedUser = array('Name' =>$row['T_name'],
                       // 'ex_trip_id'=> $row['T_id'],
                         //'img'=> $row['T_img'] );
        
        
   ?> 

    
  <?php echo $row['T_name'];?>
    <!--<input type="button" value="logout" onclick="location.href='l.php'">-->
  
    <a href = "exp.php?id=<?php echo $row['T_id'] ?>">
        
    <img src="<?php echo $row['T_img'];?>" height="200" width="200" 
         />
      <!--//onclick="location.href='exp.php'"-->
<?php 
    //print_r($row) ;
        //echo $row['T_img'];
 //exit;
    }
   // $_SESSION ['logedUser'] = $logedUser;
    
}

?>
        <input type="button" value="creat trip" onclick="location.href='add_trip_frm.php'">

   <div class="container">
       <br/>
                
                
                
            </div>
        </div>
  
</body>
    
</html>