<?php

if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
 //$_SESSION['id']=$id;
//print_r($loggedUser);
//exit();

?>
<?php
if(!isset($_SESSION['loggedUser'])) 
{
    header('Location: login.php');
    exit;
}
include ('dbconnect.php');


?>
<!DOCTYPE html>
<html>
<head>
    
<style>
    body  {
   
    
    color:#0f0f0f;
    text-align:center;
    background-image: url('4.jpg');
    
    background-size: cover;
    

}
body {font-family: arial, Helvetica, sans-serif;}


input[type=t_name], input[type=t_startdate]input[type=t_enddate]input[type=t_image] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}



button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.dp {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
    span.psw {
       display:inline-block ;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
  
<body>

<h2>WELCOME TO TRIP</h2>

  <form method="post" action="#" class="login-form">
	
  <h1> <?php $userid=$_SESSION['loggedUser']['UserID'];
       echo $userid;?></h1>
      <div class="form">
          <h2 style="text-align:center;">Add Travellers</h2>
         
         </div>
      <div class="form">
          <h2 style="text-align:center;">ENTER EXPENCE</h2>
         
         </div>
       
  

   <div class="container">
    <label for="name">Expanse Name</label>
      
      
  
      <br><input type="name" name="e_name" placeholder="e_name" required/><br>
   

    <div>
        
        <label for="start">Date</label>
        <br><input type="date" id="e_date" name="e_date"
               value=" "
               /><br>
    </div>

    <div>
        
        <label for="start">Amount</label>
       <br> <input type="amount" id="e_amount" name="e_amount"
               value=" "
              / ><br>
    
      </div>
        <?PHP// $id=$_GET['id'];
          //echo $id;
        //$_SESSION['id']=$id;
        ?>
        
    </div>
      <div>
        <br>
          <div class="fs"><h4>Select Catagory:</h4>
		<body><select name="cname[]"  multiple>
			
			
				
				
                    <?php
include ('dbconnect.php');
//echo mysqli_error ($conn);
$query = "SELECT c_id, c_name FROM catagorytable";
$result = mysqli_query($conn,$query);
?> <?php
while($row = mysqli_fetch_array($result))
{
                    ?><option value= <?php echo $row['c_id'];?>> <?php echo $row['c_name'];?></option>
 
                    
						<?php 
                        }
							  
					?></select>
                
                <h2><input type="submit" name="submit" value="Get Selected Values" /></h2>
            </form>
           <?php
if(isset($_POST['submit']))
{

foreach ($_POST['cname'] as $select)
{
echo "You have selected :" .$select; // Displaying Selected Value
    $response=array(); 
@$id=$_SESSION['id'];
@$e_name= $_POST ['e_name'];
@$e_date= $_POST ['e_date'];
@$e_amount= $_POST['e_amount'];

@$e_c_id=$select;
$u_id = $loggedUser['UserID'];
//echo $E_cat_id;
//exit();
    
$query = "INSERT INTO expancetable('e_t_id', 'e_u_id', 'e_name', 'e_date', 'e_amount', 'e_c_id') VALUES ('$id','$u_id','$e_name','$e_date',' $e_amount','$e_c_id');";

   

echo $query;
//exit();
 
    if(mysqli_query($conn, $query))
			  {
				  echo mysqli_error($conn);
				$response['status']=1;
				$response['message']="Registartion Successful";
				echo json_encode($response);
				header("Location:dashboard.php");
				
			  }
			  else
			  {
				echo mysqli_error($conn);
				$response['status']=0;
				$response['message']="Registartion not Successful, please try again";
				echo json_encode($response);	
			  
				}
 
}}?>
          </div></div></form></body></html>
