<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    include './controllers/StafiController.php';

    $posto = new StafiController;

    if(isset($_GET['stafi_id'])){
        $profiliId = $_GET['stafi_id'];
    }

    $personiProfili = $posto->edit($profiliId);

    $nameError = "";
	$certifikimiError = "";
	$imageError = "";
	$pershkrimiError = "";
	
	function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
	
    if(isset($_POST['submit'])) {
		if(empty($_POST['stafi_fullname'])){
			echo'Stafi_full name eshte i zbrazt!';
            $nameError = "Emri nuk mund te jete i zbrazt!";
        }else{
            $_POST['stafi_fullname'] = testInput($_POST['stafi_fullname']);
		}

		if(empty($_POST['stafi_certifikimi'])){
            $certifikimiError = "Certifikimi nuk mund te jete i zbrazt!";
        }else{
            $_POST['stafi_certifikimi'] = testInput($_POST['stafi_certifikimi']);
        }
		
		if(empty($_POST['stafi_image'])){
            $imageError = "Img nuk mund te jete i zbrazt!";
        }else{
            $_POST['stafi_image'] = testInput($_POST['stafi_image']);
		}

		if(empty($_POST['stafi_pershkrimi'])){
            $pershkrimiError = "Pershkrimi nuk mund te jete i zbrazt!";
        }else{
            $_POST['stafi_pershkrimi'] = testInput($_POST['stafi_pershkrimi']);
		}
		
		if(empty($nameError) && empty($certifikimiError) && empty($imageError) && empty($pershkrimiError)){
			if($posto->ekziston($_POST)){
				$ekziston=true;
			}else{
				$result=$posto->update($_POST);	
			}
		}
		
    }
    
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
                <div class="loginRegisterContainer">
                    <div class="loginRegister"> 
                        <?php if(isset($ekziston)){
                            if($ekziston){?>
                                <p style="color:red;">Ne staf ekziston ky person!</p>
                            <?php }
                        }?>
                        <?php if(isset($result)){ 
                            if($result){ ?>
                                <p style="color:green;">Regjistrimi perfundoj me sukses!</p>
                            <?php } else{?>
                                <p style="color:red;">Regjistrimi deshtoi!</p>
                            <?php }?>
                        <?php }?>
                        <h1>Edito: <?php echo $personiProfili['stafi_fullname']; ?></h1>
                        <form action="editStafi.php" method="post">
                            <input type="text" name="stafi_fullname" value="<?php if(!isset($result)){echo $personiProfili['stafi_fullname'];} ?>"><br>
                            <span style="color:red;"><?php echo $nameError; ?></span>
                            <label> <strong>FullName</strong></label>
                            <input type="text" name="stafi_certifikimi" value="<?php if(!isset($result)){echo $personiProfili['stafi_certifikimi'];} ?>"><br>
                            <span style="color:red;"><?php echo $certifikimiError; ?></span>
                            <label> <strong>Certifikimi</strong></label>
                            <input type="text" name="stafi_image" value="<?php if(!isset($result)){echo $personiProfili['stafi_image'];} ?>"><br>
						    <span style="color:red;"><?php echo $imageError; ?></span>  
                            <label> <strong>img</strong></label>
                            <input type="text" name="stafi_pershkrimi" value="<?php if(!isset($result)){echo $personiProfili['stafi_pershkrimi'];} ?>"><br>
						    <span style="color:red;"><?php echo $pershkrimiError; ?></span>
                            <label> <strong>Pershkrimi</strong></label><br>
                            <input type="hidden" name="stafi_id" value="<?php if(!isset($result)){echo $personiProfili['stafi_id'];} ?>">
                            <input type="submit" name="submit" class="formButton" value="submit">
                        </form>
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