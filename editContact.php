<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    require './controllers/ContactController.php';
    $posto = new ContactController;

    if(isset($_GET['id'])){
		$contactId = $_GET['id'];
    }
    
    //$currenPost = $posto->edit($postimiId);
    $statusi = 1;

    $posto->update($contactId, $statusi);

?>
