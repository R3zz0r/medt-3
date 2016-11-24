<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MEDT - Explode</title>

		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
	<body>
		<div class="container">
			<h1>Hausübung Explode</h1>
			<form>
			  <div class="form-group">
			    <label for="input">Eingabe: </label>
			    <input type="text" class="form-control" name="input" placeholder="Bitte einen Satz eingeben">
			  </div>
			  <button type="submit" class="btn btn-default" name="submitBtn">Explode</button>
			  <button class="btn btn-default">Reset</button>
			</form><br>
			<table class="table table-striped">
		    <tbody>

<?php
if (isset($_GET['submitBtn'])) 
{
	$input = $_GET['input'];

	$exploded = explode(" ", $input);

	PrintList($exploded, $input);
}

function PrintList($exploded, $input)
{
	if ($input == "" || $input == " ") 
	{
		echo "<h2>Keine Eingabe!";
	}
	else 
	{
		echo "<h2>Ihre Eingabe als Liste:</h3>";
		echo "<ul>";
			foreach ($exploded as $item) 
			{
				if($item != "")
				{
				echo "<tr><td><li>".$item."</li></td></tr>";
				}
			}

			echo "</ul>";
	}
}
?>
		    </tbody>
		  </table>
		</div>
	</body>
</html>
