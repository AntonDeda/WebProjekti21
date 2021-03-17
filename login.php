<!--kodi oop-->
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	
    require './controllers/AuthController.php';

    $user = new AuthController;
	
  
    $emailError = "";
    $passwordError = "";
	
	$emailValue = "";
	$passwordValue = "";

	function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
	
    if(isset($_POST['submit'])) {
		if(empty($_POST['email'])){
            $emailError = "Email nuk mund te jete i zbrazt!";
        }else{
			$_POST['email'] = testInput($_POST['email']);
			$emailValue = $_POST['email'];
		}

		if(empty($_POST['password'])){
            $passwordError = "Passwordi nuk mund te jete i zbrazt!";
        }else{
			$_POST['password'] = testInput($_POST['password']);
			$passwordValue = $_POST['password'];
        }
        
		if(empty($emailError) && empty($passwordError)){
			$result = $user->login($_POST);
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
					<?php if(isset($result)){?>
						<?php if(!$result){?>
							<p style="color:red;">Email ose passwordi gabim!</p> 
						<?php }?>
					<?php }?>
					<h1>Login</h1>
					<img src="img/userLogo.png">
					<form action="login.php" method="post" ><!-- onsubmit="return validoLogIn();" -->
						<input type="text" class="text-input" id="lemail" name="email" placeholder="Your email..." value="<?php echo $emailValue; ?>"><!--required-->
						<span style="color:red;"><?php echo $emailError; ?></span>
						<input type="password" class="text-input" id="lpassword" name="password" placeholder="Your password..." value="<?php echo $passwordValue; ?>"><!--required-->
						<span style="color:red;"><?php echo $passwordError; ?></span>
						<input type="submit" id="loginButton" class="formButton" name="submit" value="Log In"><!--onclick="validoLogIn()"-->
						<!--<input type="submit" class="input-submit"  >-->	
					</form>
					<p>Not a member yet?<a href="register.php"> Register</a></p>
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