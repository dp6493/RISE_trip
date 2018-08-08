<?php

if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
//print_r($loggedUser);
//exit();

?>
<?php
if(!isset($_SESSION['loggedUser'])) 
{
    header('Location:l.php');
    exit;
}
include "dbconnect.php";


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body  {
   
    
    color:#0f0f0f;
    text-align:center;
    background-image: url('expp.jpg');
    
    background-size: cover;
    

}
body {font-family: arial, Helvetica, sans-serif;}


input[type=trip_name], input[type=start_date]input[type=end_date]input[type=T_img] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: black;
    padding: 140px 200px;
    margin: 8px 0;
    border: black;
    cursor: pointer;
    width: 100%;
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
</head>
<body>

<h2>CREATE TRIP</h2>

  <form method="post" action="exp_php.php" class="login-form">
	
   <h1> <?PHP $userID=$loggedUser['UserID'];
       echo $userID;?></h1>
      <div class="form">
          <h2 style="text-align:center;">Add Travellers</h2>
         
         </div>
       
  <!--<div class="imgcontainer">
    <img src="expp.jpg" alt="Avatar" class="avatar">
  </div>-->

  <div class="container">
    <label for="uname">EXPANCE NAME</label>
      
      
  
      <br><input type="e_name" name="e_name" placeholder="e_name" required/><br>
   

    <div>
        
        <label for="start">DATE</label>
        <br><input type="e_date" id="e_date" name="e_date"
               value=" "
               /><br>
    </div>

    <div>
        <label for="end">amount</label>
       <br> <input type="e_amount" id="e_amount" name="e_amount"
               value=" "
              / ><br>
        <?PHP $id=$_GET['id'];
         //  echo $id;
        $_SESSION['id']=$id;
        ?>
        
    </div>
      <div>
        <br>
          <div class="form-group col-md-6 col-lg-6 col-sm-6">
		<body>
			<label>Select Catagory:</label>
			<form name="Dropdown" action="memb.php" method="POST">
				<select name="catagory[] "id="DDLActivites" data-style="btn-default" class="selectpicker form-control">
					<?php
					
						include('dbconnect.php');
						echo mysqli_error ($conn);
						$query = "SELECT `c_id`, `c_name` FROM `catagory`;";
						$ressult = mysqli_query($conn,$query);
							 
						while($row = mysqli_fetch_array($result))
						{?>
 <option value= <?php echo $row['c_id'];?>> <?php echo $row['c_name'];?></option>
						<?php 
                        }
						echo "</select>";	  
					?>
                </select>
                <h2><input type="submit" name="submit" value="Get Selected Values" color= black; /></h2>
            </form>
            <?php
if(isset($_POST['submit']))
{

    foreach ($_POST['c_name'] as $select)
{
    echo "You have selected :".$select;
    exit;
}
        
}

?>
            
              </body>
          </div>
      <table>
		<tr>
			
		</tr>
	</table>
      </div></div></form></body></html>
     