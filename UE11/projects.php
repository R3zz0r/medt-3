<?php
session_start();
	$_SESSION['User'] = 'root';


	$host='localhost';
	$dbname='medt3';
	$user='root';
	$pwd='';


	try{
		$db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
	}catch(PDOException $e){
		exit("<h2 class=\"bg-danger\">System nicht verfügbar!<br><br>$e</h2>");
	}

	if(isset($_POST['deleteProId'])) {
		try{
			$db->query("DELETE FROM project WHERE id=".$_POST['deleteProId']);
			echo 1;
		}catch(PDOException $e){
			echo 0;
		}
		exit;
	}

if (isset($_GET['logout'])) 
{
	session_unset();
	session_destroy();
	header('Location: index.php');

}

?>
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
<p>Logged in as: <?php echo $_SESSION['User'] ?>
<?php
require('isLoggedIn.php');
?>
</p>
<div class="container">
<h1>Projektübersicht</h1>
<p id="info-box"></p>
<table class="table">
	<thead>
	  <tr>
        <th>Name</th>
        <th>Beschreibung</th>
        <th>Datum</th>
        <th>Operationen</th>
	  </tr>
	</thead>
	<tbody>
	<?php
	$res = $db->query("SELECT * FROM project");
	$temp = $res->fetchAll(PDO::FETCH_ASSOC);
		foreach ($temp as $row) { ?>
			<tr id="<?php echo $row['id']?>">
				<td><?php echo htmlspecialchars($row['name']);?></td>
				<td><?php echo htmlspecialchars($row['description']);?></td>
				<td><?php echo htmlspecialchars($row['date']);?></td>
		        <td>
		        	<span class="glyphicon glyphicon-pencil edit"></span>
		          	<span class="glyphicon glyphicon-trash delete"></span>
		        </td>
			</tr>
	<?php } ?>
	</tbody>
</table>
<form> <input type="submit" class="btn" name="logout" value="Logout"></form>

</div>

<script src="trackstar.js"></script>

</body>
</html>
