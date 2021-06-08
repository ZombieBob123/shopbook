

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
</head>
	<body>
		<div class="menu">
			<div class="container">
				<div class="container_inner">
					<nav class="nav">
						<a href="#" class="nav_link">Sign in</a>
						<a href="#" class="nav_link">My Account</a>
						<a href="#" class="nav_link">Order Status</a>
						<a href="#" class="nav_link">Help</a>
					</nav>
				</div>
			</div>
		</div>

		<?php 

		$search = mysqli_query($connection,"SELECT * FROM  `images`");
	                    
	    $cart = mysqli_num_rows($search);

		?>

		<header class="header">
			<div class="container">
				<div class="header__inner">
					
					<a href="../../index.php"><div class="Logo__header">
						<img src="media/img/Logo.png" alt="">
					</div></a>

					<form action="../../product.php" method="get" style="position: relative;height: 45px;display: flex; margin: 15px 0px 0px 0px;">
						<input type="text" name="Search" class="text">
						<button class="button">Search</button>
					</form>

					<div class="header_block">
						  <div class="cart-height">
							<div class="img">
								<img src="media/img/Shop.png" alt="">
							</div>
							<div class="cart_text">Your cart <span class="cart__items">(2 items)</span>
						  </div>
						</div>
						<div class="cart-low">
							<div class="Balance">$125.0</div>
							<a href="../../cart.php"><button class="check">Checkout</button></a>
						</div>
					</div>
					<div class="wish__list">
						<div class="img">
							<img src="media/img/Wish-list.png" alt="">
						</div>
						<div class="text__wish__list">Wish list</div>
						<div class="number__wish__list">20</div>
					</div>	
				</div>
			</div>
		</header>

		<div class="categories">
			<div class="container">
				<div class="categories__inner">
					<nav class="nav_categories">
						
						<?php 

						$header = mysqli_query($connection, "SELECT * FROM `header`");

						while ($category = mysqli_fetch_assoc($header)) {
						?>

						<a href="#" class="nav_link2"><?php echo $category["title"];?></a>
						
						<?php 
						}
						?>
					</nav>
				</div>
			</div>
		</div>
	</body>
</html>