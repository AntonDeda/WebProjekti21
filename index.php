<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();

	include './controllers/PostController.php';
	require 'includes/dbconnect.php';

	$posto = new PostController;
	$lastestPosts = $posto->top4();

	$sql = 'SELECT * FROM stafi ORDER BY stafi_id ASC LIMIT 3'; 
    $query = $pdo->prepare($sql);
    $query->execute();
	$stafi = $query->fetchAll();
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
			<div class="content">
				<div class="slider">
					<button class="prew" onclick="prewImage()">-</button>
					<div id="box"><img src="img/d.png"></div>
					<button class="next" onclick="nextImage()">+</button>
				</div>
				<div class="permbajtja1">
					<?php foreach($lastestPosts as $postim){ ?>
						<div class="element show" name="permbajtja">
							<img src="<?php echo $postim['image']; ?>" alt="divServices"/>
							<h2><?php echo $postim['post_title']; ?></h2>
							<p><?php echo $postim['post_body']; ?></p>
						</div>
					<?php }?>
				</div>	
				<hr/>
				<div class="permbajtja2">
					<div class="left">
						<h2 id="header2">Latest News & Events</h2>
						<div>
							<h5>Title Goes Here</h5>
							<p>Monday 21st January</p>
							<p>Vestassapede et donec ut est liberos sus et eget<br/> 
							sed eget. Quisqueta habitur augue magnisl<br/> 
							magna phasellus sagittitor ant curabiturpis.</p>
						</div>
						<hr>
						<div>
							<h5>Title Goes Here</h5>
							<p>Monday 21st January</p>
							<p>Vestassapede et donec ut est liberos sus et eget<br/> 
								sed eget. Quisqueta habitur augue magnisl<br/> 
								magna phasellus sagittitor ant curabiturpis.</p>
						</div>
						<hr>
					</div>
					<div class="center">
						<h2>Nature tour</h2>
						<div>
							<video src="https://s3.amazonaws.com/codecademy-content/courses/freelance-1/unit-1/lesson-2/htmlcss1-vid_brown-bear.mp4" width="300" height="225" controls>Video not supported</video>
						</div>
						<div>
							<p>Aliquatpede id pellus elit quis in nec<br/>
							consectetuer mattis duis in. Ipsumet ris morbi<br/> 
							quis ac nulla aenean trisuscelerit nonummy<br/>
							augue et. Elisicursus aenean sit consequam wisi<br/>
							ames felit phasellenterdum sagittis sit mauris. </p>
						</div>
					</div>
					
					<div class="right">
						<h2>Meet The Instructors</h2>
						<?php foreach($stafi as $personi){?>
							<div class="instruction">
								<div>
									<img src="<?php echo $personi['stafi_image']; ?>" alt="80">
								</div>
								<div>
									<h4 class="insideInstuction"><?php echo $personi['stafi_fullname']; ?></h4>
									<p class="insideInstuction">Per me shume:</p>
									<a href="stafiShow.php?stafi_id=<?php echo $personi['stafi_id'];?>" class="insideInstuction">View Profile »</a>
								</div>
							</div><hr/>
						<?php }?>
						</div>
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
<!-- 1 mnyre per respositivitet osht width height= % jo me px -->