<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
    <h2>Herzlich Willkommen!<h2>





<br>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
    <div>
    <label>Benutzername:</label>
    <br><input type='text' name='user' required>
    <br> <br>
    <label>Passwort:</label>
    <br><input type='text'  name='pw' required>
    </div>
    <br><button type='submit' class='btn btn-default' name='confirm_btn'>Login</button>
</form>
<?php

if (isset($_POST['confirm_btn'])) {
	include('main.php');
}

?>

</div>
<script src="trackstar.js"></script>

</body>
</html>
