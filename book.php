
<?php

	require 'includes/db/db.php';

?>

	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="media/css/Main.css">
	<link rel="icon" type="image/png" href="media/img/logo-book.png">
</head>
	<body>
		<?php 

		require 'includes/header/index.php';

		?>

		<div class="Breadcrumbs__block">
			<div class="container">
				<div class="Breadcrumbs__content">
					<div class="Breadcrumbs__inner">
						<div class="title">
							<a href="https://shopbook.log/" class="title__breadcrumbs">Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="book__buy__info">
			<div class="container">
				<div class="book__buy">

				<?php 

				$get = (int) $_GET['id'];

				$book = mysqli_query($connection, "SELECT * FROM `images` WHERE `id` = '$get'");
				
				if ( mysqli_num_rows($book) <= 0 ) {
				?>

				<h1>Книга не найдина!</h1>

				<?php
				} else {

				$book__info = mysqli_fetch_assoc($book);	

				?>
					<div class="content">
						<div class="content__inner">
							<div class="img__book">
								<img src="media/img/<?php echo $book__info["image"] ?>" alt="">
							</div>

							<div class="title__text">
								<div class="title-book"><?php echo $book__info["title"]?></div>
								<div class="text__info"><?php echo $book__info["text"]?></div>
								<div class="price__block">
									<div class="price__inner">
											<div class="price__cart">
												<div class="price__container">
													<div class="price">Our price : <span class="span1"><?php echo $book__info["price"] ?></span></div>
													<button class="cart">Add to cart</button>
												</div>	
												<div class="discount">Was $ 200 Save 20% </div>
											</div>		
											<div class="payment">	
												<div class="payment__inner">
													<div class="paymet__container">
														<span class="zamok"></span>
														<div class="shopping">Safe, Secure Shopping</div>
													</div>
														<div class="images">
															<img src="media/img/paypal.png" alt="">
															<img src="media/img/mastercard.png" alt="">
															<img src="media/img/visa.png" alt="">
															<img src="media/img/american-express.png" alt="">
														</div>	
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>

		<div class="tabs">
			<div class="container">
				<div class="buttons__tub">
					<button class="tab tab1 active2" data-tab="#tab_1">Product Information</button>
					<button class="tab tab2" data-tab="#tab_2">Other details</button>
				</div>
				
				<div class="sidebar__container">
					<div class="book__info2">
					<div class="info__block">
						<div class="info__inner">
							<div class="text2">
								<div class="text__info" id="tab_2"><?php echo $book__info["text"]?></div><div class="text__info active" id="tab_1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
							</div>	
						</div>
					</div>

					<div class="comments">
							<div class="container">
									<div class="comments__inner">
											<div class="title__comments">Product review</div>	
											<div class="comment__users">

											<?php 
												$users = mysqli_query($connection, "SELECT * FROM `comments` WHERE `arcticle_id` = $get");
														if ( mysqli_num_rows($users) <= 0 ) {
											?>	
												<div class="error__comments">There are no reviews of this book yet! Be the first to review this book</div>
											<?php 
											} else {

											while ($user = mysqli_fetch_assoc($users)) {
											?>	
													<div class="users__item">
														<div class="users__inner">
															<div class="image__users">
																	<img src="media/img/<?php echo $user["image"]?>" alt="">
																	<div class="users__name"><?php echo $user["user__name"]?></div>
															</div>			
															<div class="text__container2">
																<div class="message"><?php echo $user["text"]?></div>
															</div>
														</div>	
														</div>	
												<?php
												}
												?>
												<?php
												}
												?>


												<div class="make__comments">
													<div class="title__comments">Write a comment</div>
													<form enctype="multipart/form-data" action="" method="post">
														<div class="users__message">
															<div class="comment">Your name</div>
															<input type="text" name="name"  class="name">	
														</div>
														<div class="users__names">
															<div class="comment ">Message</div>
															<textarea type="comment" name="text" class="input messages"></textarea> 	
														</div>
															<input class="images__users" type="file" name="img__user2">	
															<button class="submit" type="submit">Submit</button>		
													</form>
												</div>	
													<?php

													// Получаем данные с формы
													$user__name = $_POST["name"];

													$text = $_POST["text"];

														// Получаем картинку пользователя
														$name = $_FILES['img__user2']['name'];

														$tmp_name = $_FILES['img__user2']['tmp_name'];

														 // Перемещаем картинку пользователя в папку с сайтом
														move_uploaded_file($tmp_name, "media/img/" . $name);
													?>
													
													<?php
														if ($user__name == "") {
															echo "<div style='color: red;' class='message'>Ваш комментарий не был добавлин!</div>";	
														}

														elseif ($text == "") {
																echo "<div style='color: red;' class='message'>Ваш комментарий не был добавлин!</div>";	
														}

														elseif ($name == "") {
															echo "<div style='color: red;' class='message'>Ваш комментарий не был добавлин!(Добавьте свою фотографию)</div>";
														}

														else {			
														 $connection -> query("INSERT INTO `comments` (`id`, `image`, `user__name`, `text`, `arcticle_id`) VALUES (NULL, '$name', '$user__name', '$text', '$get');");

															echo "<div style='color: green;' class='message'>Ваш комментарий добавлин!</div>";
															#echo "<script>window.location.href='/'</script>";
															}
													?>
											</div>
									</div>
							</div>
					</div>
					</div>
				<div class="sidebar2">
					<div class="sidebar2__inner">
						<div class="sidebar2__title">You may also like</div>
						<div class="books__container">
								<?php 

								$book = mysqli_query($connection, "SELECT * FROM `images` ORDER BY `id` DESC LIMIT 7");

								while ($book__info = mysqli_fetch_assoc($book)) {
								?>


							<a href="#"><div class="book">
								<div class="image_book">
									<img src="media/img/<?php echo $book__info["image"]?>" alt="">
								</div>
								<div class="text__container">
									<div class="title__book2"><?php echo mb_substr(strip_tags($book__info["title"]), 0, 15, "utf-8")?></div>
									<div class="price__book2"><?php echo $book__info["price"]?></div>
									<button class="more__btn" name="more__btn">Read more</button>
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

		<?php require 'includes/footer/index.php'; ?>

			<script src="media/js/index.js"></script>
	</body>
</html>