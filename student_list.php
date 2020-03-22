<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student List</title>
</head>
<body>
	<div>
		<h2 >STUDENTS ENTRY INFORMATION:</h2>
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<?php

					include("db_config.php");
					$sql = "SELECT * FROM prime_info";
					$result = mysqli_query($con, $sql);

					if(mysqli_num_rows($result)>0){	
					echo '<table class="table">';
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

	
</body>
</html>