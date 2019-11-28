<?php
	session_start();
	// var_dump($_SESSION);
?>
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
		<div class="topnav" id="myTopnav">
			<a class="tabs active" onclick="openTab(event,'form-new')">Home</a>
			<a class="tabs" onclick="openTab(event,'list-table')" >New Entry</a>
		</div>
		<?php
			require_once(__DIR__."/php/db_conf.php");
	// var_dump('I am here...');exit();
		?>
		<?php
			ini_set( "display_errors", 0);
			// print_r($_SESSION);
			if(!empty($_SESSION['message'])):
		?>
		<div class="alert alert-<?=$_SESSION['type']?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
			<?php endif; ?>
		<?php
			$dbhost = 'localhost:3306';
			$dbuser = 'root';
			// $dbpass = 'lCcrEmsvI2+B';
			$dbpass = '12345';
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'test_dbn');

			if(! $conn ) {
				die(mysqli_error($conn));
			}
			$newsql = "SELECT * FROM employee";
			$result = mysqli_query( $conn, $newsql);

		?>
		<div class="container" id="list-table">
			<form action="/php/connection.php" method="POST" >
				<div class="row">
					<div class="col-25">
						<label for="fname">First Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="fname" name="fname" placeholder="Your name.." required/>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="lname">Last Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="lname" name="lname" placeholder="Your Last name.." required/>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="country">Country</label>
					</div>
					<div class="col-75">
						<input type="text" id="country" name="country" placeholder="Your Country name.." required/>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="cname">Company Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="cname" name="cname" placeholder="Your Company name.." required/>
					</div>
				</div>
				<div class="row">
					<input type="submit" value="Submit" name="Submit" onClick="subCheck()">
				</div>
			</form>
		</div>
		<div class="container" id="form-new">
				<table>
					<tr>
						<th>S.No</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Country</th>
						<th>Company</th>
						<th>Action</th>
					</tr>
					<?php while( $row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['fname'] ?></td>
						<td><?php echo $row['lname'] ?></td>
						<td><?php echo $row['country'] ?></td>
						<td><?php echo $row['cname'] ?></td>
						<td>
							<div class='edit-div'>
								<a href="edit-list.php?id=<?php echo $row['id'];?>" class="edit-a">Edit</a>
							</div>
							<div class='delete-div'>
								<a data-toggle="modal" class="delete-a" data-target="#delete<?php echo $row['id'];?>">Delete</a>
							</div>
							<div id="delete<?php echo $row['id'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
											<div class="modal-header">
        								<h4 class="modal-title">Delete</h4>
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
      								</div>
											<div class="modal-body">
        								Do you want to delete ?
      								</div>
                      <div class="modal-footer">
												<a
												href="/php/connection.php?delete=<?php echo $row['id'];?>"class="btn btn-danger"> YES </a>
												<a type="button" class="btn btn-default" data-dismiss="modal"> NO </a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
							<!-- <a onclick="myFunction()" class="delete-a">Delete</a> -->
						</td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
	</body>

</html>