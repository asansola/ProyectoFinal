<?php
   
    //connection to the database
  
    $id = $_GET['id'];  
 
    if (isset($_POST['submit'])) {
    	$id = $_POST['id'];
    	$name = $_POST['name'];
    	$phone = $_POST['phone'];
    	$address = $_POST['address'];
    	$email = $_POST['email'];
    	$qryUpt = "UPDATE `details` SET `name` = '$name', `phone` = '$phone', `address`='$address', `email`='$email' WHERE `sn`=$id";
    	mysql_query($qryUpt) or die(mysql_error());
    	header("location:index.php");
    }
 
   
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
 
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="editdata.php" role="form">
	<div class="modal-body">             
		<div class="form-group">
			<label for="name">ID
				<input type="text" id="id" name="id" value="<?php echo $mem['sn'];?>" readonly="true"/>
			</label>
		</div>	
		<div class="form-group">
			<label for="name">Name
				<input type="text" id="name" name="name" value="<?php echo $mem['name'];?>" />
			</label>
		</div>	
		<div class="form-group">
			<label>Phone
				<input type="text" id="job" name="phone" value="<?php echo $mem['phone'];?>" />
			</label>
		</div>	
		<div class="form-group">
			<label>Address
				<input type="text" id="service" name="address" value="<?php echo $mem['address'];?>" />
			</label>
		</div>	
		<div class="form-group">
			<label>Email
				<input type="text" id="education" name="email" value="<?php echo $mem['email'];?>" />
			</label>
		</div>	
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>