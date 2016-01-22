<!DOCTYPE html>
	<html>
		<head>
			<title>Coding Tracks</title>
			<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,600' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="css/main.css"/>
		</head>

		<body bgcolor="#D3D3D3">
			<span id="header">
				<p align="right"><a href="../index.html">Home</a></p>
				<center>
					<h1 id="start">Coding Tracks</h1>
					<h4><em>Hand-picked resources for all types of programmers!</em></h4>
				</center>
			</span>

			<div style="width: 40%; margin: 0 auto;">
				<?php
					$db = new SQLite3('my_database') or die('Unable to open database');
					$query = "CREATE TABLE IF NOT EXISTS information(name STRING PRIMARY KEY, email STRING, mobile STRING)";
					$db->exec($query) or die('Database creation failed.');

					$name = $email = $mobile = '';
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						$name = $_POST['name'];
						$email = $_POST['email'];
						$mobile = $_POST['mobile'];

						$query = "DELETE FROM information; INSERT INTO information VALUES('$name', '$email', '$mobile');";
						$db->exec($query) or die('Unable to update information.');
					} else {
						$result = $db->query('SELECT * FROM information') or die('Query failed.');
						while($row = $result->fetchArray()) {
							$name = $row['name'];
							$email = $row['email'];
							$mobile = $row['mobile'];
						}
					}
				?>
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<span>Full name</span><br>
					<input type="text" id="name" name="name" value="<?php echo $name;?>" style="width: 500px; height: 15px; border-radius: 3px;" autofocus required ><br><br>
					<span>Email address</span><br>
					<input type="text" id="email" name="email" value="<?php echo $email;?>" style="width: 500px; height: 15px; border-radius: 3px;" required><br><br>
					<span>Mobile phone (optional)</span><br>
					<input type="text" id="mobile" name="mobile" value="<?php echo $mobile;?>" style="width: 500px; height: 15px; border-radius: 3px;" onblur="checkFields()"><br><br>
					<span>Birthday (optional): </span>
					<select name="birthday" id="birthday">
						<option value="default">Month</option>
						<option value="january">January</option>
						<option value="february">February</option>
						<option value="march">March</option>
						<option value="april">April</option>
						<option value="may">May</option>
						<option value="june">June</option>
						<option value="july">July</option>
						<option value="august">August</option>
						<option value="september">September</option>
						<option value="october">October</option>
						<option value="november">November</option>
						<option value="december">December</option>
					</select>
					<select name="day" id="day">
						<option value="default">Day</option>
					</select>
					<select name="year" id="year">
						<option value="default">Year</option>
					</select><br><br>
					<span>Gender (optional): </span>
					<select name="gender" id="gender">
						<option value="default">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select><br><br>
					<span>Development field: </span><br>
					<div>
						<input type="radio" id="web-dev" name="branch" onclick="updateLanguages()">Web Development<br>
						<input type="radio" id="mobile-dev" name="branch" onclick="updateLanguages()">Mobile Development<br>
						<input type="radio" id="other" name="branch" onclick="updateLanguages()">Other<br><br>
					</div>
					<span>Coding track: </span>
					<select value="lang" id="lang" style="width: 125px;">
						<option value="Select"></option>
					</select><br><br>
					<center>
						I would like to receive special offers via email: <input type="checkbox" name="vehicle" value="Bike" checked>Yes!<br><br>
						<input type="submit" value="Discover track!" onclick="submitForm()">
					</center>
				</form>
			</div>

			<script src="js/main.js"></script>
		</body>
	</html>
