<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    require './controllers/ContactController.php';
    $posto = new ContactController;

    if(isset($_GET['id'])){
		$contactId = $_GET['id'];
    }

    $posto->destroy($contactId);

?>
