	<?php


	// Подключаемся к базе данных
	require '../db/db.php';


	// Получаем данные с формы
	$user__name = $_POST["name"];

	$text = $_POST["text"];

	// Получаем картинку пользователя
	$name = $_FILES['img__user']['name'];

	$tmp_name = $_FILES['img__user']['tmp_name'];




	 // Перемещаем картинку пользователя в папку с сайтом
	move_uploaded_file($tmp_name, "../../media/img/" . $name)



	
	?>	

	<?php


		if ($user__name == "") {
			echo "<div style='color: red;' class='message'>Ваш комментарий не был добавлин!</div>";	
		}

		elseif ($text == "") {
				echo "<div style='color: red;' class='message'>Ваш комментарий не был добавлин!</div>";	
		}



		else {			
		  $get = (int) $_GET['id'];
		 $connection -> query("INSERT INTO `comments` (`id`, `image`, `user__name`, `text`, `arcticle__id`) VALUES (NULL, '$name', '$user__name', '$text', '$get');");
			echo "<div style='color: green;' class='message'>Ваш комментарий добавлин!</div>";
		}


	?>

	<a href="https://shopbook.log/index.php"><button>Вернуться назад</button></a>


	

















