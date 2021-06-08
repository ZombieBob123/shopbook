<?php 
	
	require 'includes/db/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="icon" type="image/png" href="media/img/logo-book.png">
	<title>Cart</title>
</head>
	<body>
		<!-- header -->

		<?php

		require 'includes/header/index.php';

		?>

		<div class="container">
			<div class="buy__book2">
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
									<a href="book.php?id=<?php echo $img["id"]?>"><div  class="card2 <?php echo $img["categoria"] ?>">
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
												 echo "<a class='number__pagination' href='/cart.php?name=$get&page=$i'><div class='number add $state '>$i</div></a>";

											}

											?>
										</div>
									</div>	
					</div>

		</div>


		<!-- footer -->

		<?php 

		require 'includes/footer/index.php';

		?>

	</body>
</html>