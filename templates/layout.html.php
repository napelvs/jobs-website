<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/styles.css"/>
		<title>Jo's Jobs - <?=$title?> </title>
	</head>
	<body>
	<header>
		<?php 
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || 
			isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) { ?>
			<a href="logout.php"> Log Out </a>
			<?php 
				if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'Y') {  ?>
					<a href="managestaff.php"> Manage Staff </a>
					<a href="manageusers.php"> Manage Users </a>
				<?php	
				}
			} ?>
		<section>
			<aside>
				<h3>Office Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<h1>Jo's Jobs</h1>
		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Jobs
				<ul>
					<?php require 'jobs_nav.php'; ?>
				</ul>
			</li>
			<li><a href="/aboutus.php">About Us</a></li>
			<li><a href="/faqs.php">FAQs</a></li>
			<li><a href="/contactus.php">Contact Us</a></li>
		</ul>

	</nav>
	<img src="/images/randombanner.php"/>
    
    <?=$output?>
    
	<footer>
		&copy; Jo's Jobs 2020		
    </footer>
    
</body>
</html>

