<?php 
	$host='localhost';
	$dbname='medt3';
	$user='htluser';
	$pwd='htluser';

	$db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<?php 

$res = $db->query ("SELECT * FROM project");
$temp = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
<table class="table table-hover">
	<thead>
	  <tr>
	    <th>Name</th>
	    <th>Beschreibung</th>
	    <th>Datum</th>
	  </tr>
	</thead>
	<tbody>


	<?php
		foreach ($temp as $row) { ?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['createDate'];?></td>
			</tr>
		<?php } ?>



	</tbody>
</table>
</div>

</body>
</html>