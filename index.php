<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Entry Form</title>
	<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
	<?php
	
		include("db_config.php");

		if(isset($_REQUEST['submit'])){
			//checking for empty fields

			if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "" ) || ($_REQUEST['batch'] == "" ) ||
			 ($_REQUEST['phone'] == "" )){
				echo "<h4 style='color:red'>Fill All Fields...</h4>";
			 }else{
				 $name = $_REQUEST['name'];
				 $email = $_REQUEST['email'];
				 $batch = $_REQUEST['batch'];
				 $phone = $_REQUEST['phone'];
				 $sql = "INSERT INTO prime_info (stu_id, stu_name, stu_email, stu_batch, stu_phone) VALUES (NULL, '$name', '$email', '$batch','$phone')";
				
				if(mysqli_query($con, $sql)){
					echo "<script>alert('New Record Inserted Successfully')</script>";
				}else{
					echo "<script>alert('Unable to insert data')</script>";
				}

			 }
			 
	    }

	?>
	<div class="container">
		<div class="row">
			<div class=" col-sm-4 ">
				<h2 style="text-transform: uppercase;">Student Entry Form</h2>
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
					</div>
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Enter Your Email">
					</div>
					<div class="form-group">
						<label for="name">Batch</label>
						<select name="batch" class="form-control">
							<option value="WDPF-44">WDPF-44</option>
							<option disabled>Select any one</option>
							<option value="WDPF-45">WDPF-45</option>
							<option value="WDPF-43">WDPF-43</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Phone</label>
						<input type="text" class="form-control" name="phone" placeholder="Enter Your Phone">
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
			<div class=" col-sm-offset-1 col-sm-7">
				<h2 style="text-transform: uppercase;">Student Information Table</h2>
				<?php

					$sql = "SELECT * FROM prime_info";
					$result = mysqli_query($con, $sql);

					if(mysqli_num_rows($result) > 0){	
					echo '<table class="table table-bordered table-condensed table-hover table-responsive table-striped">';
						echo "<thead>";
							echo "<tr>";
								echo "<th> ID </th>";
								echo "<th> Name </th>";
								echo "<th> Email </th>";
								echo "<th> Batch </th>";
								echo "<th> Phone </th>";
							echo "</tr>";
						echo "</thead>";
						echo "<tbody>";
							while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
								echo "<td>" . $row["stu_id"] . "</td>";
								echo "<td>" . $row["stu_name"] . "</td>";
								echo "<td>" . $row["stu_email"] . "</td>";
								echo "<td>" . $row["stu_batch"] . "</td>";
								echo "<td>" . $row["stu_phone"] . "</td>";
							echo "</tr>";
						}
						echo "</tbody>";
					echo '</table>';

					}
				?>
			</div>		
		</div>
	</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
</html>