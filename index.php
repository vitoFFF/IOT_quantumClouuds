<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "wtf";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}


if (isset($_POST['toggle_LED'])) {
	$sql = "SELECT * FROM LED_status;";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	
	if($row['status'] == 0){
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");		
	}		
	else{
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 0 WHERE id = 1;");		
	}
}



$sql = "SELECT * FROM LED_status;";
$result   = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);	

?>

<style>

#submit_button2{
		background-color: #0D022E; 
		color: white; 
		font-weight: bold; 
		font-size: 26; 
		border-radius: 15px;
    	        text-align: center;
                height:70px;
              width:166px;  }
			  #submit_button3{
		background-color: #0D022E; 
		color: white; 
		font-weight: bold; 
		font-size: 26; 
		border-radius: 15px;
    	        text-align: center;
                height:70px;
              width:166px;  }
			  #submit_button4{
		background-color: #0D022E; 
		color: white; 
		font-weight: bold; 
		font-size: 26; 
		border-radius: 15px;
    	        text-align: center;
                height:70px;
              width:166px;  }
	
        
        <?php
				if($row['status'] == 0){?>
			
					#submit_button{
		background-color: #0D022E; 
		color: white; 
		font-weight: bold; 
		font-size: 26; 
		border-radius: 15px;
    	        text-align: center;
                height:70px;
              width:166px;
	}
			<?php	
				}
				else{ ?>
				#submit_button{
		background-color: #0D022E; 
		color: orange; 
		font-weight: bold; 
		font-size: 26; 
		border-radius: 15px;
    	        text-align: center;
                height:70px;
    width:166px;
	}
			<?php
				}
			?>
        
        
		body 
		{
			/*main text color*/
			color: #0D022E;
		}
	
	@media only screen and (max-width: 600px) {
		.col_3 {
			width: 100%;
		}

		#submit_button
		{
            height:70px;
            width:45%; 
		}
		#submit_button2
		{
            height:70px;
            width:45%; 
		}
		#submit_button3
		{
            height:70px;
            width:45%; 
		}
		#submit_button4
		{
            height:70px;
            width:45%; 
		}
 
		
		
	
	}

</style>


<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper" id="refresh">
		<div class="col_3">
		</div>

		<div class="col_3" >
		<br>
				<br>
			
			<?php echo '<h1 style="text-align: center;">Beyond Infinity: '.$row['status'].'</h1>';?>
                        
			<div class="col_3">
			</div>
			
			<div class="col_3" style="text-align: center;">
			<br>
				<br>
			<form action="index.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button" onclick="audio.play();"  type="submit" name="toggle_LED" value="Room 1" />
				<input id="submit_button2" type="submit" name="toggle_LED2" value="Room 2" />
				<br>
				<br>
				<input id="submit_button3" type="submit" name="toggle_LED3" value="Room 3" />
				<input id="submit_button4" type="submit" name="toggle_LED4" value="Room 4" />
				

                                
                                
			</form>
                        
          

  
				
			<script type="text/javascript">
				
			$(document).ready (function () {
				var updater = setTimeout (function () {
					$('div#refresh').load ('index.php', 'update=true');
				}, 300);
			
			});
			/*const audio = new Audio();
				
				audio.src = "./switch1.mp3";*/

			

			</script>
		
			</div>
				
			<div class="col_3">
			</div>
		</div>

		<div class="col_3">
		</div>
	</div>
</body>
</html>

</html>
