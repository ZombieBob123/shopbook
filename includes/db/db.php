	<?php  
		$connection = mysqli_connect("localhost", "root", "root", "shopbook");

		if ( $connection == false ) {
			echo "Я не нашёл вашу базу данных";
			echo mysqli_connect_error();
			exit();
		}

	?>		