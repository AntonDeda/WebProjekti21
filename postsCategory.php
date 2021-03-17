<?php 
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(isset($_SESSION['id'])){
    
    require 'includes/dbconnect.php';
	require './controllers/PostController.php';
	
    $posto = new PostController;
    
    $query = $pdo->prepare('SELECT * FROM news_kategory');
	$query->execute();
	$categorydata = $query->fetchAll();
    
    
	if(isset($_POST['submit'])) {
        //echo "Kategoria: ".$_POST['kategoria'];
		$category_id = $_POST['kategoria'];
 	}
    $postsdata = $posto->selectByCategory($category_id);
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
					<form action="postsCategory.php" method="post">
						<select name="kategoria">
						<?php foreach($categorydata as $category): ?>
							<option name="" value="<?php echo $category['category_id']; ?>"> <?php echo $category['category_name']; ?></option>
						<?php endforeach; ?>
                        <input type="submit" name="submit" class="formButton" value="Kerko sipas kategoris"><br>
                    </form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="content">
				<div class="titleContact">
					<h1>Filmat:</h1>
				</div>
				<div class="permbjajta-aboutUs">
					<?php foreach($postsdata as $post): ?>
					<div class="teamPersonProfili ">
						<h1><?php echo $post['post_title'] ?></h1>						
						<img src="<?php echo $post['image'] ?>"><!--Kete rast kane fotografi te njejt por vetem src 
						te ndryshohet-->
						<p><strong>Pershkrimi: </strong><?php echo $post['post_body'] ?></p>
						<p><strong>Kategoria: </strong><?php echo $post['category_name']; ?></p>
						<p><strong>Autori: </strong><?php echo $post['post_author']; ?></p>
						<?php if($_SESSION['role'] == 1){?>
						<a href="editPost.php?id=<?php echo $post['post_id']; ?>">Edit</a>
						<a href="deletePost.php?id=<?php echo $post['post_id']; ?>" onclick="editUserProfile()">Delete</a>
						<?php } ?>

						<?php /*foreach($yourPost as $yourpost){
							if($yourpost['post_author'] == $post['post_author']){ ?>
								<a href="editPost.php?id=<?php echo $post['post_id']; ?>">Edit</a>
								<a href="deletePost.php?id=<?php echo $post['post_id']; ?>" onclick="editUserProfile()">Delete</a>
							<?php } 
						} */?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php 
			include ("includes/footer.php");
		?>
		<script src="js/main.js"></script>
	</body>
</html>
					<?php }else{
						header("Location: login.php");
					} ?>