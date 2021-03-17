<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    require './controllers/PostController.php';
    $posto = new PostController;

    if(isset($_GET['id'])){
		$postimiId = $_GET['id'];
    }

    $currenPost = $posto->edit($postimiId);
    
    if(isset($_POST['submit'])){
        $posto->update($postimiId, $_POST);

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
					<h1>Edito Postimin</h1>
					<form action="" method="post" onsubmit="return validoEditPost();">				
                        <textarea type="text" id="edit_body" name="post_body" value="<?php echo $currenPost['post_body'];?>"/></textarea><br><br>
                        <label >Post Body</label><br/>
                        <input type="text" id="edit_img"name="image" value="<?php echo $currenPost['image'];?>"/><br>
                        <label >Image</label><br/>
                        <input type="submit" name="submit" value="Submit"/>
                    </form>
				</div>
			</div>
		</div>
		
		<?php 
			include ("includes/footer.php");
		?>
		<script src="js/main.js"></script>
	</body>
</html>
