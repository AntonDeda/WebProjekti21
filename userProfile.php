<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require './controllers/UserController.php';

    $user = new UserController;

    if(isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
    }

    $currenUser = $user->edit($userId);

    if(isset($_POST['submit'])) {
        $user->update($userId, $_POST);

        $currenUser=$user->edit($userId);
        
        header("Location: userProfile.php");
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
				<div class="loginRegister" > 
					<h1><?php echo $_SESSION['name'];?></h1>
					<img src="<?php echo $_SESSION['img'];?>">
                    <a href="#editUserProfile" onclick="editUserProfile()">EditProfile</a>
                    <div class="editUserProfile hidden">
                        <form action="" method="post" onsubmit="return validoUserProfile();">
                            <input type="text" id="upName" name="name" value="<?php echo $currenUser['name']; ?>"/><br>
                            <label for="fname">Name</label><br/>
                            <input type="text" id="upEmail" name="email" value="<?php echo $currenUser['email'];  ?>"/><br>
                            <label for="fname">Email</label><br/>
                            <!--<input type="password" name="password" value="<?php echo $currenUser['password'];  ?>"/><br>
                            <label for="fname">Password</label><br/>-->
                            <input type="text" id="upImg" name="img" value="<?php echo $currenUser['img']; ?>"/><br>
                            <label for="fname">Img</label><br/>
                            <input type="submit" name="submit" value="Submit"/>
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