<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>

<div class="container-fluid" style="padding-left: 35px;">

<h2>Grid Generator</h2>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<div class="form-group">

<label><input type="checkbox" name="days[]" value="Sunday"> Sunday</label>
<label><input type="checkbox" name="days[]" value="Monday"> Monday</label>
<label><input type="checkbox" name="days[]" value="Tuesday"> Tuesday</label>
<label><input type="checkbox" name="days[]" value="Wednesday"> Wednesday</label>
<label><input type="checkbox" name="days[]" value="Thursday"> Thurday</label>
<label><input type="checkbox" name="days[]" value="Friday"> Friday</label>
<label><input type="checkbox" name="days[]" value="Saturday"> Saturday</label>
</div>

<label>Enter number of fields <input type="number" name="spalten" required></label>

<button type="submit" name="btn">Generate</button>

</form>

<hr style="border-width:2px; border-color:#000;">

<?php 
if (isset($_POST['btn'])) {
 ?>
<table class="table table-hover">
	<thead>
	  <tr>
	    <th>Day</th>
	    <?php 
	    	$spalte=$_POST['spalten'];
	    	for ($i=1; $i < $spalte+1; $i++) { 
	    		echo '<th>Event '.$i.'</th>';
	    	}
	    ?>
	  </tr>
	</thead>
	<tbody>
		<?php 
			$day=$_POST['days'];
			for ($i=0; $i < sizeof($day); $i++) { 
				echo '<tr><td>'.$day[$i].'</td>';
				for ($j=1; $j < $spalte+1; $j++) { 
					$k=$i+1;
					echo '<td>event '.$k.'.'.$j;
				}
			}
		?>
	</tbody>
</table>
<?php 
}
?>





</div>




</body>
</html>