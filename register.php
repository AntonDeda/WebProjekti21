
<!--kodi oop-->
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require './controllers/UserController.php';

    $user = new UserController;

	$nameError = "";
    $lastnameError = "";
    $emailError = "";
    $passwordError = "";
	$imgError = "";
	
	function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
	
    if(isset($_POST['submit'])) {
		if(empty($_POST['name'])){
            $nameError = "Emri nuk mund te jete i zbrazt!";
        }else{
            $_POST['name'] = testInput($_POST['name']);
		}
		if(empty($_POST['lastname'])){
            $lastnameError = "Mbiemri nuk mund te jete i zbrazt!";
        }else{
            $_POST['lastname'] = testInput($_POST['lastname']);
        }

        if(empty($_POST['email'])){
            $emailError = "Emaili nuk mund te jete i zbrazt!";
        }else{
            $_POST['email'] = testInput($_POST['email']);
        }

        if(empty($_POST['password'])){
            $passwordError = "Passwordi nuk mund te jete i zbrazt!";
        }else{
            $_POST['password'] = testInput($_POST['password']);
        }

        if(empty($_POST['img'])){
            $imgError = "Img nuk mund te jete e zbrazt!";
        }else{
            $_POST['img'] = testInput($_POST['img']);
		}
		if(empty($nameError) && empty($lastnameError) && empty($emailError) && empty($passwordError) && empty($imgError)){
			if($user->ekziston($_POST)){
				$ekziston=true;
			}else{
				$result=$user->store($_POST);
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
		<div class="container">
			<div class="loginRegisterContainer">
				<div class="loginRegister"> 
					<?php if(isset($ekziston)){
						if($ekziston){?>
							<p style="color:red;">Useri me kete email ekziston!</p>
						<?php }
					}?>
					<?php if(isset($result)){ 
						if($result){ ?>
							<p style="color:green;">Regjistrimi perfundoj me sukses!</p>
						<?php } else{?>
							<p style="color:red;">Regjistrimi deshtoi!</p>
						<?php }?>
					<?php }?>	
					<h1>Register</h1>
					<img src="img/userLogo.png">
					<form action="register.php" method="post"><!-- onsubmit="return validoRegister();" -->
						<input type="text" class="text-input" id="rname" name="name" placeholder="Your name.." value="<?php if(!isset($result)){echo $_POST['name'];}?>" >
						<span style="color:red;"><?php echo $nameError; ?></span>
						<input type="text" class="text-input" id="rlastname" name="lastname" placeholder="Your last name.." value="<?php if(!isset($result)){echo $_POST['lastname'];}?>">
						<span style="color:red;"><?php echo $lastnameError; ?></span>
						<input type="text" class="text-input" id="remail" name="email" placeholder="Your email..." value="<?php if(!isset($result)){echo $_POST['email'];}?>">
						<span style="color:red;"><?php echo $emailError; ?></span>
						<input type="password" class="text-input" id="rpassword" name="password" placeholder="Your password..." value="<?php if(!isset($result)){echo $_POST['password'];}?>" >
						<span style="color:red;"><?php echo $passwordError; ?></span>
						<input type="text" class="text-input" name="img" placeholder="Your pic..." value="<?php if(!isset($result)){echo $_POST['img'];}?>">
						<span style="color:red;"><?php echo $imgError; ?></span>
						<input type="submit" id="registerButton" class="formButton" name="submit" value="Register">
					</form>
					<p>Already a member?<a href="login.php"> Login</a></p>
				</div>
			</div>
		</div>
		<?php 
			include ("includes/footer.php");
		?>
		<script src="js/main.js"></script>
	</body>
</html>
<!-- 1 mnyre per respositivitet osht width height= % jo me px -->