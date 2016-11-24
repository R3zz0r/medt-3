<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Auswahllisten</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<form action="http://localhost/medt/ue6/auswahlen.php">
		<label><input type="radio" name="alter" value="cat1" checked>18-20</label>
		<label><input type="radio" name="alter" value="cat2">20-30</label>
		<label><input type="radio" name="alter" value="cat3">30-40</label>
		<label><input type="radio" name="alter" value="cat4">40+</label>

		<br>
		<br>

		<input type="checkbox" name="agb" value="agb">AGB gelesen

		<br>
		<button type="submit" name="submitBtn">Submit</button>

		<?php 
		if(isset($_GET['submitBtn']))
		{
			if(isset($_GET['agb']))
			{
				echo "AGB akzeptiert!";
			}
		}
		?>

		<br>
		<br>

		<label><input type="checkbox" name="city[]" value="NYC">New York City</label>
		<label><input type="checkbox" name="city[]" value="B">Boston</label>
		<label><input type="checkbox" name="city[]" value="SF">San Francisco</label>
		<label><input type="checkbox" name="city[]" value="DC">Washington DC</label>
		<br>
		<button type="submit" name="submitBtn">Submit</button>
		<br>

		<?php 
			if(isset($_GET['submitBtn']))
			{
				if(isset($_GET['city']))
				{
					foreach($_GET['city'] as $city)
					{
						echo "$city <br>";
					}
				}
			}
		?>


		<br>
		<br>

		<select size="3" name="auto1">
			<option>Audi</option>
			<option>BMW</option>
			<option>Renault</option>
			<option>Seat</option>
			<option>VW</option>
		</select>
		<br>
		<button type="submit" name="submitBtn">Submit</button>
		<br>

		<?php 
			if(isset($_GET['submitBtn']))
			{
				echo "Es wurden folgende Marken gewählt:".$_GET['auto1'];
			}
		?>


		<br>
		<br>

			<select name="auto[]" size="6" multiple>
				<option>Audi</option>
				<option>BMW</option>
				<option>Renault</option>
				<option>Seat</option>
				<option>VW</option>
			</select>
		<br>
		<button type="submit" name="submitBtn">Submit</button>	
		<?php
		if(isset($_GET['submitBtn']))
			{
			var_dump($_GET['auto']);
			}
		?>
	</form>

</body>
</html>