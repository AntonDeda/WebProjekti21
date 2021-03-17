<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    include './controllers/StafiController.php';

    $posto = new StafiController;

    if(isset($_GET['stafi_id'])){
		$profiliId = $_GET['stafi_id'];
    }
    
    $personiProfili = $posto->edit($profiliId);


    
?>
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
                <div id="profiliStafit">
                    <div class="teamPersonProfili">
                        <h1><?php echo $personiProfili['stafi_fullname']; ?></h1>						
                        <img src="<?php echo $personiProfili['stafi_image']; ?>"><!--Kete rast kane fotografi te njejt por vetem src 
                        te ndryshohet-->
                        <p><?php echo $personiProfili['stafi_pershkrimi']; ?></p>
                        <p><strong>Certifikimi: </strong><?php echo $personiProfili['stafi_certifikimi']; ?></p>
                        <a href="aboutUs.php">Kthehu prapa</a>
                        <?php if($_SESSION['role']==1){ ?>
                            <a href="editStafi.php?stafi_id=<?php echo $personiProfili['stafi_id'];?>">Edit</a>
                            <a href="deleteStafi.php?stafi_id=<?php echo $personiProfili['stafi_id'];?>">Delete</a>
                        <?php }?>						
                    </div>
                </div>
            </div>
        </div>
        <?php 
			include ("includes/footer.php");
		?>
		<script src="js/main.js"></script>
    </body>
</html>