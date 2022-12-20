<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToDoApp</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="text-center mt-5">Add a new item to the list</h1>
		<form action="send.php" method="POST">
				<div class="input-group mb-3">
  					<input type="text" class="form-control" placeholder="New item" aria-label="New item" aria-describedby="basic-addon2" name="newItem">
  					<div class="input-group-append">
    					<button class="btn btn-outline-secondary" type="submit">Add</button>
  					</div>
				</div>
		</form>
	</div>
	<div class="container text-center">
		<h1>List</h1>
		<?php
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "todoapp";

		$conn = mysqli_connect($host, $user, $password, $database);

		if (!$conn) {
			die("Could not connect to database: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM list";

		$result = mysqli_query($conn, $sql);

		if (!$result) {
			die("Error running query: " . mysqli_error($conn));
		}

		mysqli_close($conn);
		?>
		<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Task</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
	<?php 
			while ($row = mysqli_fetch_array($result)) {
	    		echo '	<tr>
							<td>'.$row['item'].'</td>
							<td><form action="delete.php" method="post">
									<button name="delId" value="'.$row['id'].'" class="btn btn-danger">X</button>
								</form>
							</td>
			  			</tr>
				';
			}
	?>
  </tbody>
</table>
<script>
	function deleteRecord(id){
		
	}
</script>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>