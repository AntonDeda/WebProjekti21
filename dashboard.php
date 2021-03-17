<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	if($_SESSION['role'] == 1){
	

	require 'includes/dbconnect.php';
	

	require './controllers/ContactController.php';
	
	$posto = new ContactController;
	$contactdata = $posto->all();

?>

<!doctype html>
<html>
	<head>
		<title>KompaniaX</title>
		<link rel="stylesheet" type = "text/css" href="css/style.css">
		<meta charset="utf-8">
		<style type="text/css"></style>
	</head>
	<body>
		<?php 
			include ("includes/header.php");
		?>
		<div class="container">
			<div class="content">
				<div class="titleContact">
					<h1>Kontaktet: </h1>
				</div>
				<div class="permbjajta-aboutUs">
					<?php foreach($contactdata as $contact): ?>
					<div class="teamPersonProfili">
						<p><strong>Emri: </strong><?php echo $contact['cf_firstname'] ?></p>
						<p><strong>Mbiemri: </strong><?php echo $contact['cf_lastname']; ?></p>
						<p><strong>Gjinia: </strong><?php echo $contact['cf_gender']; ?></p>
                        <p><strong>Email: </strong><?php echo $contact['cf_email']; ?></p>
                        <p><strong>Kombsia: </strong><?php echo $contact['cf_country']; ?></p>
                        <p><strong>Tema: </strong><?php echo $contact['cf_subject']; ?></p>
                        <p><strong>Data: </strong><?php echo $contact['cf_datemodified']; ?></p>
                        <a href="editContact.php?id=<?php echo $contact['cf_id']; ?>">Mark as read</a>
						<a href="deleteContact.php?id=<?php echo $contact['cf_id']; ?>">Delete</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php 
			include ("includes/footer.php");
		?>
		<script src="js/main.js"></script>
	</body>
</html>
					<?php }else if($_SESSION['role']==0){ 
						echo "Duhet te jeni admin per te pasur casje!";?>
						<a href="index.php">Kthehu prapa</a>
						<?php 
					}else{
						header("Location: login.php");
					} ?>