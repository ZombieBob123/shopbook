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
								<a href="categories.php?id=<?php echo $cat['id']?>" style="text-decoration: none;"><div class="nav__link3"><?php echo $cat["categoria"] ?></div></a>
							</div>	
							<?php 
							}
							?>
							<div class="fiction2__sidebar">Non - Fiction</div>

							<div class="nav__sidebar">
								<div class="nav__link3">Comic</div>
								<div class="nav__link3">Cook</div>
								<div class="nav__link3">Psychology</div>
								<div class="nav__link3">Medical</div>
								<div class="nav__link3">Art</div>
								<div class="nav__link3">Photography</div>
								<div class="nav__link3">Law</div>
								<div class="nav__link3">History</div>
								<div class="nav__link3">Business</div>
								<div class="nav__link3">Computer</div>
							</div>		

							<div class="fiction2__sidebar">Other</div>

							<div class="nav__sidebar">
								<div class="nav__link3">Baby</div>
								<div class="nav__link3">Sex</div>
								<div class="nav__link3">Travel</div>
								<div class="nav__link3">Science</div>
								<div class="nav__link3">Sports</div>
							</div>
						</div>
					</div>	

					<div class="collection_book">
						<div class="buy__book">
							<div class="container__book">
								<div class="book__inner">
							<?php

								$categories2 = mysqli_query($connection, "SELECT * FROM `categories` WHERE `id` = " . (int) $_GET['id']);

								$cat2 = mysqli_fetch_assoc($categories2);								
							?>
									<div class="title__category"><?php echo $cat2['categoria']?></div>


								<div class="cards-block1">
								<?php 

								$get = $_GET['name'];
				            $per_page = 15;
				            $page = 1;

				            if (isset($_GET['page'])) {
				                $page = ((int) $_GET['page']);
				            }

					        $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `images` WHERE `categoria` = '$get'");


					        $total_count = mysqli_fetch_assoc($total_count_q);
					        $total_count = $total_count["$total_count"];
					        $total_pages = ceil($total_count / $per_page);

					        if ($page <= 1 || $page > $total_pages) {
					        	$page = 1;
					        }

					        $offset = ($per_page * $page) - $per_page;
								
								$images = mysqli_query($connection,"SELECT * FROM `images` WHERE `id`  = " . (int) $_GET['id']);

								 if (mysqli_num_rows($images) <= 0) {
	                			 echo "Нету книг которые подходили бы под катигорию";
	     						  }	 

								while ($img = mysqli_fetch_assoc($images)) {
								?>
										<a href="book.php?id=<?php echo $img['id']?>"><div  class="card <?php echo $img["category"] ?>">
											<div class="images__book" style="background-image: url(media/img/<?php echo $img["image"]?>);"></div>
											<div class="book__info">
												<div class="title__book"><?php echo mb_substr(strip_tags($img["title"]), 0, 25, "utf-8"); ?></div>
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

												 echo "<div class='number add $state '><a class='number__pagination' href='/index.php?name=$get&page=$i'>$i</a></div>";
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