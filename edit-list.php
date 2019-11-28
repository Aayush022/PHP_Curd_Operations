<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>

	<body>
		<?php
			require_once(__DIR__."/php/db_conf.php");
	// var_dump('I am here...');exit();
		?>
			<?php
				$id = $_GET['id'];
				$newqur = "SELECT * FROM employee WHERE id=$id";
				$result = mysqli_query($con, $newqur );

				while($user_data = mysqli_fetch_array($result))
				{
					$fname = $user_data['fname'];
					$lname = $user_data['lname'];
					$country = $user_data['country'];
					$cname = $user_data['cname'];
				}
			?>
		<div class="container" id="form-new">
			<form action="/php/connection.php" method="POST" >
			<div class="row">
					<div class="col-25" style="display: none;">
						<label for="id">id</label>
					</div>
					<div class="col-75" style="display: none">
						<input type="text" id="id" name="id" value=<?php echo $id;?>>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="fname">First Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="fname" name="fname" value=<?php echo $fname;?>>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="lname">Last Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="lname" name="lname" value=<?php echo $lname;?> required/>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="country">Country</label>
					</div>
					<div class="col-75">
						<input type="text" id="country" name="country" value=<?php echo $country;?> required/>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="cname">Company Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="cname" name="cname" value=<?php echo $cname;?> required/>
					</div>
				</div>
				<div class="row">
					<input type="submit" value="Update" name="Update">
				</div>
			</form>
		</div>
	</body>

</html>