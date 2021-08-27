<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1.0">
	<title>my campus</title>
	<link rel="stylesheet" type="text/css" href="../css/student.css">
</head>
<body>
	<section class="sec">
		<header>
			<a href="#"><img src="../img/logo1.png" class="logo"></a>
			<div class="toggleMenu" onclick="menuToggle();"></div>
			<ul class="navigation">
				<li><a href="../index.php">Home</a></li>
				<li><a href="#">subject's</a></li>
				<li><a href="#">What's New</a></li>
				<li><a href="#">Newsletter</a></li>
				<li><a href="Contact us form/index.html">Contact</a></li>
				<li><a href="logout.php">Log-out</a></li>
                <!-- <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?> -->
			</ul>
		</header>
		<div class="content">
			<div class="textBox">
				<h2>Java cource<br><span></span></h2>
				<p></p>
				<a href="https://www.javatpoint.com/java-tutorial">Student's Corner</a>
			</div>
			<div class="imgBox">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/hBh_CC5y8-s?start=4648" frameborder="0"
				 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>				
			</div>
			
		</div>


	</section>
	<script type="text/javascript">
	
		function menuToggle(){
			const toggleMenu = document.querySelector('.toggleMenu');
			const navigation = document.querySelector('.navigation');
			toggleMenu.classList.toggle('active');
			navigation.classList.toggle('active');
		}
	</script>

</body>
</html>