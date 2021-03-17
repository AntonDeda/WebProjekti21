<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    require './controllers/StafiController.php';

    if($_SESSION['role']==1){
        $post = new StafiController;

        if(isset($_GET['stafi_id'])) {
            $stafiId = $_GET['stafi_id'];
        }

        if(isset($stafiId)){
            $post->destroy($stafiId);
        }else{
            echo "Ka ndodhur nje gabim!";
        }
    }else{
        echo "NUK KENI CASJE!";
    }
?>
