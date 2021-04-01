<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <?php echo "<title>".$name='Contact'."</title>" ?></head>
<body>
    <header>
        <nav>
			<a 
				href="<?php
					$text='Home';
					$ref='index.php';
					$current_page=false;
					echo $ref;
				?>" 

				class="menu_item <?php
					if ($current_page)
					echo ' active';
					?>
			">
				<?php echo $text ?>
			</a>

			<a 
				href="<?php
					$text='About';
					$ref='about.php';
					$current_page=false;
					echo $ref;
				?>"
				
				class="menu_item <?php
					if ($current_page)
					echo ' active';
				?>
			">
				<?php echo $text ?> 
			</a>

			<a 
				href="<?php
					$text='Contact';
					$ref='contact.php';
					$current_page=true;
					echo $ref;
				?>" 
				
				class="menu_item <?php
					if ($current_page)
						echo ' active';
					?>
			">
				<?php echo $text ?>
			</a>
        </nav>
    </header>
    <section class="contact">
        <h2 class="title">contact</h2>
        <form class="main_form">
            <input type="text" name="name" id="name" placeholder="Your name">
            <textarea name="message" id="message" placeholder="Your message"></textarea>
            <button>Send</button>
        </form>
    </section>
    <footer>
		<?php echo "<p> &nbsp; Сформировано:".date("d.m.Y в H-i.s")."</p>"; ?>
	</footer>
</body>
</html>
