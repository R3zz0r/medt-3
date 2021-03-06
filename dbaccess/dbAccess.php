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

<style type="text/css">
	span.glyphicon {
		margin-right: 10px;
		color: #000;
	}
	a {
		text-decoration: none;

	}
</style>


</head>
<body>
<?php 
	$host='localhost';
	$dbname='medt3';
	$user='root';
	$pwd=;
	

	try{
		$db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
	}catch(PDOException $e){
		exit("<h2 class=\"bg-danger\">System nicht verfügbar!</h2>");
	}
	

	//PDOStatement
	$res = $db->query ("SELECT * FROM project");
	//Array
	$temp = $res->fetchAll(PDO::FETCH_ASSOC);
	

	if (isset($_GET['delete'])) {
		$deleteid=$_GET['delete'];
		$sql = "DELETE FROM project WHERE id=$deleteid";
		$db->exec($sql);
		header("Location:".$_SERVER['PHP_SELF']); 
	}


	if (isset($_GET['edit'])) {
		$editid = $_GET['edit'];
		setcookie("idid",$editid);

		$sql=$db->prepare("SELECT name, description, createDate FROM project WHERE id = $editid");
		$sql->execute();
		$projectdata=$sql->fetch(\PDO::FETCH_ASSOC);
	}


	if (isset($_GET['submitbtn'])) {
		$pname=$_GET['name'];
		$pdescription=$_GET['description'];
		$pdate=$_GET['createDate'];
		$pid=$_COOKIE['idid'];
		$sql = "UPDATE project SET name=:name, description=:description, createDate=:createDate WHERE id=$pid";
			$stmt = $db->prepare($sql);
				$stmt->bindParam(':name', $_GET['name'], PDO::PARAM_STR); 
				$stmt->bindParam(':description', $_GET['description'], PDO::PARAM_STR);
				$stmt->bindParam(':createDate', $_GET['createDate'], PDO::PARAM_STR);
			$stmt->execute();
		header("Location:".$_SERVER['PHP_SELF']);   
	}

	if (isset($_GET['closebtn'])) {
		header("Location:".$_SERVER['PHP_SELF']); 
	}
?>
<div class="container">
<h1>Projektübersicht</h1>
<table class="table table-hover">
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
		foreach ($temp as $row) { ?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['createDate'];?></td>
                <td>
                	<a href="dbAccess.php?edit=<?php echo $row['id']; ?>&modal=open"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="dbAccess.php?delete=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
			</tr>
	<?php } ?>
	</tbody>
</table>

<div id="myModal" class="modal fade myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<form>
        	<button type="submit" class="close" name="closebtn" value="close">&times;</button>
        </form>
        <h4 class="modal-title">
        	Projekt 
        	<?php  
        		print_r($projectdata['name']);
        	?>
        	bearbeiten
        </h4>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label class="control-label">Name</label>
        		<input type="text" class="form-control" name="name" value="<?php print_r($projectdata['name']); ?>">
        	</div>
        	<div class="form-group">
        		<label class="control-label">Beschreibung</label>
        		<input type="text" class="form-control" name="description" value="<?php print_r($projectdata['description']); ?>">
        	</div>
        	<div class="form-group">
        		<label class="control-label">Datum</label>
        		<input type="text" class="form-control" name="createDate" value="<?php print_r($projectdata['createDate']); ?>">
        	</div>
        	<div style="float:right;">
        	<button type="submit" class="btn btn-default" name="submitbtn" value="confirm">Aktualisieren</button>
        	<button type="submit" class="btn btn-default" name="closebtn" value="close">Abbrechen</button>
        	</div>
        	<div style="clear:both;"></div>
        </form>
      </div>
  </div>
</div>

<?php  

if (isset($_GET['modal'])) {
	echo "<script>$(\"#myModal\").modal('show')</script>";
}

?>

</div>
</body>
</html>