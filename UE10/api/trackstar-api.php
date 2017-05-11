<?php
    require "db/db.php";
    if(isset($_POST['deleteProId']))
    {
    //Dynamisch umsetzen -> rowcount
		try{
			$del = "DELETE FROM project WHERE id=".$_POST['deleteProId'];
			$db->exec($del);
			echo 1;
		}catch(PDOException $e){
			echo 0;
		}
		exit;
    }
?>