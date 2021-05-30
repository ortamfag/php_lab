<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Жидов А.В. | 201-322 | №8</title>

	<link rel="stylesheet" href="styles.css">
</head>
<body class="body">
	<header class="header">
		<div class="container header__inner">
			<img 
				src="images/logo.png"
				alt="Polytech"
				class="header__logo"
			>

			<div class="header__info">Жидов А.В. | 201-322 | №8</div>
		</div>
	</header>

	<main class="main container">
		<form action="result.php" method="POST" class="form">
			<textarea name="data" id="" cols="30" rows="10" class="textarea"></textarea>

			<button type="submit" class="submit">Анализировать</button>
		</form>
	</main>

	<footer class="footer">
	<?php echo "<p> &nbsp; Сформировано:" . date("d.m.Y в H-i.s") . "</p>"; ?>
	</footer>
</body>
</html>