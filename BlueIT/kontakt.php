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

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="kontaktstyle.css">

</head>
<body>

<div class="container">

	<div class="container" id="header">
		<div class="row">
			<div class="col-lg-3">
				<img src="logo.png">
			</div>
			<div class="col-lg-4">
				<h3 style="color: #0093dd;">Entwicklung und Beratung</h3>
			</div>
		</div>
	</div>

	<nav class="navbar" style="background-color: #0093dd";>
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="about.php">About</a></li>
	        <li><a href="portfolio.php">Portfolio</a></li>
	        <li class="active"><a href="kontakt.php">Kontakt</a></li>
	        <li><a href="meinkonto.php">Mein Konto</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="row">
		<div class="col-md-9">
			<main>
			  <?php
        	  if (!isset($_POST['submitbtn']))
              {
              	?>
				<h3>Kontakt</h3>
				<h4>Wir freuen uns auf Ihre Anfrage!</h4>
				<br>
				<p>Der Grund für Ihre Anfrage*</p>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label class="radio"><input type="radio" name="grund" value="Freie Stellen" required>Freie Stellen</label>
					<label class="radio"><input type="radio" name="grund" value="Produktreklamation" required>Produktreklamation</label>
					<label class="radio"><input type="radio" name="grund" value="Produktneuheiten" required>Produktneuheiten</label>
					<br>
					<p>Anrede *
					<label class="radio anrede"><input type="radio" name="anrede" value="Frau" required>Frau</label>
					<label class="radio anrede"><input type="radio" name="anrede" value="Herr" required>Herr</label>
					</p>
					<br>
					<label class="name">Vorname * <input type="text" name="vn" required></label>
					<label class="name">Nachname * <input type="text" name="nn" required></label>
					<br><br>
					<label>Straße + Hausnummer * <input type="text"></label>
					<br>
					<label>PLZ * <input type="text" style="width: 50px;"></label>
					<label>Ort * <input type="text" required></label>
					<br>
					<select size="1" name="land" required>
						<option>Österreich</option>
						<option>Deutschland</option>
						<option>Schweiz</option>
					</select>
					<br><br>
					<label>Telefon <input type="number" style="width: 100px;"></label>
					<label>E-Mail * <input type="email" name="email" style="width: 100px;" required></label>
					<br><br>
					<p>Anfrage * </p><textarea rows="4" name="text" cols="30" required style="resize: none;"></textarea>
					<br><br>
					<button type="submit" name="submitbtn">Anfrage senden</button>
					<br>
					<p style="font-size: 13px;">* Pflichtfelder</p>
				</form>
			  <?php
		        } else
		        {
		          require 'PHPMailer/PHPMailerAutoload.php';

		          $mail = new PHPMailer();

		          $mail->IsSMTP();

		          $mail->SMTPDebug = 0;

		          $mail->Debugoutput = 'html';

		          $mail->Host = 'SMTP.gmail.com';

		          $mail->Port = 587; 

		          $mail->SMTPSecure = 'tls'; 

		          $mail->SMTPAuth = true;
		          
		          $mail->Username = "emilauer18@gmail.com";

		          $mail->Password = "emil150999"; 
		          
		          $mail->addReplyTo('emilauer18@gmail.com', 'First Last');
		          
		          $mail->addAddress('emilauer18@gmail.com', 'Emilio');
		          
		          $mail->Subject = $_POST['grund'];
		          
		          $mail->Body    = $_POST['anrede'].' '.$_POST['vn'].' '.$_POST['nn']."\r\n".$_POST['email']."\r\n".$_POST['text'];

		          if ($mail->send()) {
		              /*echo "Mailer Error: " . $mail->ErrorInfo;*/
		              ?><h4>Ihre Anfrage wurde versendet!</h4><?php
		          }  else {
						echo "Mailer Error: " . $mail->ErrorInfo;
					}
		        }
		      ?>
			</main>
		</div>
		<div class="col-md-3">
			<aside>
				<h3>Aktuelle Postings</h3>
				<section>
					<h4>Posting 1</h4>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				</section>
				<section>
					<h4>Posting 1</h4>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				</section>
			</aside>
		</div>
	</div>

	<footer>
		&copy; blueIT 2014
	</footer>


</div>

</body>
</html>