<?php
include ('../congif/constraints.php');

include('login_check.php');


?>











<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> Home Page </title>

		<link rel="stylesheet"  href="admin_style.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<style> @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,600&display=swap'); </style>
	</head>



		<body>
    <!------- Menu Section------>
     
    <div class="header">
			




			<div class="container">
				<div class="navbar">
					<div>
						<a href="admin_index.php"></a>
					</div>
				<nav>
					<ul>
						<li> <a href="admin_index.php"> HOME </a> </li>
						<li> <a href="manage_admin.php"> ADMIN </a> </li>
						<li> <a href="admin_categories.php"> CATEGORIES </a> </li>
						<li> <a href="admin_products.php"> PRODUCTS </a> </li>
						<li> <a href="logout.php"> LOGOUT </a> </li>

				<li> <a href="admin_cart.php"><i class="fas fa-shopping-cart"></i> </a> </li>

				</ul>
				</nav>

				</div>

				</div>
</div>

    
</body>

</html>