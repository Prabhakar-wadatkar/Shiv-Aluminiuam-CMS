<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/home_page.css">

	<title>Register Form</title>
</head>
<section class="sec">
<header>
			<a href="#"><img src="../img/logo1.png"class="logo"></a>
			<div class="toggleMenu" onclick="menuToggle();"></div>
			<ul class="navigation">
			<li><a href="../index.php">Home</a></li>
			<li><div><a href="#"></a>subject's</div></li>
            <li><div><a href="#"></a>What's New</div></li>
            <li><div><a href="./Contact us/index.html">Contact</a></div></li>				
			</ul>
		</header>
<body>
	 <form action="" method="POST" class="row g-6 needs-validation text-white" style="margin: 7px; align-items: center;" novalidate>
            <h5 class="text-center" style="padding: 10px;">Teacher Registration</h5>

            <div class="col-md-4" style="margin-top:15px">
              <label for="name" class="form-label">Username:</label>
              <input type="text" class="form-control" id="name" name="username" value="<?php echo $username; ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-6" style="margin-top:15px">
              <label for="name" class="form-label">Email:</label>
              <input type="email" class="form-control" id="name" name="email" value="<?php echo $email; ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4" style="margin-top:15px">
              <label for="name" class="form-label">Password:</label>
              <input type="password" class="form-control" id="name" name="password" value="<?php echo $_POST['password']; ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4" style="margin-top:15px">
              <label for="name" class="form-label">Confirm Password:</label>
              <input type="password" class="form-control" id="name" name="cpassword" value="<?php echo $_POST['cpassword']; ?>"" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-12 text-center " style="margin-top:15px">
              <button class="btn btn-primary"  type="submit" name="submit">Register</button>
            </div>
			<div class="col-12 text-center" ><br/>Have an account? <a href="index.php" style="color:#aeafaf">Login Here.</a></div>
    
	</div>
	</form>
</section>
	<script type="text/javascript">
     
	 function menuToggle(){
	   const toggleMenu = document.querySelector('.toggleMenu');
	   const navigation = document.querySelector('.navigation');
	   toggleMenu.classList.toggle('active');
	   navigation.classList.toggle('active');
	 }
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
 myInput.focus()
})

   </script>
</body>
</html>