<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require './controllers/StafiController.php';

	$posto = new StafiController;

	$stafi = $posto->all();

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
				$result=$posto->store($_POST);	
			}
		}
		
    }

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
		<?php if(isset($_SESSION['role']) && $_SESSION['role']==1){ ?>
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
					<h1>Shto Antarin</h1>
					<form action="aboutUs.php" method="post"><!--onsubmit="return validoAntarin();" -->
            			<input type="text" id="stafi_fullname" name="stafi_fullname" placeholder="FullName"><br>
						<span style="color:red;"><?php echo $nameError; ?></span>
						<input type="text" id="stafi_certifikimi" name="stafi_certifikimi" placeholder="certifikimi"><br>
						<!--<input type="text" name="kategoria" placeholder="kategoria"><br> -->
						<span style="color:red;"><?php echo $certifikimiError; ?></span>
						<input type="text" id="stafi_img" name="stafi_image" placeholder="image"><br>
						<span style="color:red;"><?php echo $imageError; ?></span>
						<textarea type="text" id="stafi_pershkrimi" name="stafi_pershkrimi" rows="4" column="29" placeholder="Pershkrimi"></textarea><br>
						<span style="color:red;"><?php echo $pershkrimiError; ?></span>
						<input type="submit" name="submit" class="formButton" value="Shto Antarin"><br>
        			</form>
				</div>
			</div>
		</div>
		<?php }?>
		<div class="container">
			<div class="content">
				<div class="titleContact">
					<h1>About Us</h1>
				</div>
				<div class="permbjajta-aboutUs">
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium 
					voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati 
					cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, 
					id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. 
					Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id 
					quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
					Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet 
					ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur 
					a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis 
					doloribus asperiores repellat.</p><hr/>
					<h2 >The team</h2>
					<div class="team">
						<?php foreach($stafi as $personi){ ?>
							<div class="team-person">
								<h2><?php echo $personi['stafi_fullname']; ?></h2>
								<h3><?php echo $personi['stafi_certifikimi']; ?></h3>
								<img src="<?php echo $personi['stafi_image']; ?>">
								<a href="stafiShow.php<?php echo "?stafi_id=".$personi['stafi_id'];?>" onclick="shikoProfilin(0)">Shiko Profilin</a>
							</div>	
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
