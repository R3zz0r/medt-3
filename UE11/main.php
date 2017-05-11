<?php
if($_POST['user'] == 'root' && $_POST['pw'] == 'lol'){
		
		header('Location: projects.php');
	}
	else {
		echo "<p class=\"text-danger\">Anmeldedaten falsch</p>";

    }
?>