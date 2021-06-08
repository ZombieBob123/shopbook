<?php

require 'includes/db/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="media/img/logo-book.png">
	<title>Search=<?php echo $_GET['Search']?></title>
</head>
	<body>
		
		<!-- header -->

		<?php

		require 'includes/header/index.php';		

		?>



		<div class="search__content">
			<div class="container">
					<div class="collection_book">
						<div class="buy__book2">
							<div class="container__book">
								<div class="book__inner">
								
								<div class="user__search">Поисковый запрос: <?php echo $_GET["Search"]?></div>

								<div class="cards-block1">
								<?php 


								$search_get = $_GET['Search'];

								$search = mysqli_query($connection,"SELECT * FROM `images` WHERE `title` LIKE '%$search_get%'");
	                    
	                    	    if (mysqli_num_rows($search) <= 0) {
	                        	  echo "Нету книг которые подходили бы под ваши описание";
	                        	}	 

								while ($img = mysqli_fetch_assoc($search)) {
								?>
									<a href="book.php?id=<?php echo $img["id"]?>"><div  class="card2 <?php echo $img["category"] ?>">
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
					</div>
			</div>
		</div>




		<!-- footer -->

		<?php

		require 'includes/footer/index.php';	

		?>

	</body>
</html>