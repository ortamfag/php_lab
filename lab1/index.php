<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
	<?php echo "<title>" . $name = 'Home' . "</title>" ?>
</head>

<body>
	<header>
		<nav>
			<a 
				href="<?php
					$text = 'Home';
					$ref = 'index.php';
					$current_page = true;
					echo $ref;
				?>"

				class="menu_item <?php if ($current_page) echo ' active' ?>
			">
				<?php echo $text ?> 
			</a>

			<a 
				href="<?php
					$text = 'About';
					$ref = 'about.php';
					$current_page = false;
					echo $ref;
				?>" 
				
				class="menu_item <?php if ($current_page) echo ' active' ?>
			">
				<?php echo $text ?>
			</a>

			<a
				href="<?php
					$text = 'Contact';
					$ref = 'contact.php';
					$current_page = false;
					echo $ref;
				?>" 
				
				class="menu_item <?php if ($current_page) echo ' active' ?>
			">
				<?php echo $text ?>
			</a>
		</nav>
	</header>
	<section class="introduce">
		<div class="wrapper">
			<h1 class="main_title">We make your future waste-free!</h1>
			<div class="flex_wrapper">
				<h2 class="sub_title">Scroll bellow</h2>
				<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
					<path d="M6 8l18 32L42 8H6zm6.75 4h22.5L24 32 12.75 12z" fill='white' />
				</svg>
			</div>
		</div>
	</section>
	<section class="services_wrapper">
		<h2>What we can do?</h2>
		<div class="services">
			<div class="services__card">
				<?php
					$sec = date('s');

					if ($sec % 2 === 0)
						$name = '1.jpg';
					else 
						$name = '2.jpg';
					
						echo '<img src="' . $name . '" alt = "///"> ';
				?>
				<p class="service_title">We take out the garbage around the clock</p>
				<p>You can order a bunker truck at any convenient time of the day or night.</p>
			</div>
			<div class="services__card">
				<img src="1.jpg" alt="">
				<p class="service_title">Professional movers</p>
				<p>We have only professional movers. You will always get quality help.</p>
			</div>
			<div class="services__card">
				<img src="2.jpg" alt="">
				<p class="service_title">All your garbage will be recycled</p>
				<p>Your garbage will be recycled into something new with a 100% probability</p>
			</div>
		</div>
	</section>
	<section class="prices">
		<table>
			<?php
				echo '<tr>
					<td>Order price</td>
					<td>Price per hour</td>
					<td>Price for recycling</td>
				</tr>';
			?>

			<tr>
				<td><?php echo '111$'; ?></td>
				<td><?php echo '66$'; ?></td>
				<td><?php echo '990$'; ?></td>
			</tr>
		</table>
	</section>
	<footer>
		<?php echo "<p> &nbsp; Сформировано:" . date("d.m.Y в H-i.s") . "</p>"; ?>
	</footer>
</body>
</html>