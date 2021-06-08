<?php 
	
	require 'includes/db/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="icon" type="image/png" href="media/img/logo-book.png">
	<title>shopbook.log</title>
</head>
	<body>	
		
		<?php 

		require 'includes/header/index.php';

		?>

		<div class="slider">
			<div class="container">
				<div class="slider__inner">
					<div class="slider__img">
						<div class="banner">
		 				  
		 				  <div class="reviews__btn  reviews__btn--prev" href="#"></div>
		 				   <div class="reviews__btn  reviews__btn--next" href="#"></div> 
							
							<div class="banner_container">
								<div class="banner__item">
									<div class="img">
										<img src="media/img/banner.png" alt="">
									</div>
									<div class="slider_title">A Wanted Man 
									<br><span class="span">(Jack Reacher #17)</span>
									<br><span class="span2">By Lee Child</span></div>
								</div>

								<div class="banner__item">
									<div class="img">
										<img src="media/img/banner.png" alt="">
									</div>
									<div class="slider_title">A sdddd Man 
										<br><span class="span">(Jack Reacher #17)</span>
										<br><span class="span2">By Lee Child</span>
									</div>
								</div>

							</div>

						</div>		
					</div>

					<div class="book_item">	
						<div class="book_container">
							<div class="title_book">Deal of the Month</div>
							<div class="text_book">The Human Face of Big Data</div>
							<div class="image__book">
								<img src="media/img/book.png" alt="">
							</div>
							<div class="discount_book">Save 45% Today</div>
							<div class="price_book">$27.50</div>
							<button class="click_buy">Buy now</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="block_buy_book">
			<div class="container">
				<div class="block_buy_book__inner">

					<div class="sidebar">
						<div class="sidebar__inner">
							<div class="title__sidebar">Categories</div>
							<a href="/" style="text-decoration: none;"><div class="all__sidebar">All</div></a>
							<div class="fiction__sidebar">Fiction & Literature</div>

							<?php
								$categories = mysqli_query($connection, "SELECT * FROM `categories`");

								while ($cat = mysqli_fetch_assoc($categories)) {									
							?>
							<div class="nav__sidebar">
								<a href="categories.php?id=<?php echo $cat['id']?>" style="text-decoration: none;"><div class="nav__link3"><?php echo $cat["categoria"];?></div></a>
							</div>	
							<?php 
							}
							?>
							<div class="fiction2__sidebar">Non - Fiction</div>

							<div class="nav__sidebar">
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Comic</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Cook</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Psychology</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Medical</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Art</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Photography</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Law</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">History</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Business</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Computer</div></a>
							</div>		

							<div class="fiction2__sidebar">Other</div>

							<div class="nav__sidebar">
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Baby</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Sex</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Travel</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Science</div></a>
								<a href="categories.php" style="text-decoration: none;"><div class="nav__link3">Sports</div></a>
							</div>
						</div>
					</div>	

					<div class="collection_book">
						<div class="btn">
							<button class="buttons button__category" data-filter="best__sellers">Best sellers
							</button>
							<button class="buttons button__category" data-filter="new__Arrivals">New Arrivals
							</button>
							<button class="buttons button__category" data-filter="used__Books">Used Books</button>
							<button class="buttons button__category" data-filter="special__Offers">Special Offers
							</button>
						</div>
						<div class="buy__book">
							<div class="container__book">
								<div class="book__inner">
									

								<div class="cards-block1">
								<?php 
					            $per_page = 15;
					            $page = 1;

					            if (isset($_GET['page'])) {
					                $page = ((int) $_GET['page']);
					            }

						        $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `images` WHERE `categoria` = '$get'");
						        $total_count = mysqli_fetch_assoc($total_count_q);
					            $total_count = 50;
					            $total_pages = ceil($total_count / $per_page);

					            if ($page <= 1 || $page > $total_pages) {
					                $page = 1;
					            }

					            $offset = ($per_page * $page) - $per_page;


								$images = mysqli_query($connection,"SELECT * FROM `images` ORDER BY `id` DESC LIMIT $offset, $per_page");

								while ($img = mysqli_fetch_assoc($images)) {
								?>
									<a href="book.php?id=<?php echo $img["id"]?>"><div  class="card <?php echo $img["categoria"] ?>">
										<div class="images__book" style="background-image: url(media/img/<?php echo $img["image"]?>);"></div>
										<div class="book__info">
											<div class="title__book"><?php echo mb_substr(strip_tags($img["title"]), 0, 12, "utf-8"); ?></div>
											<div class="price__book"><?php echo $img["price"]; ?></div>
										</div>
									</div></a>
								<?php
								}	
								?>
								  </div>
								</div>	
							</div>
						</div>
									<div class="pagination"> 								
										<div class="pagination__inner">
											
											<?php 

											for ($i = 1; $i <= $total_pages; $i++) { 
												
												if ($i == $page) {
													$state = "disabled";
												} elseif ($i != $page) {
													$state = "";
												}	
												 echo "<a class='number__pagination' href='index.php?name=$get&page=$i'><div class='number add $state '>$i</div></a>";

											}

											?>
										</div>
									</div>	
					</div>

				</div>
			</div>
		</div>

		<!-- footer -->

		<?php require 'includes/footer/index.php'; ?>


		<script language="JavaScript" src="media/js/Main.js"></script>
	</body>	
</html>