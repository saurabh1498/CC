<?php
	if($_SERVER["REQUEST_METHOD"] === "POST") {
		$servername = "localhost";
		$username = "user1";
		$password = "password";
		$database = 'users_db';
		
		$name = $_POST['name'];
		// Create connection
		$conn = new mysqli($servername, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		}

		$query = "INSERT INTO users VALUES('$name')";
		//$result = mysqli_query($conn,$query);
		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
		}
		else {
			echo "Error: " . $result . "<br>" . $query . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
<html>
	<h3>Hello, Add new user</h3>
	<body>
		<form action = "/db_demo.php" method = "POST">
			<label>UserName  :</label><input type = "text" name = "name"><br><br>
			<input type = "submit" value = " Submit "/><br />
		</form>
	</body>
</html>

<?php
	$servername = "localhost";
	$username = "user1";
	$password = "password";
	$database = 'users_db';


	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$query = "SELECT name from users";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		// output data of each row
		echo "<h4>Users:</h4><ul>";
		while($row = $result->fetch_assoc()) {
				echo "<li>" . $row["name"] ."</li>";
		}
		echo "</ul>";
	} else {
		echo "0 Users";
	}
	$conn->close();
?>
