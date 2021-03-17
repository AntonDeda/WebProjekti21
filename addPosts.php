<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	if(isset($_SESSION['id'])){
	

	require 'includes/dbconnect.php';
	/*
	if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $image = $_POST['image'];
        $kategoria = $_POST['kategoria'];
        
		

		$sql = 'INSERT INTO user_posts(post_title, post_body, image, category_id) VALUES(:title, :body, :image, :kategoria)';
        $query =$pdo->prepare($sql);
        $query->bindParam('title', $title);
        $query->bindParam('body', $body);
        $query->bindParam('image', $image);
        $query->bindParam('kategoria', $kategoria);

		$query->execute();
		
		header("Location: addPosts.php");
    }

    $sql = 'SELECT * FROM user_posts inner join news_kategory on news_kategory.category_id = user_posts.category_id';
    $query = $pdo->prepare($sql);
    $query->execute();
	$postsdata = $query->fetchAll();*/

	require './controllers/PostController.php';
	
	$posto = new PostController;
	$postsdata = $posto->all();
	
	if(isset($_POST['submit'])) {
		$posto->store($_POST);
 	}

	$query = $pdo->prepare('SELECT * FROM news_kategory');
	$query->execute();
	$categorydata = $query->fetchAll();

	$yourPost = $posto->yourPost();
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
					<h1>Shto Postimin</h1>
					<form action="addPosts.php" method="post" onsubmit="return validoPostimin();">
                        <input type="text" id="post_titulli" name="title" placeholder="Titulli"><br>
                        <textarea name="body" id="post_body" rows="4" cols="29" placeholder="Pershkrimi lajmit"></textarea><br>
                        <input type="text" id="post_img"name="image" placeholder="Image source"><br>
						<!--<input type="text" name="kategoria" placeholder="kategoria"><br> -->
						<select name="kategoria">
						<?php foreach($categorydata as $category): ?>
							<option name="" value="<?php echo $category['category_id']; ?>"> <?php echo $category['category_name']; ?></option>
						<?php endforeach; ?>
						<input type="hidden" name="post_author" value="<?php echo $_SESSION['name'];?>">
        	            <input type="submit" name="submit" class="formButton" value="shto lajmin"><br>
                    </form>
					<?php if($_SESSION['role'] == 1){?>
						<p>Shto Kategori: <a href="addCategory.php"> KETU </a></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="content">
				<div class="titleContact">
					<h1>Filmat</h1>
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