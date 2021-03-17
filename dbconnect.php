<?php 
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=database", "root", "");
	}
	catch(PDOException $pdo){
		die("Lidhja me DB - Deshtoj!");
	}
?>