<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();

	require "includes/dbconnect.php";
	if($_SESSION['role'] == 1){
		if(isset($_POST['submit'])){
			$category_name = $_POST['category_name'];
			
			
			

			$sql = 'INSERT INTO news_kategory(category_name) VALUES(:category_name)';
			
			$query =$pdo->prepare($sql);
			$query->bindParam('category_name', $category_name);

			if($query->execute()){
				echo "U regjistrua me sukses!";
			}else{
				echo "Regjistrimi deshtoi!";
			}
			
			//header("Location: login.php");
			
		}
?>

<div>
    <form action="addCategory.php" method="post">
        <input type="text" name="category_name" placeholder="Emri i kategoris"><br>
        <input type="submit" name="submit" value="Shto kategorin"><br>
    </form>
	<a href="addPosts.php">Kthehu prapa</a>
</div>
<?php }else{
	echo "Duhet te jeni i kyqur si admin per te pasur kete casje!"; ?>
	<a href="index.php">Kthehu prapa</a>
	<?php
} ?>